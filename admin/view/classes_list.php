<?php include('view/header.php') ?>

<?php if($classes) { ?>
    <section id="list" class="list">
        <header>
            <h2>Class List</h2>
        </header>
        <?php foreach($classes as $class): ?>
            <div class="list_row">
                <div class="list_item">
                    <p><?= $class['name'] ?></p>
                </div>
                <div class="list_removed">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="class_id" value="<?= $class['id'] ?>">
                        <button>Remove</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </section>
    
<?php } else { ?>
    <p>No classes exist yet.</p>
<?php } ?>

<section>
    <h2>Add class</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_class">
        <div class="add__inputs">
            <label>Name:</label>
            <input type="text" name="class_name" maxlength="50" autofocus required>

        </div>
        <div class="add__addItem">
            <button class="add-button">Add class</button>
        </div>
    </form>
</section>
<p><a href=".?action=admin">Back To Admin Page</a></p>

<?php include('view/footer.php') ?>
