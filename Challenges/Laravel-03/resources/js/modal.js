document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector("#modal");
    const openModalButton = document.querySelector("#open_modal");
    const closeModalButton = document.querySelector("#close_modal");

    if (openModalButton) {
        openModalButton.addEventListener("click", () => {
            modal.classList.remove("hidden");
        });
    }

    if (closeModalButton) {
        closeModalButton.addEventListener("click", () => {
            modal.classList.add("hidden");
        });
    }
});
