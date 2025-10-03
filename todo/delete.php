<?php
require 'database/db.php';

$pdo = connectDB();

$id = $_GET['id'];

dbdelete($pdo, 'todos', $id);

header("Location: index.php");
?>