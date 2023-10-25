<div id="main-container">
        <div class="centered-content">
            <?php if (isset($success)) { ?>
                <p class="success"><?= $success ?></p>
            <?php } ?>
        </div>
        <form id="comment-form" action="#" method="post">
            <label for="comment-textarea" class="form-label">Commentaire</label>
            <textarea name="content" id="comment-textarea" placeholder="Super" rows="10"></textarea>
            <?php if (isset($formErrors['content'])) { ?>
                <p class="error"><?= $formErrors['content'] ?></p>
            <?php } ?>
            <input type="submit" value="Envoyer" id="submit-button">
        </form>

        <div id="comments-container">
            <h2 class="section-heading">Commentaires</h2>
            <?php foreach ($commentsList as $c) { ?>
                <div class="comment">
                    <div class="comment-header">
                        <span class="comment-username"><?= $c->username ?></span>
                        <span class="comment-date"><?= $c->date ?></span>
                    </div>
                    <div class="comment-content">
                        <p><?= $c->content ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>