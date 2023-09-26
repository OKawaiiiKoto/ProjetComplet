<container>
    <table>
        <tbody>
            <?php foreach($booksList AS $bl) { ?>
<tr>
    <td> <?= $bl->name ?> </td>
    <td> <?= $bl->year ?> </td>
    <td> <?= $bl->summary ?> </td>
    <td> <a href="modifier-livre-<?= $bl->id ?>"> Modifier</a></td>
    <td> <a href="page-livre-<?= $bl->id ?>"> Page</a></td>
</tr>
           <?php } ?>
        </tbody>
    </table>
</container>