/**
 * Created by Rudda Beltrao on 02/04/2017.
 */

$(function(){

    loader();
    
    function loader(){

        $.get('http://localhost/selecaocean/php/api/v1/news',{

            app_name : 'comicsnews-Web',
            app_pass : 'beltrao123'

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
                var divid = 'n'+i;
            str += '<div class="col-xs-12  col-sm-4 col-md-3 col-lg-3">'
            +' <div class="thumbnail" id="'+divid+'" onclick=" ck(1)">'
            +'<img src="'+data[i].img+'" alt="'+data[i].titulo+'">'
            +'<div class="caption">'
            +'<h3>'+data[i].titulo+'</h3>'
            +' '+data[i].descricao.substring(0, 100)
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