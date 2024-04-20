
function formatarCPF(campo) {

    // Remover caracteres indesejados ou seja Letras

    let cpf = campo.value.replace(/\D/g, '');

    // Adicionando  a formatação

    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    //  Atualiza o valor do campo
    campo.value = cpf;
}

// Requisição da Senha

document.addEventListener('DOMContentLoaded', function () {
    let senhaInput = document.getElementById('senha');
    let erroSenha = document.getElementById('erro-senha');

    senhaInput.addEventListener('input', function () {
        let senha = this.value;

        if (senha.length === 0) {
            erroSenha.style.display = 'none';
        } else if (senha.length === 16) {
            erroSenha.style.display = 'none';
        } else {
            erroSenha.style.display = 'block';
        }
    });
});