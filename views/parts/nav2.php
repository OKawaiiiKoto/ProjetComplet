<nav class="navbar">
    <a href="/accueil" class="logo">Scan</a>
    <div class="links">
           <ul>
                <li><a href="Romance.php" class="active">Shojo</a></li>
                <li><a href="Fantasy.php">Fantasy</a></li>
                <li><a href=".php"> Shonen</a></li>
                <li><a href="mha.php"> & </a></li>
                <li><a href=".php">Slice of life</a></li>
            </ul>
        </div>
        <div class="register">
        <?php 
        session_start();
        echo $_SESSION['user']['username']; 
        ?>
        <a href="deconnexion">déconnexion</a>
        </div>
        <img src="assets/img/burger.png" alt="Menu" class="burger">
    </nav>