<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    // Show login form
    public function login()
    {
        return view('auth/login');
    }

    // Process login
    public function attemptLogin()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return view('auth/login', [
                'validation' => $this->validator
            ]);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }

        // Set session data
        $sessionData = [
            'user_id'    => $user['id'],
            'name'       => $user['name'],
            'email'      => $user['email'],
            'isLoggedIn' => true,
        ];
        session()->set($sessionData);

        return redirect()->to('dashboard')->with('success', 'Welcome back, ' . $user['name'] . '!');
    }

    // Show register form
    public function register()
    {
        return view('auth/register');
    }

    // Process registration
    public function attemptRegister()
    {
        $rules = [
            'name'             => 'required|min_length[3]|max_length[100]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return view('auth/register', [
                'validation' => $this->validator,
                'oldInput'   => $this->request->getPost()
            ]);
        }

        $data = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->userModel->insert($data);

        return redirect()->to('login')->with('success', 'Registration successful! Please login.');
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('login')->with('success', 'You have been logged out.');
    }
}