<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


require_once "revibeadmin/functions/safe.php";
require_once "revibeadmin/functions/short_text.php";
require_once "revibeadmin/functions/slug.php";
require_once "revibeadmin/classes/allClass.php";
use forteteknik\az\db\Database;

$breadcrumbGenerator = new forteteknik\az\Breadcrumb();
use forteteknik\az\Breadcrumb;

$db = new Database();
$SettingsID=1;
$SliderID=5;

   $settings = $db->getRow("SELECT * FROM site_settings WHERE id = ?",array($SettingsID));
   $slider = $db->getRow("SELECT * FROM slider WHERE id = ?",array($SliderID));

$canonicalUrl = "https://forteteknik.az/" . $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="az">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
     <link rel="canonical" href="<?php echo $canonicalUrl; ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="google-site-verification" content="TAxQPABo4FhSVTzS3d4wN5RtzTaRMVr8e9ASnNxQcyU" />
    <meta content="<?php echo $settings->keywords; ?>" name="keywords">
    <meta content="<?php echo $settings->description; ?>" name="description">
    <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/jquery.jqZoom.css">
    <link href="assets/css/style.css" rel="stylesheet">

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(96741707, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/96741707" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+994508812696",
            call_to_action: "Salam, sizə necə kömək edə bilərəm?",
            position: "right",
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

<style>
   .sc-1au8ryl-0{
      display:none;
   }
</style>
</head>