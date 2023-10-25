<container class="wrapper">
    <h1>Ajouter un manga</h1>
    <div>
        <?php if (isset($success)) { ?>
            <p class="success"><?= $success ?></p>
        <?php } ?>
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
    
    <label for="name">Titre</label>
    <div class="inputbox">
        <input type="text" name="name" id="name" placeholder="One Piece" value="<?= @$_POST['name'] ?>">
        <?php if (isset($formErrors['name'])) { ?>
            <p class="error"><?= $formErrors['name'] ?></p>
        <?php } ?>
    </div>
    <label for="year">Année</label>
    <div class="inputbox">
        <input type="text" name="year" id="year" placeholder="1998">
        <?php if (isset($formErrors['year'])) { ?>
            <p class="error"><?= $formErrors['year'] ?></p>
        <?php } ?>
    </div>
    <label for="summary">Sommaire</label>
        <textarea name="summary" id="summary" placeholder="..."><?= @$_POST['summary'] ?></textarea>
        <?php if (isset($formErrors['summary'])) { ?>
            <p class="error"><?= $formErrors['summary'] ?></p>
        <?php } ?>

    <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <?php if (isset($formErrors['image'])) { ?>
            <p class="error"><?= $formErrors['image'] ?></p>
        <?php } ?>


        <input type="submit" value="Publier" class="btn">


    </form>
</container>