<?php

namespace App\Jobs;

use App\Jobs\Contract\JobInterface;
use Xin\Thrift\Notice\EmailContent;
use Xin\Thrift\Notice\Email;
use App\Support\Email\Email as EmailSupport;

class SendEmailJob implements JobInterface
{
    /** @var  Email[] */
    public $emails;

    /** @var  EmailContent */
    public $content;

    public function __construct(array $emails, EmailContent $content)
    {
        $this->emails = $emails;
        $this->content = $content;
    }

    public function handle()
    {
        $client = EmailSupport::getInstance();
        foreach ($this->emails as $item) {
            $client->addTarget($item->email, $item->name);
        }
        if ($client->send($this->content->title, $this->content->content)) {
            // 发送成功记录
            return true;
        }
        return false;
    }

}

