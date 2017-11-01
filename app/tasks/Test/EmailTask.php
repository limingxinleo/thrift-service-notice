<?php

namespace App\Tasks\Test;

use App\Support\Email\Email as EmailSupport;
use App\Tasks\Task;
use App\Thrift\Clients\NoticeClient;
use Xin\Thrift\Notice\EmailContent;
use Xin\Thrift\Notice\Email;

class EmailTask extends Task
{

    public function mainAction()
    {
        $email = EmailSupport::getInstance();
        $email->addTarget('715557344@qq.com', 'limx');
        $res = $email->send('邮件测试', '测试内容');
        dd($res);
    }

    public function testAction()
    {
        $client = NoticeClient::getInstance();
        $email = new Email([
            'email' => '715557344@qq.com',
            'name' => 'limx'
        ]);
        $content = new EmailContent([
            'title' => '测试',
            'content' => '我爱我媳妇~',
        ]);
        $res = $client->sendEmail([$email], $content);
        dd($res);
    }
}

