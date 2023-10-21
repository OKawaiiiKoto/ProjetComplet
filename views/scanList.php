<container>
    <h2>Chapitres</h2>
    <?php foreach($scanList as $sl) { ?>
        <div class="comment">
            <a href="/chapitres-"><?= $sl->chapter ?></a> 
        </div>
        <?php } ?>
</container>
 ** A mettre dans getBooks **
       Dans la zone Infos 