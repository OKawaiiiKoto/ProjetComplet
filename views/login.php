    <div class="wrapper">
    <form method="post" action="#">
        <h2>Login</h2>
        <div class="inputbox">
        <input type="text" name="username" id="username" placeholder="Username" maxlength="15" required>
        <i class='bx bx-user'></i>
        </div>
        
        <div class="inputbox">
        <input type="password" name="password" id="password" placeholder="Password" maxlength="25" required>
        <i class='bx bx-lock-alt'></i>
        </div>
        
        <div class="remember">
        <label><input type="checkbox">  Remember me ?</label>
        <a href="#">Mot de passe oublié</a>
        </div>
        
        <input type="submit" value="Envoyer" class="btn">
        
        <div class="register-link"><p>Pas de compte ? <a href="/inscription"> Inscription </a></p>
        </div>   
    </form>