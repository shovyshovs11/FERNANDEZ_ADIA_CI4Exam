<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }

        $data['user'] = [
            'name'    => session()->get('name'),
            'email'   => session()->get('email'),
            'user_id' => session()->get('user_id')
        ];

        return view('dashboard/index', $data);
    }
}