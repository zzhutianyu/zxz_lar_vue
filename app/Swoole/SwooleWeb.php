<?php
/**
 * Created by PhpStorm.
 * User: zhuxingzhao
 * Date: 2017/10/20
 * Time: 19:59
 */
namespace App\Swoole;

class SwooleWeb {

    public $serv;

    public function __construct() {
        $this->serv = new \swoole_websocket_server('0.0.0.0', 9501);
        $this->serv->on('open', array($this, 'onOpen'));
        $this->serv->on('message', array($this, 'onMessage'));
        $this->serv->on('close', array($this, 'onClose'));
    }
    public function start() {
        $this->serv->start();
    }

    public function onOpen(swoole_websocket_server $serv, $request) {

    }

    public function onMessage(swoole_websocket_server $serv, $frame) {

    }

    public function onClose(swoole_websocket_server $serv, $fd) {

    }
}