<?php
// +----------------------------------------------------------------------
// | Email.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\Email;

use App\Biz\CodeException;
use App\Common\Enums\ErrorCode;
use App\Core\Support\InstanceBase;
use App\Models\Email;
use App\Models\EmailTarget;
use App\Utils\DB;
use Xin\Thrift\Notice\EmailContent;
use App\Models\EmailContent as EmailContentModel;

class EmailRepository extends InstanceBase
{
    /**
     * @desc
     * @author limx
     * @param \Xin\Thrift\Notice\Email[] $emails
     * @param EmailContent               $content
     * @return Email|mixed
     * @throws CodeException
     */
    public function save(array $emails, EmailContent $content)
    {
        try {
            DB::begin();
            $email = new Email();
            $email->search_number = $content->searchNumber;
            $email->search_code = $content->searchCode;
            if (false === $email->save()) {
                throw new CodeException(ErrorCode::$ENUM_EMAIL_MODEL_SAVE_FAILED);
            }

            $email_id = $email->id;
            foreach ($emails as $model) {
                $target = new EmailTarget();
                $target->email_id = $email_id;
                $target->to_email = $model->email;
                $target->to_name = $model->name;
                if (false === $target->save()) {
                    throw new CodeException(ErrorCode::$ENUM_EMAIL_MODEL_SAVE_FAILED);
                }
            }

            $email_content = new EmailContentModel();
            $email_content->email_id = $email_id;
            $email_content->subject = $content->title;
            $email_content->content = $content->content;
            if (false === $email_content->save()) {
                throw new CodeException(ErrorCode::$ENUM_EMAIL_MODEL_SAVE_FAILED);
            }
            DB::commit();
            return $email;
        } catch (\Exception $ex) {
            DB::rollback();
            throw new CodeException(ErrorCode::$ENUM_EMAIL_MODEL_SAVE_FAILED);
        }
    }

    /**
     * @desc
     * @author limx
     * @param null $searchNumber
     * @param null $searchCode
     * @param int  $pageIndex
     * @param int  $pageSize
     * @return Email|Email[]|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public function list($searchNumber = null, $searchCode = null, $pageIndex = 0, $pageSize = 10)
    {
        $where = '';
        $bind = [];

        if (isset($searchNumber)) {
            $where .= 'search_number = :search_number:';
            $bind['search_number'] = $searchNumber;
        }

        if (isset($searchCode)) {
            $where .= 'search_code = :search_code:';
            $bind['search_code'] = $searchCode;
        }

        $email = Email::with(['content', 'targets'], [
            'conditions' => $where,
            'bind' => $bind,
            'offset' => $pageSize * $pageIndex,
            'limit' => $pageSize,
        ]);

        return $email;
    }
}