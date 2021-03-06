<?php

namespace App\Models;

class DingtalkRobotMessage extends Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $robot_id;

    /**
     *
     * @var string
     * @Column(type="string", length=1024, nullable=false)
     */
    public $message;

    /**
     *
     * @var string
     * @Column(type="string", length=1024, nullable=false)
     */
    public $markdown;

    /**
     *
     * @var string
     * @Column(type="string", length=512, nullable=false)
     */
    public $link;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $created_at;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $updated_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("notice");
        $this->setSource("dingtalk_robot_message");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'dingtalk_robot_message';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DingtalkRobotMessage[]|DingtalkRobotMessage|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DingtalkRobotMessage|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
