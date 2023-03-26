<?php include('view/header.php') ?>

<?php if($makes) { ?>
    <section id="list" class="list">
        <header>
            <h2>Make List</h2>
        </header>
        <?php foreach($makes as $make): ?>
            <div class="list_row">
                <div class="list_item">
                    <p><?= $make['name'] ?></p>
                </div>
                <div class="list_removed">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="make_id" value="<?= $make['id'] ?>">
                        <button>Remove</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </section>
    
<?php } else { ?>
    <p>No makes exist yet.</p>
<?php } ?>

<section>
    <h2>Add make</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_make">
        <div class="add__inputs">
            <label>Name:</label>
            <input type="text" name="make_name" maxlength="50" autofocus required>

        </div>
        <div class="add__addItem">
            <button class="add-button">Add make</button>
        </div>
    </form>
</section>
<p><a href=".?action=admin">Back To Admin Page</a></p>

<?php include('view/footer.php') ?>