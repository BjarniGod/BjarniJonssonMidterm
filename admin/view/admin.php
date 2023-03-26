<?php include('header.php') ?>


    <h1>Zippy Admin</h1>

	<section>
		<h2>Add vehicle</h2>
		<form action="." method="post" id="add__form" class="add__form">
			<input type="hidden" name="action" value="add_vehicle">
			<div class="add__inputs">
				<label>Make:</label>
				<select name="make_id" required>
					<option value="None">None</option>
					<?php foreach($makes as $make): ?>
						<?php if($make['id'] != -1) { ?>
						<option value="<?= $make['id'] ?>">
							<?= $make['name'] ?>    
						</option>
						<?php } ?>
					<?php endforeach ?>
				</select>
				<label>Model:</label>
				<input type="text" name="vehicle_model" maxlength="50" placeholder="Model" autofocus required>
				<label>Year:</label>
				<input type="number" name="vehicle_year" maxlength="50" placeholder="Year" autofocus required>
				<label>Type:</label>
				<select name="type_id" required>
					<option value="None">None</option>
					<?php foreach($types as $type): ?>
						<?php if($type['id'] != -1) { ?>
						<option value="<?= $type['id'] ?>">
							<?= $type['name'] ?>    
						</option>
						<?php } ?>
					<?php endforeach ?>
				</select>
				<label>Class:</label>
				<select name="class_id" required>
					<option value="None">None</option>
					<?php foreach($classes as $class): ?>
						<?php if($class['id'] != -1) { ?>
						<option value="<?= $class['id'] ?>">
							<?= $class['name'] ?>    
						</option>
						<?php } ?>
					<?php endforeach ?>
				</select>
				<label>Price:</label>
				<input type="number" name="vehicle_price" maxlength="12" placeholder="Price" autofocus required>
			
			</div>
			<div class="add__addItem">
				<button class="add-button">Add vehicle</button>
			</div>
		</form>
	</section>

	<!-- <p><a href=".?action=add_vehicle">Click here</a> to add a new vehicle</p> -->

	<!-- Sort by price/year dropdown -->
	<form method="get" action=".">		
		<div class="filter">
		<label for="make">Make:</label>
		<input type="hidden" name="action" value="admin">
		<select id="make" name="make_id">
			<option value="">--Any--</option>
			<?php foreach($makes as $make): ?>
				<!-- if($make) -->
				<option value="<?= $make['id'] ?>"><?= getMakeName($make['id']); ?></option>
			<?php endforeach; ?>
		</select>
		<label for="type">Type:</label>
		<input type="hidden" name="action" value="admin">
		<select id="type" name="type_id">
			<option value="">--Any--</option>
			<?php foreach($types as $type): ?>
				<option value="<?= $type['id'] ?>"><?= getTypeName($type['id']); ?></option>
			<?php endforeach; ?>
		</select>
		<label for="class">Class:</label>
		<input type="hidden" name="action" value="admin">
		<select id="class" name="class_id">
			<option value="">--Any--</option>
			<?php foreach($classes as $class): ?>
				<option value="<?= $class['id'] ?>"><?= getClassName($class['id']); ?></option>
			<?php endforeach; ?>
		</select>
		</div>

		<div class="sort">
			<label for="sort">Sort by:</label>
			<input type="hidden" name="action" value="admin">
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
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_vehicle">
                    <input type="hidden" name="vehicle_id" value="<?= $vehicle['id'] ?>">
                    <button class="delete_assignment_button">Remove</button>
                </form></td>
        	</tr>
        <?php endforeach ?>
	</table>

    <p><a href=".?action=list_makes">View/Edit Vehicle Makes</a></p>
    <p><a href=".?action=list_types">View/Edit Vehicle Types</a></p>
    <p><a href=".?action=list_classes">View/Edit Vehicle Classes</a></p>
    <a href="..">Homepage</a>



<?php include('footer.php') ?>