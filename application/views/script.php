<?php
$input_password = 'admin1';
$stored_hash = '$2y$10$JN.jVHlZlm2fCzoBjsfqnOEa6lEBem1nsISFN9HMSQ9PK3OGke/WK'; // Replace with an actual hash from your DB

if (password_verify($input_password, $stored_hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>
