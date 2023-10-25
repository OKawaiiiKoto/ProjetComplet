<container>
    <div class="scans">
        <?php foreach ($imagesList as $il) { ?>
            <img src="assets/img/scans/<?= $il->images ?>">
        <?php } ?>
        <button id="scrollToTopButton">&#9650;</button>
    </div>
</container>