<?php

namespace App\controllers;

class ErrorController
{
    public static function notFound($message = 'Resource not found')
    {
        http_response_code(404);
        loadView("error", [
            "status" => "404",
            'message' => $message
        ]);
    }

    public static function unauthosrised($message = 'You are not authosied to view this page')
    {
        http_response_code(403);
        loadView("error", [
            "status" => "403",
            'message' => $message
        ]);
    }
}
