<?php
session_start();

// Kullanıcının IP adresini al
$userIP = $_SERVER['REMOTE_ADDR'];

// Eğer kullanıcı daha önce ziyaret ettiyse, ziyaretçi sayısını arttır
if(!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true;

    // Ziyaretçi sayısını bir dosyada sakla veya veritabanında sakla
    $visitorCountFile = 'visitor_count.txt';

    // Dosya varsa oku, yoksa oluştur ve ziyaretçi sayısını arttır
    if(file_exists($visitorCountFile)) {
        $visitorCount = file_get_contents($visitorCountFile);
        $visitorCount++;
    } else {
        $visitorCount = 1;
    }

    // Ziyaretçi sayısını dosyaya yaz
    file_put_contents($visitorCountFile, $visitorCount);
}

// Ziyaretçi sayısını göster
echo "Şu anki ziyaretçi sayısı: " . $visitorCount;
?>
