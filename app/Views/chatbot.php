<?= $this->extend('layouts/landing/main') ?>

<?= $this->section('content') ?>
<h3 class="mb-4">Chatbot Kesehatan</h3>
<div id="chat-box" style="height: 400px; overflow-y: scroll; border: 1px solid #ccc; padding: 15px; background: #f9f9f9;"></div>

<div class="input-group mt-3">
    <input type="text" id="user-input" class="form-control" placeholder="Tanyakan sesuatu tentang kesehatan..." autocomplete="off" />
    <button id="send-btn" class="btn btn-primary">Kirim</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#send-btn').on('click', function () {
    let userInput = $('#user-input').val();
    if (userInput.trim() === '') return;

    $('#chat-box').append('<div class="user-msg mb-2" style="text-align:right;font-weight:bold;">Anda: ' + $('<div>').text(userInput).html() + '</div>');

    $.ajax({
        url: "<?= base_url('chatbot/ask') ?>",
        method: "POST",
        data: { question: userInput },
        dataType: "json",
        success: function (response) {
            let answer = response.reply || 'Bot tidak memberikan jawaban.';
            $('#chat-box').append('<div class="bot-msg mb-2" style="text-align:left;color:#00695c;">Bot: ' + $('<div>').text(answer).html() + '</div>');
            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
            $('#user-input').val('').focus();
        },
        error: function () {
            $('#chat-box').append('<div class="bot-msg mb-2" style="text-align:left;color:#00695c;">Terjadi kesalahan. Coba lagi.</div>');
        }
    });
});

$('#user-input').on('keypress', function (e) {
    if (e.which === 13) {
        $('#send-btn').click();
    }
});
</script>
<?= $this->endSection() ?>
