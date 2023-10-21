    <div class="wrapper">
    <form method="post" action="#">
        <h2>Login</h2>
        <div class="inputbox">
        <input type="text" name="username" id="username2" placeholder="Username" maxlength="15" required>
        <i class='bx bx-user'></i>
        <?php if (isset($formErrors['username'])) { ?>
            <p class="errors"><?= $formErrors['username'] ?></p>
        <?php } ?>
        </div>
        
        <div class="inputbox">
        <input type="password" name="password" id="password2" placeholder="Password" maxlength="25" required>
        <i class='bx bx-lock-alt'></i>
        <?php if (isset($formErrors['password'])) { ?>
            <p class="errors"><?= $formErrors['password'] ?></p>
        <?php } ?>
        </div>
        
        <div class="remember">
        <label><input type="checkbox">  Remember me ?</label>
        <a href="#">Mot de passe oublié</a>
        </div>
        
        <input type="submit" value="Envoyer" class="btn">
        
        <div class="register-link"><p>Pas de compte ? <a href="/inscription"> Inscription </a></p>
        </div>   
    </form>