<main>
    <h1>Mettre à jour le profil</h1>
    <h2>Mes infos</h2>
    <?php if (isset($success['infos'])) { ?>
        <p class="successText"><?= $success['infos'] ?></p>
    <?php } ?>

    <form action="" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username">
        <?php if (isset($formErrors['username'])) { ?>
            <p><?= $formErrors['username'] ?></p>
        <?php } ?>

        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" >
        <?php if (isset($formErrors['email'])) { ?>
            <p><?= $formErrors['email'] ?></p>
        <?php } ?>

        <input type="submit" value="Modifier" name="updateInfos">
    </form>

    <h2>Mon mot de passe</h2>
    <?php if (isset($success['password'])) { ?>
        <p class="successText"><?= $success['password'] ?></p>
    <?php } ?>
    <form action="" method="post">
        <label for="currentPassword">Mot de passe actuel</label>
        <input type="password" name="currentPassword" id="currentPassword">
        <?php if (isset($formErrors['currentPassword'])) { ?>
            <p><?= $formErrors['currentPassword'] ?></p>
        <?php } ?>

        <label for="password">Nouveau mot de passe</label>
        <input type="password" name="password" id="password">
        <?php if (isset($formErrors['password'])) { ?>
            <p><?= $formErrors['password'] ?></p>
        <?php } ?>

        <label for="passwordConfirm">Confirmez le nouveau mot de passe</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm">
        <?php if (isset($formErrors['passwordConfirm'])) { ?>
            <p><?= $formErrors['passwordConfirm'] ?></p>
        <?php } ?>

        <input type="submit" value="Modifier" name="updatePassword">
    </form>

</main>