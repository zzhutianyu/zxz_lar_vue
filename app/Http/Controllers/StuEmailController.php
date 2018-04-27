<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Http\Request;

class StuEmailController extends Controller
{
    public function view() {
        return view("email");
    }

    public function reset(Request $request) {
        $name = $request->get('name');
        $iid = $request->get('iid');
        $sid = $request->get('sid');
        $type = '';
        $stu_session = '';
        $user_group = '';
        $group_id = '';
        $config = get_zid_and_cookies();

        if (strlen($sid) == 12) {
            $type = '本科生';
            $stu_session = substr($sid, 0, 4);
            $group_id = get_group_id(4235, $config['zid'], $config['cookie'], "${stu_session}届${type}") ;
        } else {
            $type = '硕士生​';
            $stu_session = 20 . substr($sid, 3, 2);
            $group_id = get_group_id(4234, $config['zid'], $config['cookie'], "${stu_session}届${type}");
        }

        $back_url = get_user_query($sid, $config['zid'], $config['cookie'], $group_id, "学生组/${type}/${stu_session}届${type}");
        $params = get_user_form($sid, $config['zid'], $config['cookie'], $back_url);
        if (!$params) {
            return RJM(null, -1, '姓名、学号或身份证号错误');
        }
        $params['is_primary'] = $group_id;
        $params['send_' . $group_id] = 'free';
        $params['examine_'.$group_id] = 'free';
        $params['group_id'] = "${group_id},free,free";
        $params['acls'] = '';
        if ( $iid === $params['id_card_num'] && $name === $params['real_name']) {
            $client = new Client();
            $new_pass = substr($iid, 10, 8);
            $params['passwd'] = $new_pass;
            $params['repasswd'] = $new_pass;
            $params['lock_login'] = 1;
            $params['lock_collection'] = 2;
            $params['lock_sleep'] = 0;

//            dd($params);
            $response = $client->post("http://mail.zjut.edu.cn/admin/?q=user_manage.do&zid=" . $config['zid'], [
                'cookies' => $config['cookie'],
                'form_params' => $params
            ]);
            $result = json_decode($response->getBody(), true);
            if ($result['res'] === 0) {
                return RJM(null, 1, '重置成功');
            }

            return RJM(null, -1, '重置失败，出了一点问题');
        }

        return RJM(null, -1, '姓名、学号或身份证号错误');


    }
}
