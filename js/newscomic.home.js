/**
 * Created by Rudda Beltrao on 02/04/2017.
 */

$(function(){

    loader();
    
    function loader(){

        $.get('php/api/v1/news',{

            app_name : 'comicsnews-Web',
            app_pass : 'beltrao123',
            id: ''
         }).done(function(response){
            console.log(response);

            var data = JSON.parse(response);
            var row =  $("<div/>")
                .addClass('row')
                .append(addNews(data));

            $('#content-news').html(row);

        });




    }

    function linkTo(){

        alert('oi');
        //window.location.href = "html/visualizar";

    }



    function addNews(data) {
        var str= '';

        for(var i=0; i<data.length; i++){

            var id = data[i].ID;
            var im = '<a href="html/visualizar.html?id='+id+'">';
            var imsrc = data[i].img.replace('http://localhost/selecaocean/','');
                console.log(imsrc);
            str += '<div class="col-xs-12  col-sm-4 col-md-3 col-lg-3">'
            +' <div class="thumbnail" >'
            +im+'<img src="'+imsrc+'" alt="'+data[i].titulo+'"> </a>'
            +'<div class="caption">'
            +'<h3>'+data[i].titulo+'</h3>'
            + data[i].descricao.substring(0, 100)
            + ' </div>'
            +' </div>'
            +'</div>';

            
        }

        return str;

    }

    function ck(r){
        alert(r);
    }


});