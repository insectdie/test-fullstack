<?php

function getDatabaseConfig(): array {
    return [
        "database" => [
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=test_fullstack",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}