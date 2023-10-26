<footer>
        <div class="left">
        <?php if (isset($_SESSION['user']['id'])) { ?>
            <a href="/connect">
            <?php } else { ?>
                <a href="/accueil">
                <?php } ?>
                <img src="../../assets/img/jjk 1.jpg" alt="Logo">
                ReadScan
            </a>
        </div>
        <div class="center"></div>
        <div class="right">
            <a href="#">Aide</a>
        </div>
    </footer>
<script src="assets/js/script.js"></script>
<script src="/assets/js/modal.js"></script>
</body>
</html>