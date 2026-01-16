<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini alıyoruz
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $isin_cinsi = $_POST['isin_cinsi'];
    $yuk_cinsi = $_POST['yuk_cinsi'];
    $agirlik = $_POST['agirlik'];
    $alinacak_yer = $_POST['alinacak_yer'];
    $teslimat_yer = $_POST['teslimat_yer'];
    $whatsapp = $_POST['whatsapp'];
    $adres = $_POST['adres'];

    // E-posta başlıkları
    $to = "nakliyeteklif@gmowin.com"; // Alıcı e-posta adresi
    $subject = "Yeni Teklif Talebi"; // E-posta başlığı

    // E-posta içeriği
    $message = "
    <html>
    <head>
        <title>Yeni Teklif Talebi</title>
    </head>
    <body>
        <p><strong>Ad:</strong> $ad</p>
        <p><strong>Soyad:</strong> $soyad</p>
        <p><strong>İşin Cinsi:</strong> $isin_cinsi</p>
        <p><strong>Yükün Cinsi:</strong> $yuk_cinsi</p>
        <p><strong>Ağırlık:</strong> $agirlik kg</p>
        <p><strong>Alınacak Yük Lokasyonu:</strong> $alinacak_yer</p>
        <p><strong>Teslimat Yapılacak Yer Lokasyonu:</strong> $teslimat_yer</p>
        <p><strong>Whatsapp İletişim:</strong> $whatsapp</p>
        <p><strong>Adres:</strong> $adres</p>
    </body>
    </html>
    ";

    // E-posta başlıkları
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@gmowin.com" . "\r\n";  // Gönderen e-posta adresi

    // Mail gönderme işlemi
    if (mail($to, $subject, $message, $headers)) {
        echo "Teklif talebiniz başarıyla gönderildi!";
    } else {
        echo "E-posta gönderimi sırasında bir hata oluştu!";
    }
}
?>
