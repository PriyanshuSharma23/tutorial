<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


// all fields are required
if (empty($name) || empty($email) || empty($password)) {
    http_response_code(400);
    echo "All fields are required";
    exit;
}

// email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Invalid email address";
    exit;
}

// password length
if (strlen($password) < 6) {
    http_response_code(400);
    echo "Password must be at least 6 characters";
    exit;
}

$result;

// check for credentials.xml if exists add new user
if (file_exists('credentials.xml')) {
    $xml = simplexml_load_file('credentials.xml');
    $user = $xml->addChild('user');
    $user->addChild('name', $name);
    $user->addChild('email', $email);
    $user->addChild('password', $password);
    $result = $xml->asXML('credentials.xml');
} else {
    // create new xml file
    $xml = new SimpleXMLElement('<users></users>');
    $user = $xml->addChild('user');
    $user->addChild('name', $name);
    $user->addChild('email', $email);
    $user->addChild('password', $password);
    $result = $xml->asXML('credentials.xml');
}

if ($result) {
    http_response_code(200);
    echo "User added successfully";
} else {
    http_response_code(500);
    echo "Something went wrong";
}
