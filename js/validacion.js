document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll("form");
    forms.forEach((form) => {
        const feedback = form.querySelector("#form-feedback");

        form.addEventListener("submit", (e) => {
            e.preventDefault();

            // Validar todos los campos requeridos
            const requiredFields = form.querySelectorAll("[required]");
            let valid = true;
            requiredFields.forEach((field) => {
                if (!field.value.trim()) {
                    valid = false;
                    field.style.border = "1px solid red";
                } else {
                    field.style.border = "";
                }
            });

            if (!valid) {
                feedback.textContent = "Please fill in all required fields.";
                feedback.style.color = "red";
                return;
            }

            // Validar formato del correo si existe
            const emailField = form.querySelector('input[type="email"]');
            if (emailField) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailField.value)) {
                    feedback.textContent = "Please enter a valid email.";
                    feedback.style.color = "red";
                    return;
                }
            }

            // Si todo es válido, enviar formulario
            feedback.textContent = "Sending...";
            feedback.style.color = "blue";
            form.submit();
        });
    });
});
