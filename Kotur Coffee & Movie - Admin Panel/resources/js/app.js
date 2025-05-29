import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

(function () {
    const btn = document.getElementById("generatePassword");
    const pwdField = document.getElementById("password");
    const confirmField = document.getElementById("password_confirmation");

    function randomPassword(length = 12) {
        const chars =
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+[]{}<>?";
        let pass = "";
        for (let i = 0; i < length; i++) {
            pass += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return pass;
    }

    btn.addEventListener("click", () => {
        const pwd = randomPassword();
        pwdField.value = pwd;
        confirmField.value = pwd;
    });
})();

document.addEventListener("DOMContentLoaded", () => {
    // Intercept any form with data-ajax attribute
    document.querySelectorAll("form[data-ajax]").forEach((form) => {
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const url = form.action;
            const method = form.method.toUpperCase();
            const body = new FormData(form);

            try {
                const res = await fetch(url, {
                    method,
                    headers: { Accept: "application/json" },
                    body,
                });

                if (res.status === 422) {
                    const err = await res.json();
                    for (let msgs of Object.values(err.errors)) {
                        msgs.forEach((m) => showToast(m, "error"));
                    }
                } else if (res.ok) {
                    const data = await res.json();
                    showToast(data.message, "success");
                    form.reset();
                } else {
                    showToast("Се појави непозната грешка.", "error");
                }
            } catch (err) {
                showToast("Мрежна грешка, обидете се повторно.", "error");
            }
        });
    });
});

function showToast(message, type = "success") {
    const id = `toast-${Date.now()}`;
    const div = document.createElement("div");
    div.id = id;
    div.textContent = message;
    div.className = [
        "px-4",
        "py-2",
        "rounded",
        "shadow-lg",
        "text-white",
        type === "success" ? "bg-green-500" : "bg-red-500",
    ].join(" ");
    document.getElementById("toast-container").appendChild(div);
    setTimeout(() => {
        document.getElementById("toast-container")?.removeChild(div);
    }, 3000);
}
