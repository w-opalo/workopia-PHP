<?php

namespace App\controllers;

use Framework\Database;
use Framework\Validation;

class ListingController
{
    protected $db;

    public function __construct()
    {

        $config = require basePath("config/db.php");
        $this->db = new Database($config);
    }

    public function index()
    {
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();

        loadView("listings/index", [
            "listings" => $listings,
        ]);
    }

    public function create()
    {
        loadView("listings/create");
    }

    public function show($params)
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        //check if listing exist
        if (!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        loadView('listings/show', [
            'listing' => $listing
        ]);
    }

    /**
     * Store data in database
     * @return void
     */
    public function store()
    {
        $allowedFields = ['title', 'description', 'salary', 'requirements', 'benefits', 'company', 'city', 'state', 'tags', 'address', 'email', 'phone'];

        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
        inspectAndDie($newListingData);
    }
}
