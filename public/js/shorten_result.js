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

$('#download-qr-code').click(function () {
    var debug = document.getElementsByTagName('img')[0].src;
    var debug2 = document.getElementsByTagName('img')[0].alt;
    var debug3 = debug2.replace("http://", "");
    console.log(debug3);
    var debug4 = debug3.replace("/", "-");
    console.log(debug4);
    // alert(debug2);
    // alert(debug);
    // console.log(debug);
    download(debug, debug4+".png");
}
)

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
});

function download(dataurl, filename) {
    var a = document.createElement("a");
    a.href = dataurl;
    a.setAttribute("download", filename);
    a.click();
 }

window.onbeforeunload = function(){
  return 'Are you sure you want to leave?';
};
