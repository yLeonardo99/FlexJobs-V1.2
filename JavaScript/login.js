
function formatarCPF(campo) {

    // Remover caracteres indesejados ou seja Letras.

    let cpf = campo.value.replace(/\D/g, '');

    // formatação

    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    //  Atualiza o valor do campo
    
    campo.value = cpf;
}