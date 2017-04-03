/**
 * Created by Rudda Beltrao on 03/04/2017.
 */

$(function () {
   
    var query = location.search.slice(1);
    var partes = query.split('&');
    var data= {};
    partes.forEach(function (parte) {
        var chaveValor = parte.split('=');
        var chave = chaveValor[0];
        var valor =  chaveValor[1];
        data[chave]= valor;
        
    });
    
    viewComic(data.id);
    
    
    function viewComic(id)
    {

        $.get('http://localhost/selecaocean/php/api/v1/news',{

            app_name : 'comicsnews-Web',
            app_pass : 'beltrao123',
            id: id
        }).done(function (data) {
            console.log(data);
            var comic = JSON.parse(data)[0];
            $('#img').html(
                '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">'+
                '<div class="thumbnail">'+
                '<img class="image-area" src="'+comic['img']+'">'+
                '</div>'+
                '</div>'
            );

            $('#autor-data').html(
              "<b>Autor</b> <i>" +comic['autor'] + "</i> postado em "+comic["data"]

            );
            $('#titulo'). html(
              '<h3> '+comic["titulo"]+'</h3>'

            );
            $('#conteudo').append(comic['descricao']);
           
                     
            
        });
        
        
        
    }
    
});