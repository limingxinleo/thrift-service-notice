<?php

namespace App\Thrift\Clients;

use App\Thrift\Client;
use Xin\Thrift\MicroService\AppClient as AppServiceClient;
use Xin\Thrift\Notice\NoticeClient as NoticeServiceClient;

class NoticeClient extends Client
{
    protected $host = '127.0.0.1';

    protected $port = '52102';

    protected $service = 'notice';

    protected $clientName = NoticeServiceClient::class;

    protected $recvTimeoutMilliseconds = 10;

    protected $sendTimeoutMilliseconds;

    /**
     * @desc
     * @author limx
     * @param array $config
     * @return NoticeServiceClient
     */
    public static function getInstance($config = [])
    {
        return parent::getInstance($config);
    }


}

