<?php 
require_once "revibeadmin/functions/safe.php";
require_once "revibeadmin/functions/short_text.php";
require_once "revibeadmin/functions/slug.php";
require_once "revibeadmin/classes/allClass.php";
use forteteknik\az\db\Database;
$breadcrumbGenerator = new forteteknik\az\Breadcrumb();
use forteteknik\az\Breadcrumb;
$db = new Database();
$SettingsID=1;
$settings = $db->getRow("SELECT * FROM site_settings WHERE id = ?",array($SettingsID));
$title = "Haqqımızda - " . $settings->title;

include('include/header.php'); 
?>
<body>
<?php 
include('include/navbar.php'); 
$aboutID=1;
$about = $db->getRow("SELECT * FROM about WHERE id = ?",array($aboutID));
?> 
<div class="container-xxl py-5 wow fadeInUp">
  <div class="container">
  	    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(assets/images/carousel-bg-1.png);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Haqqımızda</h1>
                <nav aria-label="breadcrumb">
                   <a href="index.php" class="breadcrumbs__item">Ana Səhifə</a>
                   <a href="#" class="breadcrumbs__item is-active">Haqqımızda</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Haqqımızda //</h6>
                <h1 class="mb-5">ForteTeknik -  Yüksək keyfiyyətli hava kompressorlarının Satışı & Təmir xidməti </h1>
            </div>
            <hr class="text-warning lines">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo $about->image_url; ?>" alt="Haqqımızda - <?php echo $settings->title; ?>" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <p><?php echo $about->description; ?></p>
                </div>
            </div>   <hr class="text-warning lines">
              
               <div class="row">
                   <div class="col-md-6">
                    <h6 class="text-primary text-uppercase">// Missiyamız //</h6><hr class="lin40 mt-1 mb-2 text-warning">
                    <p class="py-2"><?php echo $about->mission; ?></p>
                   </div>
                    
                   <div class="col-md-6">
                    <h6 class="text-primary text-uppercase">// Hədəfimiz //</h6><hr class="lin40 mt-1 mb-2 text-warning">
                    <p class="py-2"><?php echo $about->vision; ?></p>
                    </div>
               </div>
        </div>
    </div>
  </div> 
</div>
<?php include('include/footer.php'); ?>    
