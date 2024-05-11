// Login.html visualizar a senha ao ser digitada;


// Olho do Login

function toggleSenha() {
    const senhaInput = document.getElementById("senhaInput");
    const olho = document.getElementById("olho");

    // Verificação se o tipo de input é password.

    if (senhaInput.type === "password") {
        senhaInput.type = "text"; // Muda para texto visível
        olho.textContent = "👁️"; // Muda o ícone do olho
    } else {
        senhaInput.type = "password"; // Muda de volta para password
        olho.textContent = "👁️"; // Muda o ícone do olho
    }
}

// Olho do Cadastro

document.addEventListener("DOMContentLoaded", function() {
    const olho2 = document.getElementById("olho2");
    const senhaInput = document.querySelector(olho2.getAttribute("toggle"));

    olho2.addEventListener("click", function() {
        const tipo = senhaInput.getAttribute("type") === "password" ? "text" : "password";
        senhaInput.setAttribute("type", tipo);
        
        // Adicionando classe para estilo do ícone quando a senha está visível
        if (tipo === "text") {
            olho2.classList.add("active");
        } else {
            olho2.classList.remove("active");
        }
    });
});



