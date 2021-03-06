<?php
// +----------------------------------------------------------------------
// | EmailException.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz;

use App\Common\Enums\ErrorCode;
use Exception;
use Throwable;

class CodeException extends Exception
{
    public function __construct($code = 0, Throwable $previous = null)
    {
        $message = ErrorCode::getMessage($code);
        parent::__construct($message, $code, $previous);
    }

}