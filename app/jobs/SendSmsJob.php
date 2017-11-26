<?php

namespace App\Jobs;

use App\Biz\Sms\SmsRepository;
use App\Jobs\Contract\JobInterface;
use Overtrue\EasySms\EasySms;
use Xin\Thrift\Notice\Sms;

class SendSmsJob implements JobInterface
{
    /** @var Sms[] */
    public $smss;

    public function __construct(array $smss)
    {
        $this->smss = $smss;
    }

    public function handle()
    {
        foreach ($this->smss as $sms) {
            if ($model = SmsRepository::getInstance()->save($sms)) {
                // TODO:发送短信
                $config = di('app')->sms->toArray();
                $easySms = new EasySms($config);

                $res = $easySms->send($sms->mobile, [
                    'content' => $sms->content,
                    'template' => $sms->template,
                    'data' => $sms->data,
                ]);

                foreach ($res as $item) {
                    if ($item['status'] === 'success') {
                        $model->status = 1;
                        $model->result = json_encode($item['result'], JSON_UNESCAPED_UNICODE);
                        $model->save();
                        break;
                    }
                }
            }
        }
    }
}

