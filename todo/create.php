<?php
require 'database/db.php';
if (isset($_POST['description'])) {
    
    if (empty($_POST['description']) || empty($_POST['due_date'])) {
        $errorMessage = "All fields are required";
    } else {
        $pdo = connectDB();
        if (addTask($pdo,"todos",["description" => $_POST['description'],
        "due_date" => $_POST['due_date'],"is_completed"=> 0])) {
            $successMessage = "Todo created successfully";
        }
    }
}

require 'views/create.html';