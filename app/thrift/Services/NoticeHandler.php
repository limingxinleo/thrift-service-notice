<?php
// +----------------------------------------------------------------------
// | AppHandler.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Thrift\Services;

use Xin\Thrift\Notice\NoticeIf;
use Xin\Thrift\Notice\EmailContent;
use Xin\Thrift\Notice\Email;
use App\Support\Email\Email as EmailSupport;

class NoticeHandler extends Handler implements NoticeIf
{
    /**
     * @desc   发送邮件
     * @author limx
     * @param Email[]      $emails
     * @param EmailContent $content
     */
    public function sendEmail(array $emails, EmailContent $content)
    {
        $client = EmailSupport::getInstance();
        foreach ($emails as $item) {
            $client->addTarget($item->email, $item->name);
        }
        if ($client->send($content->title, $content->content)) {
            // 发送成功记录
            return true;
        }
        return false;
    }

}