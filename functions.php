<?php declare(strict_types=1);
function SplitNames($names) {
    $names = explode(" ", $names);
    return $names;
}

function SanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function ValidateEmail($email) {
    if (!empty($_POST['email'])) {
        $email = SanitizeInput($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Invalid email';
        } else {
            echo 'Email looks okay';
        }
    } else {
        echo 'Email cannot be left blank';
        echo 'Validation failed due to empty email';
    }
    return 0;
}