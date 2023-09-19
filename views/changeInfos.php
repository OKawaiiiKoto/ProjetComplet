<main>
<form action="changement" method="post">

<label for="username">Nouveau nom d'utilisateur:</label>

<input type="text" name="username" id="username" placeholder="Globox" value="<?= @$_POST['username'] ?>">

<label for="password">Nouveau Mot de passe</label>
<input type="password" name="password" id="password" placeholder="********">


<label for="passwordConfirm">Confirmation du mot de passe</label>
<input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="********">


<input type="submit" value="Valider">

</form>
</main>