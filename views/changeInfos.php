<main class="wrapper">
    <h1>Mettre à jour le profil</h1>
    <h2>Mes infos</h2>
    <?php if (isset($success['infos'])) { ?>
        <p class="successText"><?= $success['infos'] ?></p>
    <?php } ?>

    <form action="" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" class="inputbox">
        <?php if (isset($formErrors['username'])) { ?>
            <p class="errorMessage"><?= $formErrors['username'] ?></p>
        <?php } ?>

        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" class="inputbox">
        <?php if (isset($formErrors['email'])) { ?>
            <p class="errorMessage"><?= $formErrors['email'] ?></p>
        <?php } ?>

        <input type="submit" value="Modifier" name="updateInfos" class="btn">
    </form>

    <h2>Mon mot de passe</h2>
    <?php if (isset($success['password'])) { ?>
        <p class="successText"><?= $success['password'] ?></p>
    <?php } ?>
    <form action="" method="post">
        <label for="currentPassword">Mot de passe actuel</label>
        <input type="password" name="currentPassword" id="currentPassword" class="inputbox">
        <?php if (isset($formErrors['currentPassword'])) { ?>
            <p class="errorMessage"><?= $formErrors['currentPassword'] ?></p>
        <?php } ?>

        <label for="password">Nouveau mot de passe</label>
        <input type="password" name="password" id="password" class="inputbox">
        <?php if (isset($formErrors['password'])) { ?>
            <p class="errorMessage"><?= $formErrors['password'] ?></p>
        <?php } ?>

        <label for="passwordConfirm">Confirmez le nouveau mot de passe</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm" class="inputbox">
        <?php if (isset($formErrors['passwordConfirm'])) { ?>
            <p class="errorMessage"><?= $formErrors['passwordConfirm'] ?></p>
        <?php } ?>

        <input type="submit" value="Modifier" name="updatePassword" class="btn">
    </form>
</main>