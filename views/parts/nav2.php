<nav class="navbar">
    <a href="/connect" class="logo">Scan</a>
    <div class="links">
           <ul>
                <li id="acc"><a href="/connect" class="active">Accueil</a></li>
                <li><a href="Romance.php" >Shojo</a></li>
                <li><a href="Romance.php" >Shojo</a></li>
                <li><a href="Fantasy.php">Fantasy</a></li>
                <li><a href=".php"> Shonen</a></li>
                <li><a href="mha.php"> & </a></li>
                <li><a href=".php">Slice of life</a></li>
            </ul>
        </div>
        <div class="register">
        <?php 
        echo $_SESSION['user']['username']; 
        ?>
        <a href="deconnexion">déconnexion</a>
        <a href="changements">Modification infos</a>
        </div>
        <img src="assets/img/burger.png" alt="Menu" class="burger">
    </nav>