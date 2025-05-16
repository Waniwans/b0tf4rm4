$(document).ready(function () {
    $('#send-btn').click(function () {
        const userText = $('#user-input').val();
        if (userText.trim() === '') return;

        $('#chat-box').append('<div class="user-msg">Anda: ' + userText + '</div>');

        $.ajax({
            url: '/chatbot/send',
            method: 'POST',
            data: { question: userText },
            success: function (response) {
                $('#chat-box').append('<div class="bot-msg">Bot: ' + response.answer + '</div>');
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
            },
            error: function () {
                $('#chat-box').append('<div class="bot-msg">Terjadi kesalahan, silakan coba lagi.</div>');
            }
        });

        $('#user-input').val('');
    });

    $('#user-input').keypress(function (e) {
        if (e.which === 13) $('#send-btn').click();
    });
});
