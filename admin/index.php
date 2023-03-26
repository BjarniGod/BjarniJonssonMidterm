<?php require('../model/database.php'); ?>
<?php require('../model/classes_db.php'); ?>
<?php require('../model/makes_db.php'); ?>
<?php require('../model/types_db.php'); ?>
<?php require('../model/vehicles_db.php'); ?>


<?php

    // Filter the user input and set the necessary variables
    $year = filter_input(INPUT_POST, "vehicle_year", FILTER_SANITIZE_STRING);
    $model = filter_input(INPUT_POST, "vehicle_model", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "vehicle_price", FILTER_SANITIZE_STRING);
    $make_name = filter_input(INPUT_POST, "make_name", FILTER_SANITIZE_STRING);
    $type_name = filter_input(INPUT_POST, "type_name", FILTER_SANITIZE_STRING);
    $class_name = filter_input(INPUT_POST, "class_name", FILTER_SANITIZE_STRING);

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
		case "delete_vehicle":
            if($vehicle_id) {
                deleteVehicle($vehicle_id);
                header("Location: .?action=admin_page");
            } else {
                $error_message = "Missing or incorrect vehicle ID";
                include('view/error.php');
            }
            break;

        case "add_vehicle":
            if($make_id && $model && $year && $type_id && $class_id && $price) {
                addVehicle($year, $model, $price, $type_id, $class_id, $make_id);
                $vehicles = getVehicles($sortBy, $make_id, $type_id, $class_id);
                header("Location: .?action=admin_page");
            } else {
                $error_message = "Missing information about vehicle";
                include('view/error.php');
            }
            break;

        case "list_makes":
            $makes = getMakes();
            include('view/makes_list.php');
            break;

        case "add_make":
            if($make_name) {
                addMake($make_name);
                $makes = getMakes();
                header("Location: .?action=list_makes");
            } else {
                $error_message = "Missing make name";
                include('view/error.php');
            }
            break;

        case "delete_make":
            if($make_id) {
                try {
                deleteMake($make_id);
                } catch (PDOException $e) {
                    $error_message = "You cannot delete a make if a vehicle exists in it!";
                    include('view/error.php');
                    exit();
                }
                header("Location: .?action=list_makes");
            } else {
                $error_message = "Missing make ID!";
                include('view/error.php');
            }
            break;

        case "list_types":
            $types = getTypes();
            include('view/types_list.php');
            break;

        case "add_type":
            if($type_name) {
                addType($type_name);
                $types = getTypes();
                header("Location: .?action=list_types");
            } else {
                $error_message = "Missing type name";
                include('view/error.php');
            }
            break;

        case "delete_type":
            if($type_id) {
                try {
                deleteType($type_id);
                } catch (PDOException $e) {
                    $error_message = "You cannot delete a type if a vehicle exists in it!";
                    include('view/error.php');
                    exit();
                }
                header("Location: .?action=list_types");
            } else {
                $error_message = "Missing type ID!";
                include('view/error.php');
            }
            break;


        case "list_classes":
            $classes = getClasses();
            include('view/classes_list.php');
            break;

        case "add_class":
            if($class_name) {
                addClass($class_name);
                $types = getClasses();
                header("Location: .?action=list_classes");
            } else {
                $error_message = "Missing class name";
                include('view/error.php');
            }
            break;

        case "delete_class":
            if($class_id) {
                try {
                deleteClass($class_id);
                } catch (PDOException $e) {
                    $error_message = "You cannot delete a class if a vehicle exists in it!";
                    include('view/error.php');
                    exit();
                }
                header("Location: .?action=list_classes");
            } else {
                $error_message = "Missing class ID!";
                include('view/error.php');
            }
            break;

    


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
            include('view/admin.php');
	}

?>