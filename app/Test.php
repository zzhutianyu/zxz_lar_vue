<?php
/**
 * Created by PhpStorm.
 * User: zhuxingzhao
 * Date: 2017/10/5
 * Time: 23:02
 */

namespace App;
use DB;
use Jenssegers\Mongodb\Eloquent\Model;

class Test extends Model
{
    protected $connection = 'Users';
    protected $cllection = 'zhutianyu';


    public static function test() {
        $users= DB::collection('test')->get();
        return $users;
    }

}