<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Profile Modelを扱う宣言
use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

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
    
    //indexアクション
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != ''){
            // 検索されたら検索結果を取得する
            $posts = Profile::where('name', $cond_name)->get();
        } else {
            //それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }
    
    //editアクション
    public function edit(Request $request){
        
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    //updateアクション
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        //送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);
        
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        // ProfileHistory Modelに編集履歴を追加
    	$profilehistory = new ProfileHistory;
    	$profilehistory->profile_id = $profile->id;
    	$profilehistory->edited_at = Carbon::now();
    	$profilehistory->save();
        
        return redirect('admin/profile');
    }
}
