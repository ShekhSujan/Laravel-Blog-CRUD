<?php

namespace App\Http\Controllers\Backend;


use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {


        $data['title'] = 'Dashboard';
        $data['allBlog'] = Blog::count();
        $data['allCategory'] = Category::count();
        $data['allAdmin'] = User::count();
        return view('backend.pages.index')->with($data);
    }
}
