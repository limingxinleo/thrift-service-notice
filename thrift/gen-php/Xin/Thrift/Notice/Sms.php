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


class Sms {
  static $isValidate = false;

  static $_TSPEC = array(
    1 => array(
      'var' => 'mobile',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    2 => array(
      'var' => 'content',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    3 => array(
      'var' => 'template',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    4 => array(
      'var' => 'data',
      'isRequired' => false,
      'type' => TType::MAP,
      'ktype' => TType::STRING,
      'vtype' => TType::STRING,
      'key' => array(
        'type' => TType::STRING,
      ),
      'val' => array(
        'type' => TType::STRING,
        ),
      ),
    5 => array(
      'var' => 'searchNumber',
      'isRequired' => false,
      'type' => TType::I64,
      ),
    6 => array(
      'var' => 'searchCode',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    );

  /**
   * @var string
   */
  public $mobile = null;
  /**
   * @var string
   */
  public $content = "";
  /**
   * @var string
   */
  public $template = "";
  /**
   * @var array
   */
  public $data = null;
  /**
   * @var int
   */
  public $searchNumber = 0;
  /**
   * @var string
   */
  public $searchCode = "";

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['mobile'])) {
        $this->mobile = $vals['mobile'];
      }
      if (isset($vals['content'])) {
        $this->content = $vals['content'];
      }
      if (isset($vals['template'])) {
        $this->template = $vals['template'];
      }
      if (isset($vals['data'])) {
        $this->data = $vals['data'];
      }
      if (isset($vals['searchNumber'])) {
        $this->searchNumber = $vals['searchNumber'];
      }
      if (isset($vals['searchCode'])) {
        $this->searchCode = $vals['searchCode'];
      }
    }
  }

  public function getName() {
    return 'Sms';
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
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->mobile);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->content);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->template);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::MAP) {
            $this->data = array();
            $_size7 = 0;
            $_ktype8 = 0;
            $_vtype9 = 0;
            $xfer += $input->readMapBegin($_ktype8, $_vtype9, $_size7);
            for ($_i11 = 0; $_i11 < $_size7; ++$_i11)
            {
              $key12 = '';
              $val13 = '';
              $xfer += $input->readString($key12);
              $xfer += $input->readString($val13);
              $this->data[$key12] = $val13;
            }
            $xfer += $input->readMapEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->searchNumber);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->searchCode);
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
    $xfer += $output->writeStructBegin('Sms');
    if ($this->mobile !== null) {
      $xfer += $output->writeFieldBegin('mobile', TType::STRING, 1);
      $xfer += $output->writeString($this->mobile);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->content !== null) {
      $xfer += $output->writeFieldBegin('content', TType::STRING, 2);
      $xfer += $output->writeString($this->content);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->template !== null) {
      $xfer += $output->writeFieldBegin('template', TType::STRING, 3);
      $xfer += $output->writeString($this->template);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->data !== null) {
      if (!is_array($this->data)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('data', TType::MAP, 4);
      {
        $output->writeMapBegin(TType::STRING, TType::STRING, count($this->data));
        {
          foreach ($this->data as $kiter14 => $viter15)
          {
            $xfer += $output->writeString($kiter14);
            $xfer += $output->writeString($viter15);
          }
        }
        $output->writeMapEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->searchNumber !== null) {
      $xfer += $output->writeFieldBegin('searchNumber', TType::I64, 5);
      $xfer += $output->writeI64($this->searchNumber);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->searchCode !== null) {
      $xfer += $output->writeFieldBegin('searchCode', TType::STRING, 6);
      $xfer += $output->writeString($this->searchCode);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

