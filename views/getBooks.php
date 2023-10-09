<div id="detail-container">
        <div class="image-container">
            <img src="../assets/img/<?= $bookInfos->image ?>" alt="<?= $bookInfos->name ?>">
        </div>
        <div class="info-container">
            <h3><?= $bookInfos->name ?></h3>
            <p>Année de publication : <?= $bookInfos->year ?></p>
            <p><?= $bookInfos->summary ?></p>
        </div>
    </div>