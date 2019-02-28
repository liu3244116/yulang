<?php

namespace app\index\controller;

use app\common\model\yl_home;
use think\Controller;

class Home extends Controller
{
    /**
     * 首页设置显示页
     */
    public function index(){
        $sets = yl_home::select();
        return view();
    }

    /**
     * 首页设置保存
     */
    public function save(){
        return '这是保存';
    }
}
