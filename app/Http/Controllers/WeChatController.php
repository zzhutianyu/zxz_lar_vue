<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Text;
use http\Exception\BadMethodCallException;
use Illuminate\Http\Request;

class WeChatController extends Controller
{
    protected $wechat;

    public function __construct()
    {
        $option = array(
            'debug'  => false,
            'app_id' => config('wechat.app_id'),
            'secrte' => config('wechat.secrte'),
            'token' => config('wechat.token'),
            'aes_key' => config('wechat.aes_key')
        );

        $this->wechat = new Application($option);
    }

    public function serve() {
        $this->wechat->server->setMessageHandler(function($message) {
           $type = $message->MsgType;
           try {
               $response = $this->$type($message);
               return $response;
           } catch (BadMethodCallException $e) {
               return '问题来了';
           }
        });
        $response = $this->wechat->server->serve();
        return $response;
    }

    /**
     * 处理事件消息
     * 通过反射分发消息给其他方法
     *
     * @return string
     */
    public function event($message) {
        $eventType = $message->Event;
        $response = $this->$eventType($message); //反射到各个事件类型的方法
        return $response;
    }
    /**
     * 模板消息送达通知
     *
     * @return string
     */
    public function TEMPLATESENDJOBFINISH($message) {
        if($templateMessage = TemplateMessage::getMessageByMsgid($message->MsgID)) {
            $flag = $message->Status == 'success' ? 1 : -1;
            TemplateMessage::setStatus($message->MsgID, $flag);
        }
        return '';
    }
    /**`
     * 扫描二维码消息
     *
     * @return string
     */
    public function SCAN($message) {
        return wechatModule('scan', $message);
    }
    /**
     * 处理文本消息
     *
     * @return string
     */
    public function text($message)
    {
        //$response = $this->matchKeyword($message);
        $response = new Text();
        $response->content = 'test';
        return $response ? $response : '';
    }
    /**
     * 处理关键字匹配
     * @param $message
     * @return mixed
     */
    public function matchKeyword($message) {
        $content = $message->MsgType == 'text' ? $message->Content : $message->EventKey;
        $keywords = config('keyword');
        foreach($keywords as $key => $value) {
            if($value['status'] == 1 && $this->isMatch($content, $value)) {
                return $this->reply($value['reply'], $message);
            }
        }
    }
    /**
     * @param $reply
     * @param $message
     * @return bool|Article|Image|Material|News|Text|Video|Voice
     */
//    function reply($reply, $message) {
//        switch ($reply['type']) {
//            case 'userapi':
//                $func = $reply['content'];
//                try {
//                    return wechatModule($func, $message);
//                } catch (BadMethodCallException $e) {
//                    //do log or sth.
//                    return '';//回复默认消息
//                }
//                break;
//            case 'text':
//                $text = new Text(['content' => $reply['content']]);
//                return $text;
//                break;
//            case 'image':
//                $image = new Image(['media_id' => $reply['content']]);
//                return $image;
//                break;
//            case 'video':
//                $video = new Video([
//                    'title' => isset($reply['title']) ? $reply['title'] : '',
//                    'media_id' => $reply['content'],
//                    'description' => isset($reply['description']) ? $reply['description'] : '',
//                ]);
//                return $video;
//                break;
//            case 'voice':
//                $voice = new Voice(['media_id' => $reply['content']]);
//                return $voice;
//                break;
//            case 'news':
//                $news = new News([
//                    'title' => isset($reply['title']) ? $reply['title'] : '',
//                    'description' => isset($reply['description']) ? $reply['description'] : '',
//                    'url' => isset($reply['url']) ? $reply['url'] : '',
//                    'image' => isset($reply['image']) ? $reply['image'] : '',
//                    // ...
//                ]);
//                return $news;
//                break;
//            case 'article':
//                $article = new Article([
//                    'title' => isset($reply['title']) ? $reply['title'] : '',
//                    'author' => isset($reply['author']) ? $reply['author'] : '',
//                    'content' => $reply['content'],
//                    // ...
//                ]);
//                return $article;
//                break;
//            case 'material':
//                $material = new Material('mpnews', $reply['content']);
//                return $material;
//                break;
//            default:
//                return false;
//        }
//    }
    /**
     * 处理关键词是否匹配
     * @param $message
     * @param $keyword
     * @return bool
     */
    public function isMatch($message, $keyword) {
        switch ($keyword['type']) {
            case '1':
                return $message == $keyword['content'];
                break;
            case '2':
                return !!strstr($message, $keyword['content']);
                break;
            case '3':
                return !!preg_match('/(' . $keyword['content'] . ')/is', $message);
                break;
            default:
                return false;
        }
    }
    /**
     * 处理浏览会员卡事件
     *
     * @return string
     */
    public function user_view_card($message)
    {
        return '';
    }
    /**
     * 处理从会员卡进入公众号事件
     *
     * @return string
     */
    public function user_enter_session_from_card($message)
    {
        return '';
    }
    /**
     * 处理点击事件消息
     *
     * @return string
     */
    public function click($message) {
        $response = $this->matchKeyword($message);
        return $response ? $response:'';
    }
    /**
     * 处理关注事件消息
     *
     * @return string
     */
    public function subscribe($message) {
        return "";
    }
    /**
     * 处理取消关注事件消息
     *
     * @return string
     */
    public function unsubscribe($message) {
        //do sth.
//        if($user = User::where('openid', $message->FromUserName)->first()) {
//            $user->subscribe = 0;
//            $user->save();
//        }
        return;
    }
    /**
     * 处理图片消息
     *
     * @return string
     */
    public function image($message) {
        return "";
    }
    /**
     * 处理语音消息
     *
     * @return string
     */
    public function voice($message) {
        return "";
    }
    /**
     * 处理视频消息
     *
     * @return string
     */
    public function video($message) {
        return "";
    }
    /**
     * 处理小视频消息
     *
     * @return string
     */
    public function shortvideo($message) {
        return "";
    }
    /**
     * 处理位置消息
     *
     * @return string
     */
    public function location($message) {
        return "";
    }
    /**
     * 处理链接消息
     *
     * @return string
     */
    public function link($message) {
        return "";
    }
}
