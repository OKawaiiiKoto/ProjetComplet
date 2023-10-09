const openModalBtn = document.getElementById("open-modal-btn");
const closeBtn = document.getElementsByClassName("close-btn");

const modalContainer = document.getElementById("modal-container");

openModalBtn.addEventListener("click", function () {
    modalContainer.style.display = "block";
});

for (let btn of closeBtn) {
    btn.addEventListener("click", function () {
        modalContainer.style.display = "none";
    });
}

window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modalContainer.style.display = "none";
    }
}); 