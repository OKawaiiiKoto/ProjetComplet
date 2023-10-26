<container>
    <div class="book-container">
        <?php $count = 0; ?>
        <?php foreach($booksList AS $bl) { ?>
            <div class="book">
                <a href="page-livre-<?= $bl->id ?>">
                    <img src="../assets/img/<?= $bl->image ?>" alt="<?= $bl->name ?>">
                    <div class="book-title"><?= $bl->name ?></div>
                </a>
            </div>
        <?php } ?>
        <button id="scrollToTopButton">&#9650;</button>
    </div>
</container>