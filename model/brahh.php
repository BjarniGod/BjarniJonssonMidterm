<?php

require_once 'database.php';

class Vehicle {
  private $db;

  public function __construct() {
    global $db;
    $this->db = $db;
  }

  public function getVehicles($sort_by, $make_id = null, $type_id = null, $class_id = null) {
    $sql = "SELECT * FROM vehicles";

    if ($make_id) {
      $sql .= " WHERE make_id = $make_id";
    }

    if ($type_id) {
      if ($make_id) {
        $sql .= " AND type_id = $type_id";
      } else {
        $sql .= " WHERE type_id = $type_id";
      }
    }

    if ($class_id) {
      if ($make_id || $type_id) {
        $sql .= " AND class_id = $class_id";
      } else {
        $sql .= " WHERE class_id = $class_id";
      }
    }

    switch ($sort_by) {
      case 'price':
        $sql .= " ORDER BY price DESC";
        break;
      case 'year':
        $sql .= " ORDER BY year DESC";
        break;
    }

    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addVehicle($year, $model, $price, $type_id, $class_id, $make_id) {
    $sql = "INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) VALUES (:year, :model, :price, :type_id, :class_id, :make_id)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':type_id', $type_id);
    $stmt->bindParam(':class_id', $class_id);
    $stmt->bindParam(':make_id', $make_id);
    return $stmt->execute();
  }

  public function deleteVehicle($id) {
    $sql = "DELETE FROM vehicles WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }
}

?>