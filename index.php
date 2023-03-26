<?php require('model/database.php'); ?>
<?php require('model/classes_db.php'); ?>
<?php require('model/makes_db.php'); ?>
<?php require('model/types_db.php'); ?>
<?php require('model/vehicles_db.php'); ?>


<?php

    // Filter the user input and set the necessary variables
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    if (!$vehicle_id) {
        $vehicle_id = filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);
    }

    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    if (!$type_id) {
        $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    }

    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    if (!$class_id) {
        $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    }

    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    if (!$make_id) {
        $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    }

	$sortBy = filter_input(INPUT_POST, 'sortBy', FILTER_SANITIZE_STRING);
    if (!$sortBy) {
        $sortBy = filter_input(INPUT_GET, 'sortBy', FILTER_SANITIZE_STRING);
        // if (!$sortBy) {
        //     $sortBy = 'price';
        // }
    }

    // Set the default action
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_inventory';
        }
    }

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}


	switch($action) {
		// case "filter":
		// 	$vehicles = getVehicles($sortBy, $make_id, $type_id, $class_id);
        //     // include('view/list_inventory.php');
        //     header('Location: .?action=list_inventory');
		// case "admin":
        //     $types = getTypes();
        //     $classes = getClasses();
        //     $makes = getMakes();
        //     $vehicles = getVehicles($sortBy, $make_id, $type_id, $class_id);
		// 	include('view/admin.php');
		default:
            $types = getTypes();
            $classes = getClasses();
            $makes = getMakes();
            console_log($sortBy);
            console_log($make_id);
            console_log($type_id);
            console_log($class_id);
			$vehicles = getVehicles($sortBy, $make_id, $type_id, $class_id);
            // foreach($vehicles as $vehicle):
            // console_log($vehicle['model']);
            // endforeach;
            include('view/list_inventory.php');
	}

?>
