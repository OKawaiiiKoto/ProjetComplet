<div id="detail-container">
    <div class="image-container">
        <img src="../assets/img/<?= $bookInfos->image ?>" alt="<?= $bookInfos->name ?>">
    </div>
    <div class="info-container">
        <h3><?= $bookInfos->name ?></h3>
        <p>Année de publication : <?= $bookInfos->year ?></p>
        <p><?= $bookInfos->summary ?></p>
        <h2 id="chapitres">Chapitres</h2>
        <?php foreach ($scanList as $sl) { ?>
            <a href="/chapitre-<?= $sl->chapter ?>"><?= $sl->chapter ?></a>
        <?php } ?>
    </div>
</div>