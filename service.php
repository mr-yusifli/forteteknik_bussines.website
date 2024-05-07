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
$title = "Xidmətlər - " . $settings->title;

include('include/header.php'); 

?>
<body>
<?php include('include/navbar.php'); ?> 
<div class="container-xxl py-5 wow fadeInUp">
  <div class="container">
  	    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(assets/images/carousel-bg-1.png);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">XİDMƏTLƏR</h1>
                <nav aria-label="breadcrumb">
                   <a href="index.php" class="breadcrumbs__item">Ana Səhifə</a>
                   <a href="#" class="breadcrumbs__item is-active">Xidmətlər</a>
                </nav>
            </div>
        </div>
    </div>
 <div class="row">
<?php
$myquery = $db->getRows("SELECT * FROM services");

foreach ($myquery as $items) {

    $descriptionParts = explode('-', $items->description);
    $descriptionStrong = preg_replace('/"([^"]+)"/', '<strong>"$1"</strong>', $items->description);

 if (count($descriptionParts) > 1) {
        echo '<div class="col-md-4">';
        echo '<img src="' . $items->image_url . '" alt="' . $items->service_name . '" class="img-fluid">';
        echo '</div>';
        echo '<div class="col-md-8">';
        echo '<div class="card mb-4 py-4">';
        echo '<div class="card-title ml-4"><h5 class="ml-4" style="margin-left:20px;">' . $items->service_name . '</h5></div>';
        echo '<div class="card-body">';
        echo '<ul>';

        echo '<li>' . $descriptionStrong = preg_replace('/"([^"]+)"/', '<strong>"$1"</strong>', trim($descriptionParts[0])) . '</li>';

        for ($i = 1; $i < count($descriptionParts); $i++) {
            echo '<li>' . $descriptionStrong = preg_replace('/"([^"]+)"/', '<strong>"$1"</strong>', trim($descriptionParts[$i])) . '</li>';
        }

        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
    
        echo '<div class="col-md-4">';
        echo '<img src="' . $items->image_url . '" alt="' . $items->service_name . '" class="img-fluid">';
        echo '</div>';
        echo '<div class="col-md-8">';
        echo '<div class="card mb-4 py-4">';
        echo '<div class="card-title ml-4"><h5 class="ml-4" style="margin-left:20px;">' . $items->service_name . '</h5></div>';
        echo '<div class="card-body">';
        echo '<p>' . $descriptionStrong = preg_replace('/"([^"]+)"/', '<strong>"$1"</strong>', $items->description) . '</p><br>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>


 	</div>

  </div>
</div>




<?php include('include/footer.php'); ?>