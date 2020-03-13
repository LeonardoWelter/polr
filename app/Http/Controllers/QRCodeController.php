<?php

namespace App\Http\Controllers;

define('UPLOAD_DIR', '/var/www/polr/public/images/');


class QRCodeController extends Controller {

    function uploadQRCode() {
        $img = $_POST['imgSrc'];
        $imgNome = $_POST['imgAlt'];
        $url = $_POST['url'];

        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);

        $data = base64_decode($img);

        $imgNome = str_replace("http://", "", $imgNome);
        $imgNome = str_replace(".", "_", $imgNome);
        $imgNome = str_replace("/", "-", $imgNome);

        $file = UPLOAD_DIR . $imgNome . '.png';
        $success = file_put_contents($file, $data);

        if ($success) {
            QRCodeMailer($url, $file);
        } else {
            echo 'Erro';
        }
    }
}

    function QRCodeMailer($url, $qrcode) {


        $transport = (new \Swift_SmtpTransport(env('MAIL_HOST'), env('MAIL_PORT'), 'tls'))
            ->setUsername(env('MAIL_USERNAME'))
            ->setPassword(env('MAIL_PASSWORD'));

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('QRCode URL: '. $url))
            ->setFrom([env('MAIL_FROM_ADDRESS') => env('MAIL_FROM_NAME')])
            ->setTo(['ALVO'])
            ->setBody('Esse QRCode foi gerado atráves do Encurtador de URLs')
            ->attach(\Swift_Attachment::fromPath($qrcode));

        $result = $mailer->send($message);


    }

