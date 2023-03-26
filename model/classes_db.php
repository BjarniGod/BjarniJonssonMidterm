<?php

    function getClasses() {
        // $db = Database::getDB();
        global $db;
        $query = 'SELECT * FROM classes';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    function getClassName($class_id) {
        global $db;
        $query = "SELECT * 
        FROM classes
        WHERE id = :class_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        $class_name = $class['name'];
        return $class_name;
    }
    
    function addClass($class_name) {
        // $db = Database::getDB();
        global $db;
        $query = 'INSERT INTO classes (name) VALUES (:class_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_name', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }
    
    function deleteClass($class_id) {
        // $db = Database::getDB();
        global $db;
        $query = 'DELETE FROM classes WHERE ID = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>
