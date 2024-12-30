<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function courses(){
        return view('pages.course.init');
    }
    public function dashboard(){
        return view('pages.dashboard');
    }
    public function student(){
        return view('pages.student.init');
    }
    public function videos(){
        return view('pages.course.view');
    }
    public function login(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }
}