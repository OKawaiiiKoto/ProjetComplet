<container>
 <h1>Ajouter des images </h1>
    <div>
    <form action="liste-livres" method="post" enctype="multipart/form-data">
    
    <label for="chapter">Chapitre</label>
        <input type="number" name="chapter" id="chapter" placeholder="Num Chapitre">

    <label for="images">Image</label>
        <input type="file" name="images" id="images" multiple>
        
        <input type="submit" value="Publier">
    </form>
    </div>
</container>
