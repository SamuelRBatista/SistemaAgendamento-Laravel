<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;


class pagesController extends Controller
{
public function index()
 {
        return view('home');
 }
}