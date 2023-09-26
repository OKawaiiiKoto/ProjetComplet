<h1>Modifier Manga</h1>
    <div>
        <?php if (isset($success)) { ?>
            <p class="successText"><?= $success ?></p>
        <?php } ?>
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
    
    <label for="name">Titre</label>
        <input type="text" name="name" id="name" placeholder="One Piece" value="<?= $bookInfos->name ?>"<?= @$_POST['name'] ?>">
        <?php if (isset($formErrors['name'])) { ?>
            <p class="errorText"><?= $formErrors['name'] ?></p>
        <?php } ?>

    <label for="year">Année</label>
        <input type="text" name="year" id="year" placeholder="1998" value="<?= $bookInfos->year ?>">
        <?php if (isset($formErrors['year'])) { ?>
            <p class="errorText"><?= $formErrors['year'] ?></p>
        <?php } ?>
    
    <label for="summary">Sommaire</label>
        <textarea name="summary" id="summary" placeholder="..."><?= @$_POST['summary'] ?><?= $bookInfos->summary ?></textarea>
        <?php if (isset($formErrors['summary'])) { ?>
            <p class="errorText"><?= $formErrors['summary'] ?></p>
        <?php } ?>


        <input type="submit" value="Publier" name="update">

        </form>

        <form action="#" method="post" enctype="multipart/form-data">

        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <?php if (isset($formErrors['image'])) { ?>
            <p class="errorText"><?= $formErrors['image'] ?></p>
        <?php } ?>

        <input type="submit" value="Publier" name="updateImage">

        <img src="../assets/img/<?= $bookInfos->image ?>">

    </form>