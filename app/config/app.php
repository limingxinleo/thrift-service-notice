<?php
// +----------------------------------------------------------------------
// | APP ENV [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
return [
    'project-name' => 'limx-phalcon-project',
    // 定时执行的脚本
    'cron-tasks' => [
        // ['task' => 'System\\Clear', 'action' => 'view', 'params' => ['yes'], 'schedule' => ['dailyAt', [2, 0]]],
    ],
    'error-code' => [
        500 => '服务器错误！',
    ],

    'email' => [
        'email' => env('SEND_EMAIL'),
        'password' => env('SEND_EMAIL_PASSWORD'),
        'name' => env('SEND_EMAIL_NAME', '邮件代理服务器'),
        'host' => env('SEND_EMAIL_HOST'),
        'port' => env('SEND_EMAIL_PORT'),
    ],

    'sms' => [
        // HTTP 请求的超时时间（秒）
        'timeout' => 5.0,

        // 默认发送配置
        'default' => [
            // 网关调用策略，默认：顺序调用
            'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

            // 默认可用的发送网关
            'gateways' => [
                'yunpian', 'aliyun', 'alidayu',
            ],
        ],
        // 可用的网关配置
        'gateways' => [
            'errorlog' => [
                'file' => ROOT_PATH . '/storage/log/easy-sms.log',
            ],
            'yunpian' => [
                'api_key' => env('SMS_YUNPIAN_APIKEY'),
            ],
            'aliyun' => [
                'access_key_id' => env('SMS_ALIYUN_ACCESS_KEY_ID'),
                'access_key_secret' => env('SMS_ALIYUN_ACCESS_KEY_SECRET'),
                'sign_name' => env('SMS_ALIYUN_SIGN_NAME'),
            ],
            'alidayu' => [
                //...
            ],
        ],
    ]
];