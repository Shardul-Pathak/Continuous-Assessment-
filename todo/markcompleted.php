<?php
require 'database/db.php';

$pdo = connectDB();

$fields = [
    'is_completed' => 1
];

$conditions = [
    'id' => $_GET['id']
];

dbupdate($pdo, 'todos', $fields, $conditions);

header("Location: index.php");