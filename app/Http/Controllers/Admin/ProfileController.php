<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile; //Profile Modelを扱う宣言

class ProfileController extends Controller
{
    //addアクション
    public function add(){
        return view('admin.profile.create');
    }
    
    //createアクション
    public function create(Request $request){
        // Profile.php に Validation を行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        
        // admin/profile/create にリダイレクトする
        return redirect('admin/profile/create');
    }
    
    //editアクション
    public function edit(){
        return view('admin.profile.edit');
    }
    
    //updateアクション
    public function update(){
        return redirect('admin/profile/edit');
    }
}
