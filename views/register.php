<?php if (isset($formErrors['general'])) { ?>
    <p class="errors"><?= $formErrors['general'] ?></p>
<?php } ?>

<?php if (isset($success)) { ?>
    <p class="success">Votre inscription a bien été prise en compte.</p>
    <p>Vous pouvez <a href="">vous connecter</a> dès maintenant.</p>
<?php } else { ?>

    <div class="wrapper">
    <form method="post" action="../controllers/registerController.php">
        <h2>Inscription</h2>
        
        <div class="inputbox">
        
        <input type="email" name="email" id="email" placeholder="Adresse mail" value="<?= @$_POST['email'] ?>">
        <?php if (isset($formErrors['email'])) { ?>
            <p class="errors"><?= $formErrors['email'] ?></p>
        <?php } ?>
        </div>
        
        <div class="inputbox">
        
        <input type="text" name="username" id="username" placeholder="Username" value="<?= @$_POST['username'] ?>">
        <?php if (isset($formErrors['username'])) { ?>
            <p class="errors"><?= $formErrors['username'] ?></p>
        <?php } ?>
        </div>
        
        <div class="inputbox">
        
        <input type="password" name="password" id="password" placeholder="Mot de passe">
        <?php if (isset($formErrors['password'])) { ?>
            <p class="errors"><?= $formErrors['password'] ?></p>
        <?php } ?>
        </div>
        
        <div class="inputbox">
        
        <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Vérif mot de passe">
        <?php if (isset($formErrors['passwordConfirm'])) { ?>
            <p class="errors"><?= $formErrors['passwordConfirm'] ?></p>
        <?php } ?>
        </div>
        
        <div class="inputbox">
        
        <input type="date" name="birthdate" id="birthdate" value="<?= @$_POST['birthdate'] ?>">
        <?php if (isset($formErrors['birthdate'])) { ?>
            <p class="errors"><?= $formErrors['birthdate'] ?></p>
        <?php } ?>
        </div>
        
        <input type="submit" value="Envoyer" class="btn">   
    </form>
    <?php }?>