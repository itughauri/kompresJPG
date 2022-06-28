var mail_script = $("script[src*=shareOnMail]");
var my_var_mail = mail_script.attr('data-my_var_mail');
$('#sharetomail').submit(function (event) {
    event.preventDefault();
    if ($(this)[0].checkValidity() === false) {
        event.stopPropagation();
    }else{
        var formData = new FormData(this);
        var btn =$('#sharelink');
        $.ajax(
            {
                url: my_var_mail,
                method: "POST",
                data: formData,
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(btn).attr('disabled', true);
                    $('#loading').show();
                },
                success:function(data){
                    $('#loading').hide();
                    $(btn).attr('disabled', false);
                    if(data.status == 'success')
                    {
                        // alert('Download link has been Sent Successfully!');
                        $('#mail-alert').show();
                        location.reload();
                    }
                },
                error:function () {
                    $(btn).attr('disabled', false);
                }
            }
        );

    }});

    $("#share").on('hide.bs.modal', function (e) {
        $(this).find('input[name="email"]').val('');
    })