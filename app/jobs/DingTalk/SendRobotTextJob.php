<?php

namespace App\Jobs\DingTalk;

use App\Jobs\Contract\JobInterface;
use Xin\DingTalk\Application;

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
        dump($this->text, $this->url);
    }
}

