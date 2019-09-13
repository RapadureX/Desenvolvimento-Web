var urlGet = "https://tads-kitchen.herokuapp.com/posts";

$("button").on("click", function(event){
    event.preventDefault();
    atualizarLista();
});

function atualizarLista() {
    $.get(urlGet,
        function (data) {
        encherLista(data);
        console.log(data);
    });
}

/*function criarLink(conteudo) {
    moment.locale("pt-br");
    var link = "<a href=\"#\" class=\"list-group-item list-group-item-action\">" +
      "<div class=\"d-flex w-100 justify-content-between\">\n" +
      "<h5 class=\"mb-1\">"+conteudo.title+"</h5>\n" +
      "<small>"+moment(conteudo.time, "DDMMYYYY").fromNow()+"</small>\n" +
      "</div>\n" +
      "<p class=\"mb-1\">"+conteudo.text+"</p>\n" +
      "<small>"+conteudo.author+"</small>";

    return link;
}*/

/*function template(conteudo) {

    return
    `
        <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">${conteudo.title}</h5>
        <small>${moment(conteudo.time, "DDMMYYYY").fromNow()}</small>
        </div>
        <p class="mb-1">${conteudo.text}</p>
        <small>${conteudo.author}</small>
    `;
}*/

function encherLista(data) {
    $(".list-group").html("");
   data.map(function (dados) {
       var conteudo = criarLista(dados);
       $(".list-group").html(conteudo + $(".list-group").html());
   });
}

function criarLista(data) {
    moment.locale("pt-br");
    var conteudo = "";
    var tempo = moment(data.time,"DDMMYYYY").fromNow();
    conteudo = template(data.title, tempo, data.text, data.author);

    return conteudo;
}

function template(title, time, text, author) {
     var anchor =
         `
             <a href="#" class="list-group-item list-group-item-action">
                 <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1">${title}</h5>
                     <small>${time}</small>
                 </div>
                 <p class="mb-1">${text}</p>
                 <small>${author}</small>
             </a>   
         `

     return anchor;
}

/*function encherLista(data) {
    $(".list-group")[0].innerHTML = "";
   data.forEach(function(conteudo){
       $(".list-group")[0].innerHTML = template(conteudo) + $(".list-group")[0].innerHTML;
   });
}*/