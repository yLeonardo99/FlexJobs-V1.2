// Script do confirmar senha

function verificarSenhas() {
    let senha = document.getElementById("senha").value;
    let confirmarSenha = document.getElementById("confirmarSenha").value;
    let senhaErro = document.getElementById("senhaErro");

    if (senha !== confirmarSenha) {
        senhaErro.textContent = "As senhas não estão iguais.";
        return false; // Impede o envio do formulário
    } else {
        senhaErro.textContent = ""; // Limpa a mensagem de erro
        return true; // Permite o envio do formulário
    }
}

// Olho Cadastro

function togglePassword(fieldId, eyeIcon) {
    let field = document.getElementById(fieldId);

    if (field.type === "password") {
        field.type = "text";
        eyeIcon.textContent = "🙈"; // Ícone para senha visível
    } else {
        field.type = "password";
        eyeIcon.textContent = "👁️"; // Ícone para senha oculta
    }
}
