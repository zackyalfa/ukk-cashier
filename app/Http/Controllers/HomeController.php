<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *

    /**
         * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = null;

        if (auth(    )->user()->role == 'superadmin') {
            $userCount = \App\Models\User::count();
        }

        $productCount     = \App\Models\Product::count();
        $salesCount = \App\Models\Sale::count();
        $memberCount = \App\Models\Member::count();

        return view('home    ', compact('userCount', 'productCount', 'salesCount', 'memberCount'));
    }

    public function blank()
    {
        return view('layouts.blank-page');
    }
}
