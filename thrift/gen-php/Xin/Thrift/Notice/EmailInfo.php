<?php
namespace Xin\Thrift\Notice;

/**
 * Autogenerated by Thrift Compiler (0.10.0)
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


class EmailInfo {
  static $_TSPEC;

  /**
   * @var \Xin\Thrift\Notice\EmailContent
   */
  public $emailContent = null;
  /**
   * @var \Xin\Thrift\Notice\Email[]
   */
  public $target = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'emailContent',
          'type' => TType::STRUCT,
          'class' => '\Xin\Thrift\Notice\EmailContent',
          ),
        2 => array(
          'var' => 'target',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\Xin\Thrift\Notice\Email',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['emailContent'])) {
        $this->emailContent = $vals['emailContent'];
      }
      if (isset($vals['target'])) {
        $this->target = $vals['target'];
      }
    }
  }

  public function getName() {
    return 'EmailInfo';
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
          if ($ftype == TType::STRUCT) {
            $this->emailContent = new \Xin\Thrift\Notice\EmailContent();
            $xfer += $this->emailContent->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::LST) {
            $this->target = array();
            $_size0 = 0;
            $_etype3 = 0;
            $xfer += $input->readListBegin($_etype3, $_size0);
            for ($_i4 = 0; $_i4 < $_size0; ++$_i4)
            {
              $elem5 = null;
              $elem5 = new \Xin\Thrift\Notice\Email();
              $xfer += $elem5->read($input);
              $this->target []= $elem5;
            }
            $xfer += $input->readListEnd();
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
    $xfer += $output->writeStructBegin('EmailInfo');
    if ($this->emailContent !== null) {
      if (!is_object($this->emailContent)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('emailContent', TType::STRUCT, 1);
      $xfer += $this->emailContent->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->target !== null) {
      if (!is_array($this->target)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('target', TType::LST, 2);
      {
        $output->writeListBegin(TType::STRUCT, count($this->target));
        {
          foreach ($this->target as $iter6)
          {
            $xfer += $iter6->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

