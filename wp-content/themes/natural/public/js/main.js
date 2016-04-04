/**
 * Created by serg on 04.04.16.
 */

$(document).ready(function(){
    $('.open-modal').click(function(e){
        e.preventDefault();
        var id;
        id=$(this).data('id');
        $.ajax({
            url: "/getproducts/"+id,
            method:"GET"
        }).done(function(data) {
            $('.modal-title').html(data.post_title);
            $('.img-rounded.modal-image').attr('src',data.img);
            $('.modal-content-text').html(data.post_content);
            //$( this ).addClass( "done" );
            $('#myModal').modal();
        });

    });

    $('#submit').click(function(){
        var f=$('#mail');
        var input=f.find('input');
        var select=f.find('select');
        var data={};
        $.each(input,function(key,val){
            data[$(val).attr('id')]=$(val).val();
        });
        $.each(select,function(key,val){
            data[$(val).attr('id')]=$(val).val();
        });

        $.ajax({
            url: "http://callback.blink.kz/client/Callback/SendForm",
            data:data,
            method:"POST"
        }).done(function(data) {
            if(data[0].code) {
                $('#mail').html('<h3 class="orange-text">Анкета успешно отправлена</h3><div class="form-group"><p>' + data[0].text + '</p></div>');
            }else
            {
                $('#mail').html('<h3 class="orange-text">Ошибка отправки анкеты</h3><div class="form-group"><p>' + data[0].text + '</p></div>');
            }
        });

    });
});

