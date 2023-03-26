<?php

    function getTypes() {
        global $db;
        $query = 'SELECT * FROM types';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    function getTypeName($type_id) {
        global $db;
        $query = "SELECT * 
        FROM types
        WHERE id = :type_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        $type_name = $type['name'];
        return $type_name;
    }

    function addType($type) {
        global $db;
        $query = 'INSERT INTO types (Type) VALUES (:type)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->execute();
        $statement->closeCursor();
    }

    function deleteType($type_id) {
        global $db;
        $query = 'DELETE FROM types WHERE ID = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }

?>
