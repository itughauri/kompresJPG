$(document).ready(function(){
    $('#copyLink').click(function(){
        $('input[name="copyText"]').select();
        document.execCommand("copy");

            $('#copy-alert').show();
setTimeout(function () {
    $('#copy-alert').hide();
    $('#copyLink1').modal('toggle')
},2000)


        // alert('URL copied Successfully!');
    });
});
