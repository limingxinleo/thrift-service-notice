<?php

namespace App\Tasks\Test;

use App\Support\Email\Email;
use App\Tasks\Task;

class EmailTask extends Task
{

    public function mainAction()
    {

        $email = Email::getInstance();
        $email->addTarget('715557344@qq.com', 'limx');
        $res = $email->send('邮件测试', '测试内容');
        dd($res);
    }
}

