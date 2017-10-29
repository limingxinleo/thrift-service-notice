<?php

namespace App\Logics\Notice;

use App\Logics\Base;
use PHPMailer\PHPMailer\PHPMailer;

class Email extends Base
{
    public static function sendEmail($subject, $body, $target = [])
    {
        if (empty($target)) {
            return;
        }

        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.exmail.qq.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = env('SEND_EMAIL');                 // SMTP username
        $mail->Password = env('SEND_PASSWORD');                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom(env('SEND_EMAIL'), '邮件服务代理');
        foreach ($target as $item) {
            $mail->addAddress($item['email'], $item['name']);     // Add a recipient
        }

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = $body;

        $result = '';
        if (!$mail->send()) {
            // 发送失败时，重新载入队列 延迟60秒
            // Queue::delay(new static($subject, $body, $target), 1);
            $result = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $result = 'Message has been sent';
        }
    }
}

