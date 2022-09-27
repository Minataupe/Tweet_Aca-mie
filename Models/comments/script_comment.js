console.log('je suiis dans script_comments.js');

$(document).ready(() =>
{
    $(".comments_send").on('submit', function(e)
    {
        e.preventDefault();

        let url = 'http://localhost/W-WEB-090-NCE-1-1-academie-thomas.schippers/Models/comments/add_comments.php';
        // let url = '../Models/comments/add_comment.php';
        let data = $(this).serialize();
        console.log(data);
        $.post(url, data, function(reponse)
        {
            $('#content').val(' ');
            $('.comments_status').text("Envoyer"); // test

            $('.comments').prepend(reponse);
        });
        $('.comments_status').text("En cours d'envoi...");
    })
});