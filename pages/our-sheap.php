<div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Məhsullar //</h6>
                <h1 class="mb-5">Təklif etdiymiz məhsullar</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
              
             <div class="container mt-5">

<ul class="nav nav-tabs" id="myTabs" role="tablist">
    <?php
    function listCategories($parent_id = 0)
    {
        global $db;

        $categories = $db->getRows("SELECT * FROM categories WHERE parent_id = ?", [$parent_id]);

        if ($categories) {
            foreach ($categories as $key => $category) {
                echo '<li class="nav-item" role="presentation">';
                echo '<a class="nav-link ' . ($key == 0 ? 'active' : '') . '" id="category_slug' . slug($category->name) . '-category_slug" data-toggle="tab" href="#tab' . $slug($category->name) . '" role="tab" aria-controls="category_slug' . slug($category->name) . '">' . $category->name . '</a>';
                echo '</li>';
            }
        }
    }

    listCategories();
    ?>
</ul>

<div class="tab-content mt-2" id="myTabContent">
    <?php
    function listProductsByCategory($parent_id = 0)
    {
        global $db;

        $categories = $db->getRows("SELECT * FROM categories WHERE parent_id = ?", [$parent_id]);

        if ($categories) {
            foreach ($categories as $key => $category) {
                echo '<div class="tab-pane fade ' . ($key == 0 ? 'show active' : '') . '" id="category_slug' . slug($category->name) .'" role="tabpanel" aria-labelledby="category_slug' . slug($category->name) .'">';

                if (isset($_GET['category_slug']) && $_GET['category_slug'] != '') {
                    $category_slug = $_GET['category_slug'];
                    $category_id = $db->getSingleResult("SELECT id FROM categories WHERE seo_url = ?", [$category_slug]);
                    $products = $db->getRows("SELECT * FROM products WHERE category_id = ?, durum = ?", [$category_id],1);
                } else {
                    $products = $db->getRows("SELECT * FROM products");
                }

                if ($products) {
                    echo '<div class="row">';
                    foreach ($products as $product) {
                        echo '<div class="col-lg-4 mb-4">';
                        echo '<div class="card" style="width: 16rem;">';
                        $productImage = $db->getRow("SELECT * FROM urunfoto WHERE product_id = ?", [$product->id]);

                        if ($productImage && isset($productImage->image_url)) {
                            echo '<img class="card-img-top productresim" src="revibesoft/' . $productImage->image_url . '" alt="' . $product->name . '">';
                        } else {
                            echo '<img class="card-img-top" src="default_image_url" alt="Product Image">';
                        }
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title h6">' . $product->name . '</h5>';
                        $uzunMetin = $product->description;
                        echo '<p class="card-text">' .  kisalt($uzunMetin,80) . '</p>';
                        echo '<a href="#" class="btn btn-primary">Göstər</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }

                echo '</div>';
            }
        }
    }

    listProductsByCategory();
    ?>
</div>



                 </div>
                </div>
            </div>
        </div>
    </div> 