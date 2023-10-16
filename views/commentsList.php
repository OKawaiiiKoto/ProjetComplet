<container>
    <h2>Commentaires</h2>
    <?php foreach($commentsList as $c) { ?>
        <div class="comment">
            <p><?= $c->username ?> le <?= $c->date ?></p>
            <p><?= $c->content ?></p>
        </div>
        <?php } ?>
</container>