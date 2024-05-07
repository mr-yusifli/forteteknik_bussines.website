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
$title = "Əlaqə - " . $settings->title;

include('include/header.php'); 
?>
<body>
<?php include('include/navbar.php'); ?> 
<div class="container-xxl py-5 wow fadeInUp">
  <div class="container">
  	    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(assets/images/carousel-bg-1.png);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Əlaqə</h1>
                <nav aria-label="breadcrumb">
                   <a href="index.php" class="breadcrumbs__item">Ana Səhifə</a>
                   <a href="#" class="breadcrumbs__item is-active">Əlaqə</a>
                </nav>
            </div>
        </div>
    </div>
   <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Əlaqə //</h6>
                <h1 class="mb-5">İstənilən sual üçün əlaqə saxlayın</h1>
            </div>
             <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">// E-poçt //</h5>
                                <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i><?php echo $settings->email; ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">// Telefon //</h5>
                                <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i><?php echo $settings->phone; ?></p>
                            </div>
                        </div>
                       <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">// Ünvan //</h5>
                                <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i><?php echo $settings->address; ?></p>
                            </div>
                        </div>
                      </div>
                    </div>  
                 <div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="<?php echo $settings->google_map_url; ?>"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
           </div>    
        </div>  
      </div>    
  </div>
</div>
<?php include('include/footer.php'); ?>    

