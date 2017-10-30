<?php
/**
 * Created by PhpStorm.
 * User: zhuxingzhao
 * Date: 2017/10/20
 * Time: 19:31
 */

namespace App\Swoole;


use swoole_server;

class SwooleServer
{
    public $serv;

    public function __construct() {
        $this->serv = new swoole_server('0.0.0.0',9501);
        $this->serv->set(array(
            'worker_num' => 4,
            'daemonize' => true,
            'backlog' => 128
        ));
        $this->serv->on('Start', array($this, 'onStart'));
        $this->serv->on('Connect', array($this, 'onConnect'));
        $this->serv->on('Receive', array($this, 'onReceive'));
        $this->serv->on('Close', array($this, 'onClose'));
    }

    public function start() {
        $this->serv->start();
    }

    public function onStart(swoole_server $serv) {

    }

    public function onConnect(swoole_server $serv, $fd, $from_id){

    }

    public function onReceive(swoole_server $serv, $fd, $from_id){

    }

    public function onClose(swoole_server $serv, $fd, $from_id, $data){

    }



}