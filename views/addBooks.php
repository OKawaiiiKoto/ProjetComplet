<container>
    <h1>Ajouter un manga</h1>
    <div>
        <?php if (isset($success)) { ?>
            <p class="successText"><?= $success ?></p>
        <?php } ?>
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
    
    <label for="name">Titre</label>
        <input type="text" name="name" id="name" placeholder="One Piece" value="<?= @$_POST['name'] ?>">
        <?php if (isset($formErrors['name'])) { ?>
            <p class="errorText"><?= $formErrors['name'] ?></p>
        <?php } ?>

    <label for="year">Année</label>
        <input type="text" name="year" id="year" placeholder="1998">
        <?php if (isset($formErrors['year'])) { ?>
            <p class="errorText"><?= $formErrors['year'] ?></p>
        <?php } ?>
    
    <label for="summary">Sommaire</label>
        <textarea name="summary" id="summary" placeholder="..."><?= @$_POST['summary'] ?></textarea>
        <?php if (isset($formErrors['summary'])) { ?>
            <p class="errorText"><?= $formErrors['summary'] ?></p>
        <?php } ?>

    <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <?php if (isset($formErrors['image'])) { ?>
            <p class="errorText"><?= $formErrors['image'] ?></p>
        <?php } ?>


        <input type="submit" value="Publier">


    </form>
</container>