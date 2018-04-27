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

/** 获取用户验证参数及cookie
 * @return array
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

/** 获取用户组id
 * @param int $pgid 本科组|硕士组
 * @param string $zid
 * @param $jar
 * @param string $group_name
 * @return string
 */
function get_group_id(int $pgid, string $zid, $jar, string $group_name) {
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

/** 获取下一步传递参数back_url
 * @param string $sid
 * @param string $zid
 * @param $jar
 * @param string $group_id
 * @param string $hide_group_path
 * @return array
 */
function get_user_query(string $sid, string $zid, $jar, string $group_id, string $hide_group_path) {
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

    return $query;
}

/** 获取修改表单参数
 * @param string $sid
 * @param string $zid
 * @param $jar
 * @param array $back_url
 * @return array
 */
function get_user_form(string $sid, string $zid, $jar, array $back_url) {
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
    }


    // 去除无关参数
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


