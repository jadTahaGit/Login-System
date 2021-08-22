<?php

    $DB_server = "localhost";
    $DB_username = "root";
    $DB_password = "";
    $database = "jadtahagit_login_register";

    $conn = mysqli_connect($DB_server, $DB_username, $DB_password, $database);

if (!$conn) {
    die(" <script>alert('Connection Failed.')</script> ");
}
