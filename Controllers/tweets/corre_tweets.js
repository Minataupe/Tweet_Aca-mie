console.log('Loadiing core_tweets.js');

$(document).ready(() =>
{
    $("#tkt").on('submit', function(e)
    {
        e.preventDefault();        
        let url = '../tweets/save_tweets.php';
        //let url = 'http://localhost:8000/W-WEB-090-NCE-1-1-academie-thomas.schippers/Controllers/tweets/save_tweets.php';
        var formData = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false, // text - script
            cache: false,
            processData:false,
            success: function (reponse) {
        
            $('.form-loader').hide();
            $('.tweets_status').text("Envoyer"); 
            $('#url,#content').val(''); 

            $('.tweets').prepend(reponse);
            }
        });
        $('.form-loader').show();
        $('.tweets_status').text("En cours d'envoi...");
    })
});
