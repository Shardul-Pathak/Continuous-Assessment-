<?php
require 'classes/Todo.php';
require 'database/db.php';

$pdo = connectDB();
$rows = fetchAll($pdo, "todos");

$todos = [];
$todosDueToday = [];
$today = date('Y-m-d');

foreach ($rows as $row) {
    $todo = new Todo($row['description'], $row['due_date'], $row['id']);
    if ($row['is_completed']) {
        $todo->markAsCompleted();
    }
    if ($todo->dueDate === $today && !$todo->isCompleted) {
        $todosDueToday[] = $todo;
    }
    $todos[] = $todo;
}


require 'views/index.html';