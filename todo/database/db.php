<?php
    function connectDB () {
        return new PDO('mysql:host=127.0.0.1;dbname=todos', 'root', '123456');
    }

    function fetchAll($pdo,$tableName) {
        $query = "SELECT * FROM {$tableName}";
        $statement = $pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function addTask($pdo,string $tableName,array $fields) {
        $fieldNames = implode(',',array_keys($fields));
        $values = array_values($fields);
        $query = "INSERT INTO $tableName ($fieldNames) VALUES (?, ?, ?)";
        $statement = $pdo->prepare($query);
        return $statement->execute($values);
    }
    
    function dbupdate($pdo, string $tableName, array $fields, array $conditions)
    {
        $query = "UPDATE $tableName SET ";
        foreach ($fields as $key => $value) {
            $fieldArray[] = "$key = ?";
        }
        $query .= implode(', ', $fieldArray);
        foreach ($conditions as $key => $value) {
            $conditionArray[] = "$key = ?";
        }
        $query .= " WHERE " . implode('AND ', $conditionArray);
        $statement = $pdo->prepare($query);
        $values = array_values($fields);
        $conditionValues = array_values($conditions);
        return $statement->execute(array_merge($values, $conditionValues));
    }

    function dbdelete($pdo, string $tableName, $id)
    {
        $query = "DELETE FROM $tableName WHERE id = $id";
        $statement = $pdo->prepare($query);
        return $statement->execute();
    }
?>