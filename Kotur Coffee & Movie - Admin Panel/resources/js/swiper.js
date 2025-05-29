document.addEventListener("DOMContentLoaded", function () {
    const thumbnails = document.querySelectorAll('.image-thumbnail');
    const mainImage = document.getElementById('main-image');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function () {
            mainImage.src = this.dataset.image;
        });
    });

    const deleteButtons = document.querySelectorAll('form button[name="delbtn"]');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            const confirmed = confirm('Дали сте сигурни дека сакате да ја избришете сликата?');

            if (confirmed) {
                const form = button.closest('form');
                form.submit();
            }
        });
    });
});
