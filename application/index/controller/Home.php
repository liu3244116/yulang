<?php

namespace app\index\controller;

use app\common\model\yl_home;
use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use think\View;

class Home extends Controller
{
    /**
     * 首页设置显示页
     */
    public function index(){
        $settings = Db::table('yl_home')->select();
        return view('', compact('settings'));
    }

    /**
     * 新增设置
     */
    public function add(){
        return view();
    }
    /**
     * 提交新增
     */
    public function post_add(Request $request){
        $post = $request->post();

        // 验证数据
        $validate = Validate::make([
            'path' => 'require',
            'type' => 'require'
        ]);
        $status = $validate->check($post);
        if(! $status){
            return $this->error($validate->getError());
        }

        // 验证通过，保存数据到数据库
        $result = Db::table('yl_home')->insert([
            'type' => $post['type'],
            'path' => $post['path'],
            'desc' => $post['desc'],
            'btn_url' => $post['btn_url'],
        ]);
        if($result === 0){
            return $this->error('保存失败');
        }
        return $this->success('保存成功', '/index/home');
    }

    /**
     * 删除某条配置
     */
    public function delete(Request $request){
        $post = $request->post();
        halt($post);
    }
}
