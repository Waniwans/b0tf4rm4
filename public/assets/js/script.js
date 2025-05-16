document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("chatModal");
    let openBtn = document.getElementById("openModalBtn");
    let closeBtn = document.getElementById("closeModalBtn");

    openBtn.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
