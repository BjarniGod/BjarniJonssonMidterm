<?php include('header.php') ?>

	<h1>Zippy Used Autos</h1>

	<!-- Sort by price/year dropdown -->
	<form method="get" action=".">
		<div class="filter">
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
		</div>

		<div class="sort">
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
		</div>
		<input type="submit" value="Submit">
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


	<!-- <a href="./admin">Admin Page</a> -->



<?php include('footer.php') ?>