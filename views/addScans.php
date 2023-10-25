<container class="wrapper">
    <h1>Ajouter des Chapitres </h1>
    <div>
        <?php if (isset($success)) { ?>
            <p class="success"><?= $success ?></p>
        <?php } ?>
    </div>
    <div>
        <form action="#" method="post" enctype="multipart/form-data">

            <label for="chapter">Chapitre</label>
            <input type="number" name="chapter" id="chapter" placeholder="Num Chapitre" class="inputbox">
            
            <label for="images">Images</label>
            <input type="file" name="images[]" id="images" class="inputbox" multiple>
            
            <input type="submit" value="Publier" class="btn">
        </form>
    </div>
</container>