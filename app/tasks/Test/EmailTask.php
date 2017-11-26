<?php

namespace App\Tasks\Test;

use App\Biz\Email\EmailRepository;
use App\Tasks\Task;
use App\Thrift\Clients\NoticeClient;
use Xin\Cli\Color;
use Xin\Thrift\Notice\EmailContent;
use Xin\Thrift\Notice\Email;
use Xin\Thrift\Notice\EmailSearch;

class EmailTask extends Task
{

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  Email测试脚本') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run test:email@[action]', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  send    发送邮件测试', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  list    查询邮件列表测试', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function sendAction()
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

    public function listAction()
    {
        $client = NoticeClient::getInstance();
        $search = new EmailSearch([
            'searchNumber' => 0,
        ]);
        $res = $client->getEmailList($search);
        dd($res);
    }


}

