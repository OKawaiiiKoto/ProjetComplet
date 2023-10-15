<container>
    <div class="book-container">
        <?php $count = 0; ?>
        <?php foreach($booksList AS $bl) { ?>
            <div class="book">
                <a href="page-livre-<?= $bl->id ?>">
                    <img src="../assets/img/<?= $bl->image ?>" alt="<?= $bl->name ?>">
                    <div class="book-title"><?= $bl->name ?></div>
                </a>
                <div class="book-actions">
                    <a href="ajout-scans-<?= $bl->id ?>">Ajouter un scan</a>
                    <a href="modifier-livre-<?= $bl->id ?>">Modifier</a>
                </div>
            </div>
        <?php } ?>
    </div>
</container>
