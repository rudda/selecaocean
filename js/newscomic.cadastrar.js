/**
 * Created by Rudda Beltrao on 02/04/2017.
 */

    $(function () {

        $('#formulario').submit(function (e) {
            var fd = new FormData();
            fd.append('photo',$('#photo')[0].files[0]);
            fd.append('app_name','comicsnews-Web');
            fd.append('app_pass','beltrao123');
            fd.append('titulo',$('#titulo').val());
            fd.append('autor',$('#autor').val());
            fd.append('descricao',CKEDITOR.instances.editor1.getData());
           $.ajax({
               url: 'http://localhost/selecaocean/php/api/v1/news',
               type: 'POST',
               data : fd,
               processData: false,
               contentType: false,
               success: function (data) {
                   alert(data);
               }
           });
            e.preventDefault();
        });
    });