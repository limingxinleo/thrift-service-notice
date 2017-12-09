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


class EmailSearch {
  static $isValidate = false;

  static $_TSPEC = array(
    1 => array(
      'var' => 'searchNumber',
      'isRequired' => false,
      'type' => TType::I64,
      ),
    2 => array(
      'var' => 'searchCode',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    3 => array(
      'var' => 'pageIndex',
      'isRequired' => false,
      'type' => TType::I32,
      ),
    4 => array(
      'var' => 'pageSize',
      'isRequired' => false,
      'type' => TType::I32,
      ),
    );

  /**
   * @var int
   */
  public $searchNumber = null;
  /**
   * @var string
   */
  public $searchCode = null;
  /**
   * @var int
   */
  public $pageIndex = 0;
  /**
   * @var int
   */
  public $pageSize = 10;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['searchNumber'])) {
        $this->searchNumber = $vals['searchNumber'];
      }
      if (isset($vals['searchCode'])) {
        $this->searchCode = $vals['searchCode'];
      }
      if (isset($vals['pageIndex'])) {
        $this->pageIndex = $vals['pageIndex'];
      }
      if (isset($vals['pageSize'])) {
        $this->pageSize = $vals['pageSize'];
      }
    }
  }

  public function getName() {
    return 'EmailSearch';
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
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->searchNumber);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->searchCode);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->pageIndex);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->pageSize);
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
    $xfer += $output->writeStructBegin('EmailSearch');
    if ($this->searchNumber !== null) {
      $xfer += $output->writeFieldBegin('searchNumber', TType::I64, 1);
      $xfer += $output->writeI64($this->searchNumber);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->searchCode !== null) {
      $xfer += $output->writeFieldBegin('searchCode', TType::STRING, 2);
      $xfer += $output->writeString($this->searchCode);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->pageIndex !== null) {
      $xfer += $output->writeFieldBegin('pageIndex', TType::I32, 3);
      $xfer += $output->writeI32($this->pageIndex);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->pageSize !== null) {
      $xfer += $output->writeFieldBegin('pageSize', TType::I32, 4);
      $xfer += $output->writeI32($this->pageSize);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

