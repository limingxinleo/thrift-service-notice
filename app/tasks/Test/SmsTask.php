<?php

namespace App\Tasks\Test;

use App\Tasks\Task;
use App\Thrift\Clients\NoticeClient;
use Overtrue\EasySms\EasySms;
use Xin\Cli\Color;
use Xin\Thrift\Notice\Sms;

class SmsTask extends Task
{
    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  Sms测试脚本') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run test:sms@[action]', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  send    发送短信', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function sendAction()
    {
        $client = NoticeClient::getInstance();
        $sms = new Sms([
            'mobile' => '13250874521',
            'template' => 'SMS_113930016',
            'data' => [
                'time' => date('Y-m-d H:i:s')
            ],
        ]);
        $res = $client->sendSms([$sms]);
        dd($res);


        $mobile = '13250874521';
        $date = date('Y-m-d H:i:s');
        $content = sprintf('恭喜你，成功使用了Thrift通知。当前时间：%s', $date);

        $config = di('app')->sms->toArray();
        $easySms = new EasySms($config);

        $res = $easySms->send($mobile, [
            'content' => $content,
            'template' => 'SMS_113930016',
            'data' => [
                'time' => $date,
            ],
        ]);

        dd($res);
    }

}

