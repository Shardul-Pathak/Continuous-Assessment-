<?php
require 'database/db.php';

if (isset($_POST['description'])) {
    
    if (empty($_POST['description']) || empty($_POST['due_date'])) {
        $errorMessage = "All fields are required";
    } else {
        $pdo = connectDB();

        $fields = [
            'description' => $_POST['description'],
            'due_date' => $_POST['due_date'],
        ];
        $conditions = [
            'id' => $_GET['id']
        ];

        if (dbupdate($pdo,"todos", $fields, $conditions)) {
            $successMessage = "Todo Edited successfully";
        }
    }
}

require 'views/edit.html';