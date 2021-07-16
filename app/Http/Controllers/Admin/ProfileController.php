<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //addアクション
    public function add(){
        return view('admin.profile.create');
    }
    //createアクション
    public function create(){
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
