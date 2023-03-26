<?php


  function getVehicles($sort_by, $make_id, $type_id, $class_id) {
    global $db;

    $sql = "SELECT * FROM vehicles";

    if ($make_id) {
      $sql .= " WHERE make_id = :make_id";
    }

    if ($type_id) {
      if ($make_id) {
        $sql .= " AND type_id = :type_id";
      } else {
        $sql .= " WHERE type_id = :type_id";
      }
    }

    if ($class_id) {
      if ($make_id || $type_id) {
        $sql .= " AND class_id = :class_id";
      } else {
        $sql .= " WHERE class_id = :class_id";
      }
    }

    switch ($sort_by) {
      case 'price':
        $sql .= " ORDER BY price DESC";
        break;
      case 'year':
        $sql .= " ORDER BY year DESC";
        break;
      default:
        $sql .= " ORDER BY price DESC";
        break;
    }

    $statement = $db->prepare($sql);
    if($type_id)
      $statement->bindValue(':type_id', $type_id);
    if($class_id)
      $statement->bindValue(':class_id', $class_id);
    if($make_id)
      $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
  }

  function addVehicle($year, $model, $price, $type_id, $class_id, $make_id) {
    global $db;
    $sql = "INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) VALUES (:year, :model, :price, :type_id, :class_id, :make_id)";
    $statement = $db->prepare($sql);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    return $statement->execute();
  }

  function deleteVehicle($id) {
    global $db;
    $sql = "DELETE FROM vehicles WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id);
    return $statement->execute();
  }


?>