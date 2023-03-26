<?php include('view/header.php') ?>

<?php if($types) { ?>
    <section id="list" class="list">
        <header>
            <h2>Type List</h2>
        </header>
        <?php foreach($types as $type): ?>
            <div class="list_row">
                <div class="list_item">
                    <p><?= $type['name'] ?></p>
                </div>
                <div class="list_removed">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="type_id" value="<?= $type['id'] ?>">
                        <button>Remove</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </section>
    
<?php } else { ?>
    <p>No types exist yet.</p>
<?php } ?>

<section>
    <h2>Add type</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_type">
        <div class="add__inputs">
            <label>Name:</label>
            <input type="text" name="type_name" maxlength="50" autofocus required>

        </div>
        <div class="add__addItem">
            <button class="add-button">Add type</button>
        </div>
    </form>
</section>
<p><a href=".?action=admin">Back To Admin Page</a></p>

<?php include('view/footer.php') ?>
