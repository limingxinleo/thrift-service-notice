<?php
// +----------------------------------------------------------------------
// | AppHandler.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Thrift\Services;

use App\Biz\Email\EmailRepository;
use App\Jobs\SendEmailJob;
use App\Utils\Queue;
use Xin\Thrift\Notice\EmailInfo;
use Xin\Thrift\Notice\NoticeIf;
use Xin\Thrift\Notice\EmailContent;
use Xin\Thrift\Notice\Email;

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
        Queue::push(new SendEmailJob($emails, $content));
        return true;
    }

    /**
     * @desc   查询邮件列表
     * @author limx
     * @param \Xin\Thrift\Notice\EmailSearch $input
     * @return array
     */
    public function getEmailList(\Xin\Thrift\Notice\EmailSearch $input)
    {
        $emails = EmailRepository::getInstance()->list(
            $input->searchNumber,
            $input->searchCode,
            $input->pageIndex,
            $input->pageSize
        );

        $result = [];
        foreach ($emails as $email) {
            $item = new EmailInfo();
            $item->status = $email->status;
            $item->emailContent = new EmailContent([
                'title' => $email->content->subject,
                'content' => $email->content->content,
                'searchCode' => $email->search_code,
                'searchNumber' => $email->search_number,
            ]);
            foreach ($email->targets as $target) {
                $item->target[] = new Email([
                    'email' => $target->to_email,
                    'name' => $target->to_name,
                ]);
            }
            $result[] = $item;
        }

        return $result;
    }
}