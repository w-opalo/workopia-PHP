<?php

namespace App\controllers;

use Framework\Database;

class HomeController
{
    protected $db;

    public function __construct()
    {
        // die('HomeController');
        $config = require basePath("config/db.php");
        $this->db = new Database($config);
    }

    public function index()
    {
        // die('HomeController@index');
        $listings = $this->db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

        loadView("home", [
            "listings" => $listings,
        ]);
    }
}
