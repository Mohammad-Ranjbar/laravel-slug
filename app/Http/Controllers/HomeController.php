<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Menu\Link;
use Spatie\Menu\Menu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    // public function page()
    // {
	//     $menu =Menu::new()
	//                ->prefixLinks('/foo')
	//                ->submenu(function (Menu $menu) {
	// 	               $menu
	// 		               ->prefixLinks('/bar')
	// 		               ->add('/baz', 'Baz');
	//                });
	//
	//
	//     return view('welcome',compact('menu'));
    // }
}
