<?php

return [
    "host" => $_ENV['DB_HOST'],
    "dbname" => $_ENV['DB_NAME'],
    "dbusername" => $_ENV['DB_USERNAME'],
    "dbpassword" => $_ENV["DB_PASSWORD"],
    "charset" => "utf8mb4",
    "options" => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
];
