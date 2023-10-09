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
                    <a href="modifier-livre-<?= $bl->id ?>">Modifier</a>
                </div>
            </div>
            <?php if (++$count % 6 == 0) { ?> <!-- Ajoute un saut de ligne après chaque 6ème livre -->
                <div style="width: 100%; clear: both;"></div>
            <?php } ?>
        <?php } ?>
    </div>
</container>
