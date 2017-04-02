/**
 * Created by Rudda Beltrao on 02/04/2017.
 */

    $(function () {

        $('#formulario').submit(function () {

            

            $.ajax('http://localhost/selecaocean/php/api/v1/news', {
                type: 'POST',
                data: formData

            }).done(function (response) {

                
               

            })
        });

       
        
        
    });
    

