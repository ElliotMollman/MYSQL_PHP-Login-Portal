<?php
//check connection. Using OOP oriented style instead of "mysqli_connect". It will return errors that the other won't.
if (!$mysqli = new mysqli("127.0.0.1", "root", "password", "users")) {
    die("Connection falied: ");
}
