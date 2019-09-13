var xhr = new XMLHttpRequest();
var bt = document.querySelector("button");

xhr.addEventListener("load", function () {
    var tbody = document.querySelector("tbody");
    var clientes = JSON.parse(xhr.responseText);
    for (i = 0; i < clientes.length; i++) {
        console.log(clientes[i]);
        var tr = criarTr(clientes[i]);
        tbody.appendChild(tr);
    }
    $("tr").click(function(){
        $(this).hide();
    });
});

bt.addEventListener("click", function (event) {
    event.preventDefault();
    var tbd = document.querySelector("tbody");
    limparTable(tbd);
    xhr.open("GET", "var/cliente.json");
    xhr.send();
});

function criarTr(cliente){
    var tr = document.createElement("tr");
    tr.appendChild(criarTd(cliente.cpf,"cpf"));
    tr.appendChild(criarTd(cliente.nome,"nome"));
    tr.appendChild(criarTd(cliente.endereco,"endereco"));
    tr.appendChild(criarTd(cliente.item,"item"));

    return tr;
}

function criarTd(conteudo, classe){
    var td = document.createElement("td");
    td.textContent = conteudo;
    td.classList.add(classe);

    return td;
}

function limparTable(old_tbd) {
    var table = document.querySelector("table");
    var n_tbd = document.createElement("tbody");
    table.removeChild(old_tbd);
    table.appendChild(n_tbd);
}
