<?php
namespace Xin\Thrift\Notice;
/**
 * Autogenerated by Thrift Compiler (0.11.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


class Notice_sendEmail_args {
  static $isValidate = false;

  static $_TSPEC = array(
    1 => array(
      'var' => 'emails',
      'isRequired' => false,
      'type' => TType::LST,
      'etype' => TType::STRUCT,
      'elem' => array(
        'type' => TType::STRUCT,
        'class' => '\Xin\Thrift\Notice\Email',
        ),
      ),
    2 => array(
      'var' => 'content',
      'isRequired' => false,
      'type' => TType::STRUCT,
      'class' => '\Xin\Thrift\Notice\EmailContent',
      ),
    );

  /**
   * @var \Xin\Thrift\Notice\Email[]
   */
  public $emails = null;
  /**
   * @var \Xin\Thrift\Notice\EmailContent
   */
  public $content = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['emails'])) {
        $this->emails = $vals['emails'];
      }
      if (isset($vals['content'])) {
        $this->content = $vals['content'];
      }
    }
  }

  public function getName() {
    return 'Notice_sendEmail_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::LST) {
            $this->emails = array();
            $_size16 = 0;
            $_etype19 = 0;
            $xfer += $input->readListBegin($_etype19, $_size16);
            for ($_i20 = 0; $_i20 < $_size16; ++$_i20)
            {
              $elem21 = null;
              $elem21 = new \Xin\Thrift\Notice\Email();
              $xfer += $elem21->read($input);
              $this->emails []= $elem21;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->content = new \Xin\Thrift\Notice\EmailContent();
            $xfer += $this->content->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Notice_sendEmail_args');
    if ($this->emails !== null) {
      if (!is_array($this->emails)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('emails', TType::LST, 1);
      {
        $output->writeListBegin(TType::STRUCT, count($this->emails));
        {
          foreach ($this->emails as $iter22)
          {
            $xfer += $iter22->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->content !== null) {
      if (!is_object($this->content)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('content', TType::STRUCT, 2);
      $xfer += $this->content->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

