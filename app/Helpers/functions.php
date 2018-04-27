<?php
/**
 * Created by PhpStorm.
 * User: zhuxingzhao
 * Date: 2017/10/6
 * Time: 22:36
 */

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use PHPHtmlParser\Dom;

/**
 * 响应json数据
 * @param  mixed    $data
 * @param  integer  $err_code
 * @param  string   $err_msg
 * @param  string   $redirect_url
 * @return \Symfony\Component\HttpFoundation\Response
 */
function RJM($data, $err_code, $err_msg = '', $redirect_url = null)
{
    return response([
        'errcode' => $err_code,
        'errmsg' => $err_msg,
        'data' => $data,
        'redirect' => $redirect_url,
    ]);
}



/**
 * 邮件爬取函数
 */


function get_zid_and_cookies(){
    $client = new Client();
    $jar = new CookieJar();
    $params = array(
        'user' => env("ROOT_EMAIL"),
        'password' => env("ROOT_EMAIL_PASS"),
        'auth_code' => '',
        'login_sll' => '0',
        'referer' => 'http://mail.zjut.edu.cn/admin',
        'go' => 'http://mail.zjut.edu.cn/admin?q=base'
    );

    $response = $client->get("http://mail.zjut.edu.cn/admin/?q=login.check.do", [
        'form_params' => [
            'user' => env('ROOT_EMAIL')
        ],
        'cookies' => $jar
    ]);

    $response = $client->post("http://mail.zjut.edu.cn/admin?q=login.do", [
        'form_params' => $params,
        'cookies' => $jar,
        'allow_redirects' => false,

    ]);


    $zid = $response->getHeader('Location');
    $zid = explode('=',explode('&', $zid[0])[1])[1];

    return array(
      'zid' => $zid,
      'cookie' => $jar
    );
}

function get_group_id($pgid, $zid, $jar, $group_name) {
    $client = new Client();
    $response = $client->post('http://mail.zjut.edu.cn/admin/?q=group_list_box.do&zid='.$zid, [
        'cookies' => $jar,
        'form_params' => [
            'pgid' => $pgid,
            'domain_name' => 'zjut.edu.cn',
            'domain_id' => 2
        ]
    ]);

    $data = json_decode($response->getBody(), true)['data'];
    foreach ($data as $k => $v) {
        if ($v['group_name'] === $group_name) {
            return $v['group_id'];
        }
    }
}

function get_user_query($sid, $zid, $jar, $group_id, $hide_group_path) {
//    $client = new Client();
    $query = array(
        'lookup_scope' => 'group',
        'group_id' => $group_id,
        'hide_group_path' => $hide_group_path,
        'acct_type' => 'real',
        'acct_name' => $sid,
        'q' => 'user_list',
        'zid' => $zid,
        'is_advance' => 0,
        'sort_order' => 'asc',
        'sort_key' => 'acct_name',
        'mode' => 'search',
        'table_column' => 'expiration_time,real_name,quota,used_quota,init_time,lock_status',
        'search_column' => ''
    );
//    $response = $client->post("http://mail.zjut.edu.cn/admin/?" . http_build_query($query), [
//        'cookies' => $jar
//    ]);
//
//    $html = $response->getBody();
//    $user_func = '';
//    $user_func_preg = "/getDetail\(.*?\)/";
//    preg_match($user_func_preg, $html, $user_func);
//    $user_func = explode(', ', $user_func[0]);
//    $user_id = explode("'", $user_func[1])[1];
    return $query;
}

function get_user_form($sid, $zid, $jar, $back_url) {
    $client = new Client();
    $query = array(
        'q' => 'user_manage.do',
        'action' => 'edit',
        'acct_name' => $sid,
        'back_url' => $back_url,
        'zid' => $zid
    );
    $response = $client->post("http://mail.zjut.edu.cn/admin/?" . http_build_query($query), [
        'cookies' => $jar
    ]);
    $dom = new Dom;
    $dom->load($response->getBody());
    $form = $dom->find('input[name=*]');
    $query = array();
    foreach ($form as $content) {
        $query[$content->getAttribute('name')] = $content->value;
//        echo $content->value."\n";
    }
    unset($query['randpasswd']);
    unset($query['randpasswd_ck']);
    unset($query['randpasswd_digit']);
    unset($query['expiration_time']);
    unset($query['select_group']);
    unset($query['archive_allow_sso']);
    unset($query['calendar_status']);
    unset($query['prevStep']);
    return $query;


}


