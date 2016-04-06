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

            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                var ifreams = document.getElementsByTagName('iframe');
                for(var i=0; i<ifreams.length; i++) {
                    ifreams[i].style.display = 'none';
                }
            }


        });

    });




    $('.scroll-to').click(function() {
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);

        return false;
    });

    $('#mail').submit(function(e){
        e.preventDefault();

        var fields = e.target;
        var data = {};
        for(var i=0; i<fields.length - 1; i++) {
            data[fields[i].id] = fields[i].value;
        }
        $.ajax({
            url: "https://callback.blink.kz/client/Callback/SendForm",
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


        $(document).scroll(function(){
            console.log();
            if ($(document).scrollTop()>=$('.hr')[0].offsetTop)
            {
               $('.top-btn').show();
            }
            else {
                $('.top-btn').hide();
            }
        });


});

