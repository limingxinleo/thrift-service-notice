<?php

namespace App\Tasks\Test;

use App\Logics\Notice\Email;
use App\Tasks\Task;

class EmailTask extends Task
{

    public function mainAction()
    {
        $target = [
            ['email' => '715557344@qq.com', 'name' => 'limx'],
        ];
        Email::sendEmail('aaaaa', '<div>asdf</div>', $target);
    }

}

