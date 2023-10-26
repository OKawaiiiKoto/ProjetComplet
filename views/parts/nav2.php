<nav class="navbar">
    <a href="/connect" class="logo">ReadScan</a>
    <div class="links">
           <ul>
            <?php if (isset($_SESSION['user']['id_usersroles']) && $_SESSION['user']['id_usersroles'] == 2) { ?> 
             <li id="ll"><a href="/liste-livres" class="active">Liste</a></li>
             <li id="ll"><a href="/ajouter-livre" >Ajout Livres</a></li> 
             <?php } ?>
                <li><a href="/accueil">Accueil</a></li>
            </ul>
        </div>
        <?php if (isset($_SESSION['user']['id'])) { ?>
    <div class="register">
        <p class="username"><?= $_SESSION['user']['username'] ?></p>
        <a href="deconnexion">déconnexion</a>
        <a href="changements">Modification infos</a>
    </div>
<?php } else { ?>
    <div class="register">
        <a href="inscription" class="navbutton">S'inscrire</a>
        <a href="connexion" class="navbutton">Connexion</a>
    </div>
<?php } ?>
        <img src="assets/img/burger.png" alt="Menu" class="burger">
    </nav>