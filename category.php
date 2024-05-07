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
$category_slug = $_GET['category_slug'];
$SettingsID=1;
$SliderID=5;
$settings = $db->getRow("SELECT * FROM site_settings WHERE id = ?",array($SettingsID));
if (isset($_GET['category_slug'])) {
  $category_slug = $_GET['category_slug'];
 $category = $db->getRow("SELECT * FROM categories WHERE seo_url = ?", [$category_slug]);
    if ($category) {
      $title = $category->name . " - " . $settings->title;

    } else {
        $title = "Hata: Ürün Bulunamadı";
    }
} else {
    $title = "Hata: Ürün ID Belirtilmemiş";
}

include('include/header.php'); 
?>
<body>
    <?php include('include/navbar.php'); ?> 
    <div class="container-xxl py-5 wow fadeInUp">
        <div class="container">
            <div class="text-center">
                <h6 class="text-primary text-uppercase">// Məhsullar //</h6>
                <h1 class="mb-4">Məhsullarımız</h1>
            </div>
<?php
$breadcrumbGenerator->addCrumb('Ana Sayfa', '/');
if (isset($_GET['category_slug'])) {
    $category_slug = $_GET['category_slug'];
    $category = $db->getRow("SELECT * FROM categories WHERE seo_url = ?", [$category_slug]);
    if ($category) {
        $parentCategory = $db->getRow("SELECT * FROM categories WHERE id = ?", [$category->parent_id]);

        if ($parentCategory) {
            $breadcrumbGenerator->addCrumb($parentCategory->name, 'category-' . $parentCategory->seo_url);
        }
        $breadcrumbGenerator->addCrumb($category->name, null);
    }
}
$breadcrumbGenerator->outputBreadcrumb();

?>
            <hr class="bg-warning"><br>
            <div class="row">
                <?php
                if (isset($_GET['category_slug'])) {
                    $category_slug = $_GET['category_slug'];
                    $category = $db->getRow("SELECT * FROM categories WHERE seo_url = ?", [$category_slug]);
                    if ($category) {
                        $category_id = $category->id;
                       $products = $db->getRows("SELECT * FROM products WHERE category_id = ? AND durum = 1", [$category_id]);


                        $productsPerPage = 6;
                        $totalPages = ceil(count($products) / $productsPerPage);
                        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $currentPage = max(min($currentPage, $totalPages), 1);
                        $startIndex = ($currentPage - 1) * $productsPerPage;
                        $displayedProducts = array_slice($products, $startIndex, $productsPerPage);

                        echo '<div class="row">';
                        foreach ($displayedProducts as $product) {
                            echo '<div class="col-lg-4 col-md-6 mb-4">';
                            echo '<div class="card h-100">';
                            echo '<a href="product_detail.php?product_slug=' . slug($product->name) . '&product_id=' . $product->id . '">';
                            
                            $productImage = $db->getRow("SELECT * FROM urunfoto WHERE product_id = ? LIMIT 1", [$product->id]);
                            
                            echo '<img class="card-img-top img-fluid py-2" src="revibesoft/' . ($productImage && isset($productImage->image_url) ? $productImage->image_url : 'default_image_url') . '" alt="' . $product->name . '" style="max-height: 200px; object-fit: contain;">';
                            
                            echo '</a>';
                            echo '<div class="card-body">';
                            echo '<a class="card-title h6 text-center float-center" href="product-' . slug($product->name) . '-' . $product->id . '">' . $product->name . '</a>';
                            echo '</div>';
                            echo '<div class="card-footer">';
                            echo '<div class="product-buttons">';
                           echo '<a class="btn btn-warning col-12" href="product_detail.php?product_slug=' . slug($product->name) . '&product_id=' . $product->id . '">';
echo 'Göstər';
echo '</a>';


                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        echo '</div>';
echo '<div class="pagination-bar mt-3 float-right">';
echo '<div class="col-md-4 col-sm-4 col-xs-12">';
echo '<div class="text">' . count($displayedProducts) . ' məhsuldan ' . (($currentPage - 1) * $productsPerPage + 1) . ' arası göstərildi</div>';
echo '</div>';
echo '<div class="col-md-12 col-sm-8 col-xs-12">';
echo '<nav aria-label="Page navigation">';
echo '<ul class="pagination justify-content-end">';


if ($currentPage > 1) {
    echo '<li class="page-item"><a href="?category_slug=' . $category_slug . '&page=' . ($currentPage - 1) . '" class="page-link" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
}

for ($i = 1; $i <= $totalPages; $i++) {
    echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '"><a class="page-link" href="?category_slug=' . $category_slug . '&page=' . $i . '">' . $i . '</a></li>';
}

if ($currentPage < $totalPages) {
    echo '<li class="page-item"><a href="?category_slug=' . $category_slug . '&page=' . ($currentPage + 1) . '" class="page-link" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
}

echo '</ul>';
echo '</nav>';
echo '</div>';
echo '</div>';


                    } else {
                        echo '<p>Belirtilen kategori bulunamadı.</p>';
                    }
                } else {
                    echo '<p>Kategori slug belirtilmedi.</p>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php include('include/footer.php'); ?>

