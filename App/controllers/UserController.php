<?php

namespace App\controllers;

use Framework\Database;
use Framework\Validation;

class UserController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath("config/db.php");
        $this->db = new Database($config);
    }

    /**
     * Show the logIn Page
     * 
     * @return void
     * 
     */
    public function login()
    {
        loadView("user/login");
    }


    /**
     * Show the register Page
     * 
     * @return void
     * 
     */
    public function create()
    {
        loadView("user/create");
    }






    // public function create()
    // {
    //     return view('auth/register');
    // }

    // public function store()
    // {
    //     $data = [
    //         'name' => $_POST['name'],
    //         'email' => $_POST['email'],
    //         'password' => $_POST['password'],
    //         'password_confirmation' => $_POST['password_confirmation']
    //     ];

    //     $errors = [];

    //     if (!Validation::string($data['name'])) {
    //         $errors['name'] = 'Name is required';
    //     }

    //     if (!Validation::email($data['email'])) {
    //         $errors['email'] = 'Email is required';
    //     }

    //     if (!Validation::string($data['password'])) {
    //         $errors['password'] = 'Password is required';
    //     }

    //     if (!Validation::match($data['password'], $data['password_confirmation'])) {
    //         $errors['password_confirmation'] = 'Passwords do not match';
    //     }

    //     if (count($errors)) {
    //         return view('auth/register', ['errors' => $errors]);
    //     }

    //     $db = new Database();
    //     $db->insert('users', $data);

    //     return redirect('/auth/login');
    // }

    // public function login()
    // {
    //     return view('auth/login');
    // }
}
