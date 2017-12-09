<?php

namespace App\Jobs\DingTalk;

use App\Jobs\Contract\JobInterface;
use Xin\DingTalk\Application;
use Xin\DingTalk\Robot\RobotClient;

class SendRobotTextJob implements JobInterface
{
    public $text;

    public $url;

    public function __construct($text, $url)
    {
        $this->text = $text;
        $this->url = $url;
    }

    public function handle()
    {
        $key = md5($this->url);
        $ding = new Application([
            'timeout' => 5.0,
            'robot' => [
                'gateways' => [
                    $key => [
                        'url' => $this->url
                    ]
                ],
            ],
        ]);
        return $ding->robot[$key]->sendText($this->text);
    }
}

