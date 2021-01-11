<?php

namespace App\Http\Controllers;

use App\TaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //展示登录页面
    public function login()
    {
        return view("login");
    }

    public function create()
    {
        //负责人
        $salesman=DB::table("salesman")->get();
        return view("create",compact("salesman"));
    }

    public function save(Request $request)
    {
        $validate = $request->validate([
            'task_name' => 'required',
            's_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'desc' => 'required',
        ]);
        $data=DB::table("task")->insert($validate);
        if ($data){
            return ['code'=>200,'msg'=>'success','data'=>$data];
        }else{
            return ['code'=>500,'msg'=>'error','data'=>[]];
        }
    }

    public function taskCount()
    {
        $data=DB::table("Task")->join("salesman",'s_id',"=","salesman.id")->paginate(5);
        return view("taskCount","data");
    }
    public function index()
    {
        $data=DB::table("Task")->join("salesman",'s_id',"=","salesman.id")->where('salesman.id',"=",2)->paginate(5);
        return view("index",compact("data"));
    }

}
