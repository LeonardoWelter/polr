var original_link;

function select_text() {
    $('.result-box').focus().select();
}

$('.result-box').click(select_text);
$('.result-box').change(function () {
    $(this).val(original_link);
});

$('#generate-qr-code').click(function () {
    var container = $('.qr-code-container');
    container.empty();
    new QRCode(container.get(0), {
        text: original_link,
        width: 280,
        height: 280
    });
    container.find('img').attr('alt', original_link);
    container.show();
    document.getElementById('download-qr-code').style.display = 'inline';
});

var clipboard = new Clipboard('#clipboard-copy');
clipboard.on('success', function(e) {
    e.clearSelection();
    $('#clipboard-copy').tooltip('show');
});

$('#clipboard-copy').on('blur',function () {
    $(this).tooltip('destroy');
}).on('mouseleave',function () {
    $(this).tooltip('destroy');
});

$(function () {
    original_link = $('.result-box').val();
    select_text();

    var container = $('.qr-code-container');
    container.empty();
    new QRCode(container.get(0), {
        text: original_link,
        width: 280,
        height: 280
    });
    container.find('img').attr('alt', original_link);
});

$('#download-qr-code').click(function () {
    var qrcodeSrc = document.getElementsByTagName('img')[0].src;
    var qrcodeAlt = document.getElementsByTagName('img')[0].alt;
    qrcodeAlt = qrcodeAlt.replace("http://", "");
    qrcodeAlt = qrcodeAlt.replace("/", "-");
    download(qrcodeSrc, qrcodeAlt+".png");
});

function download(dataurl, filename) {
    var a = document.createElement("a");
    a.href = dataurl;
    a.setAttribute("download", filename);
    a.click();
}

setTimeout(function enviarDadosBackEnd() {

    let infoQRCode = {
        'imgSrc' : document.getElementsByTagName('img')[0].src,
        'imgAlt' : document.getElementsByTagName('img')[0].alt,
        'url' : original_link,
    };
    infoQRCode._token = $('[name="_token"]').val();

    $.ajax({
        url: "/QRCodePersist",
        type: "POST",
        data: infoQRCode,
        success: dados => { console.log('Sucesso ' + dados);},
        error: erro => { console.log(erro);}
    });
}, 100);

window.onbeforeunload = function(){
   return 'Essa mensagem é inútil e não faz nada, porém, essa função solicita confirmação antes de sair da página';
};
