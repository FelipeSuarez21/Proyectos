document.addEventListener("DOMContentLoaded", function () {
    const psicologos = document.querySelectorAll(".psicologo");

    psicologos.forEach((psicologo) => {
        const toggleButton = psicologo.querySelector("a");

        toggleButton.addEventListener("click", (e) => {
            e.preventDefault();
            psicologo.classList.toggle("open");
        });
    });
});
