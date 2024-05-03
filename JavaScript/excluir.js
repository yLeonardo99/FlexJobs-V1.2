// Ao clicar em excluir no formulario


function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, "\\$&");
    let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// Verificar se a mensagem está presente na URL

let mensagem = getParameterByName('mensagem');
if (mensagem) {

    // Exibir a mensagem

    alert(mensagem);
}