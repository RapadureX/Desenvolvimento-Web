var idUrl = 1;
var urlGet = "https://tads-kitchen.herokuapp.com/byid/";
var urlPost = "https://tads-kitchen.herokuapp.com/cookers";
var upLista = setInterval(contarInsercoes, 5000);


$("#inserir").on("click", function (event) {
    event.preventDefault();
    var form = document.querySelector("form");
    var cooker = obterCooker(form);
    inserirNaLista(cooker);
});

$("#atualizar").on("click", function (event) {
   event.preventDefault();
   updateLista();
   $("#cont")[0].textContent = 0;
});

function contarInsercoes() {
    $.get(urlGet+idUrl,
        function (data) {
            var cont = data.length;
            $("#cont")[0].textContent = cont;
        }
    );
}

function inserirNaLista(cooker){
    $.post(urlPost, JSON.stringify(cooker));
}

function updateLista() {
    $.get(urlGet+idUrl,
        function (data) {
            encherLista(data);
            console.log(idUrl);
            idUrl += data.length;
        }
    );
}

function obterCooker(form){
    cooker = {
        "name": form.nomeCooker.value
    };

    return cooker;
}

function criarLi(data) {
    var li = document.createElement(li);
    li.classList.add("list-group-item");
    li.textContent = "ID: "+data.id+" | Name: "+data.name;
    $("ul").prepend(li);
}

function encherLista(data) {
    data.forEach(function(dados){
       criarLi(dados);
    });
}
