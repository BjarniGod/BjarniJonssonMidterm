<?php



    // Get all makes
    function getMakes() {
        global $db;
        $query = "SELECT * FROM makes";
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    function getMakeName($make_id) {
        global $db;
        $query = "SELECT * 
        FROM makes
        WHERE id = :make_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $make = $statement->fetch();
        $statement->closeCursor();
        $make_name = $make['name'];
        return $make_name;
    }

    // Add a new make
    function addMake($make) {
        global $db;
        $query = "INSERT INTO makes (name) VALUES (:make)";
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }

    // Delete a make
    function deleteMake($id) {
        global $db;
        $query = "DELETE FROM makes WHERE ID = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }