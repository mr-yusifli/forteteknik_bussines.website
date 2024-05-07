<?php 
require_once "revibeadmin/functions/safe.php";
require_once "revibeadmin/functions/short_text.php";
require_once "revibeadmin/functions/slug.php";
require_once "revibeadmin/classes/allClass.php";
use forteteknik\az\db\Database;
$breadcrumbGenerator = new forteteknik\az\Breadcrumb();
use forteteknik\az\Breadcrumb;
$db = new Database();
$productID = $_GET['product_id'];
$SettingsID=1;
$SliderID=5;
   $settings = $db->getRow("SELECT * FROM site_settings WHERE id = ?",array($SettingsID));
if (isset($_GET['product_id'])) {
    $productID = $_GET['product_id'];
    $product = $db->getRow("SELECT * FROM products WHERE id = ?", [$productID]);
    if ($product) {
        $title = $product->name . " - " . $settings->title;
    } else {
        $title = $settings->title;
    }
} else {
    $title = "Hata: Ürün ID Belirtilmemiş";
}
?>
<?php 
include('include/header.php'); 
$productID = $_GET['product_id'];
?>
<body>
<?php include('include/navbar.php'); ?> 
<div class="container-xxl py-5 wow fadeInUp">
  <div class="container">
  	    <?php
     $product = $db->getRow("SELECT * FROM products WHERE id = ?", [$productID]);
     if ($product) { ?>
  	    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(assets/images/carousel-bg-1.png);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $product->name; ?></h1>
                <nav aria-label="breadcrumb">
<?php
$breadcrumbGenerator->addCrumb('Ana Səhifə', '/');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product = $db->getRow("SELECT * FROM products WHERE id = ?", [$product_id]);
    if ($product) {
        $category = $db->getRow("SELECT * FROM categories WHERE id = ?", [$product->category_id]);
        if ($category) {
            $breadcrumbGenerator->addCrumb($category->name, 'category.php?category_slug=' . $category->seo_url);
        }
        $breadcrumbGenerator->addCrumb($product->name, null, true);
    }
}
$breadcrumbGenerator->outputBreadcrumb();

?>
                </nav>
            </div>
        </div>
    </div>
 <div class="row">
 	<!-- <div class="card"> -->
<div class="col-md-4">
    <!-- Resimlerin Swiper'ı -->
    <div class="swiper">
        <div class="swiper-wrapper">
            <!-- Resimler burada listelenir -->
            <?php
            $urun_id = $productID;
            $urunfoto = $db->getRows("SELECT * FROM urunfoto WHERE product_id = ?", [$urun_id]);
            if (!empty($urunfoto)) {
                foreach ($urunfoto as $foto) {
                    echo '<div class="swiper-slide">';
                    echo '<img class="img-fluid urunresmi" src="' . $foto->image_url . '" alt="'.$product->name.'">';
                    echo '</div>';
                }
            }
            ?>
        </div>
         <div class="swiper-pagination"></div>
    </div>
</div>


 	<div class="col-md-8">
 		 <h5><?php echo $product->name; ?></h5><br>
 		 <p><?php echo $product->description; ?></p><br>
         <?php
            $variations = $db->getRows("SELECT * FROM product_variations_value WHERE product_id =?", [$productID]);
            if (!empty($variations)) {
          ?>
 		 <table class="table table-bordered">
 		 	<thead>
               <tr>
                <th></th>
                <th colspan="3" class="text-center">Debi</th>
                <th class="text-center">Motor Gücü</th>
                <th class="text-center">Voltaj</th>
                <th class="text-center">Hava Çıkışı</th>
                <th class="text-center">Ölçüler</th>
               </tr>
                <tr>
                <th class="font-weight-light text-center">Model</th>
                <th class="font-weight-light text-center">7</th>
                <th class="font-weight-light text-center">10</th>
                <th class="font-weight-light text-center">13</th>
                <th class="font-weight-light text-center">kW/hp</th>
                <th class="font-weight-light text-center">Volt</th>
                <th class="font-weight-light text-center">inch</th>
                <th class="font-weight-light text-center">mm</th>
            </tr>
            </thead>
            <tbody>
            	<tr>
              <?php
                $variasyon = $db->getRows("SELECT * FROM product_variations_value WHERE product_id =?", [$productID]);
                 foreach($variasyon as $items) { ?>
               <td  class="text-center"><?php echo $items->value; ?></td>
             <?php } ?> 
            	
                </tr>
            </tbody>
 		 </table>
        <?php } ?>
        <div class="row">
            <div class="col-md-4 col-sm-6">
        <?php 
            if ($product->stok_durum == 1) {
        echo '<span class="text-success">Stok da:  <b>Mövcutddur</b></span>';
    } else {
        echo '<span class="text-danger">Stok da:  <b>Tükənib</b></span>';
    }
        ?> 
            </div>
<div class="col-md-4 col-sm-6">
    <a href="#" class="btn btn-warning" onclick="sendWhatsAppMessage('<?php echo $product->name; ?>', '<?php echo 'https://forteteknik.az/product_detail.php?product_slug=' . slug($product->name) . '&product_id=' . $product->id; ?>')">
        <i class="fas fa-check-circle"></i> Sifariş et
    </a>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>

<script>
function sendWhatsAppMessage(productName, productUrl) {
    console.log('Ürün Adı:', productName);
    console.log('Ürün URL:', productUrl);
    var message = encodeURIComponent('Sayt Sifariş\n\nMəhsul: ' + productName + '\nLink: ' + productUrl);
    var whatsappUrl = 'https://api.whatsapp.com/send?phone=994508812696&text=' + message;
    window.open(whatsappUrl, '_blank');
}
</script>



<?php include('include/footer.php'); ?>