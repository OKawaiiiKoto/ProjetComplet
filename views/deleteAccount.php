<button id="open-modal-btn">Supprimer mon compte</button>

<div id="modal-container" class="modal-container">
    <div class="modal">
        <div class="modal-header">
            <span class="close-btn">&times;</span>
        </div>
        <div class="modal-content">
            <p>Êtes-vous sûr ?</p>
        </div>
        <div class="modal-footer">
            <form action="/users" method="POST">
                <input type="submit" value="Valider la suppression de mon compte" name="delete">
            </form>
            <span class="close-btn">Annuler</span>
        </div>
    </div>
</div>