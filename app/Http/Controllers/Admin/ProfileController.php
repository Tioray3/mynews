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
    public function edit(Request $request){
        
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    //updateアクション
    public function update(Request $request){
        
        // Validationをかける
        $this->validate($request, News::$rules);
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        //送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);
        
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        return redirect('admin/profile/edit');
    }
}
