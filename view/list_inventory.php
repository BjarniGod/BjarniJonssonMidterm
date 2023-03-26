<?php include('header.php') ?>

	<h1>Zippy Used Autos Inventory</h1>

	<!-- Sort by price/year dropdown -->
	<form method="get" action=".">
		<label for="sort">Sort by:</label>
		<input type="hidden" name="action" value="list_inventory">
		<select id="sort" name="sortBy">
			<option value="price">Price</option>
			<?php if($sortBy == 'year') { ?>
				<option value="year" selected>Year</option>
			<?php } else { ?>
				<option value="year">Year</option>
			<?php } ?>
		</select>
		<input type="submit" value="Sort">
	</form>

	<!-- Filter by make/type/class dropdowns -->
	<form method="get" action=".">
		<label for="make">Make:</label>
		<input type="hidden" name="action" value="list_inventory">
		<select id="make" name="make_id">
			<option value="">--Any--</option>
			<?php foreach($makes as $make): ?>
				<!-- if($make) -->
				<option value="<?= $make['id'] ?>"><?= getMakeName($make['id']); ?></option>
			<?php endforeach; ?>
		</select>
		<label for="type">Type:</label>
		<input type="hidden" name="action" value="list_inventory">
		<select id="type" name="type_id">
			<option value="">--Any--</option>
			<?php foreach($types as $type): ?>
				<option value="<?= $type['id'] ?>"><?= getTypeName($type['id']); ?></option>
			<?php endforeach; ?>
		</select>
		<label for="class">Class:</label>
		<input type="hidden" name="action" value="list_inventory">
		<select id="class" name="class_id">
			<option value="">--Any--</option>
			<?php foreach($classes as $class): ?>
				<option value="<?= $class['id'] ?>"><?= getClassName($class['id']); ?></option>
			<?php endforeach; ?>
		</select>
		<input type="submit" value="Filter">
	</form>

	<!-- Display the inventory -->
	<table>
		<tr>
			<th>Make</th>
			<th>Model</th>
			<th>Year</th>
			<th>Type</th>
			<th>Class</th>
			<th>Price</th>
		</tr>
		<?php foreach($vehicles as $vehicle): ?>
			<tr>
				<td><?= getMakeName($vehicle['make_id']); ?></td>
				<td><?= $vehicle['model']; ?></td>
				<td><?= $vehicle['year']; ?></td>
				<td><?= getTypeName($vehicle['type_id']); ?></td>
				<td><?= getClassName($vehicle['class_id']); ?></td>
				<td>$ <?= $vehicle['price']; ?></td>
        	</tr>
        <?php endforeach ?>
	</table>

        <?php
// require_once 'model/database.php';
// // require_once 'controllers/vehicles_controller.php';

// // Instantiate the vehicles controller
// $vehicles_controller = new VehiclesController();

// // Get the list of vehicles based on the requested criteria
// if (isset($_GET['make'])) {
//     $vehicles = $vehicles_controller->get_vehicles_by_make($_GET['make']);
// } elseif (isset($_GET['type'])) {
//     $vehicles = $vehicles_controller->get_vehicles_by_type($_GET['type']);
// } elseif (isset($_GET['class'])) {
//     $vehicles = $vehicles_controller->get_vehicles_by_class($_GET['class']);
// } else {
//     $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'price';
//     $vehicles = $vehicles_controller->get_all_vehicles_sorted($sort_by);
// }

// // Load the view
// require_once 'views/public/homepage.php'; ?>



<?php include('footer.php') ?>