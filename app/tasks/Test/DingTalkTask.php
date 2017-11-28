<?php

namespace App\Tasks\Test;

use App\Tasks\Task;
use App\Thrift\Clients\NoticeClient;
use Xin\Cli\Color;

class DingTalkTask extends Task
{

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  钉钉推送测试') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run test:ding_talk@[action]', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  text    推送自定义机器人文本类型测试', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function textAction()
    {
        $client = NoticeClient::getInstance();
        $res = $client->sendDtRobotText('哈哈哈', env('DING_TALK_TEXT_URL'));
        dd($res);
    }

}

