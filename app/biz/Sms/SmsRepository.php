<?php
// +----------------------------------------------------------------------
// | SmsRepository.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\Sms;

use App\Biz\CodeException;
use App\Common\Enums\ErrorCode;
use App\Core\Support\InstanceBase;
use App\Utils\DB;
use Xin\Thrift\Notice\Sms;
use App\Models\Sms as SmsModel;

class SmsRepository extends InstanceBase
{
    /**
     * @desc   保存短信发送日志
     * @author limx
     * @param Sms $sms
     * @return SmsModel
     * @throws CodeException
     */
    public function save(Sms $sms)
    {
        $smsModel = new SmsModel();
        $smsModel->mobile = $sms->mobile;
        $smsModel->content = $sms->content;
        $smsModel->template_id = $sms->template;
        $smsModel->data = json_encode($sms->data, JSON_UNESCAPED_UNICODE);
        $smsModel->search_number = $sms->searchNumber;
        $smsModel->search_code = $sms->searchCode;
        if (false === $smsModel->save()) {
            throw new CodeException(ErrorCode::$ENUM_EMAIL_MODEL_SAVE_FAILED);
        }
        return $smsModel;
    }
}