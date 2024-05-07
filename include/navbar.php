<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="/" class="logo navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="<?php echo $settings->logo_url; ?>" alt="logo - <?php echo $settings->title; ?>" class="img-fluid logo">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link active">Ana Səhifə</a>
                <a href="abouts.php" class="nav-item nav-link">Haqqımızada</a>
                <a href="service.php" class="nav-item nav-link">Xidmətlər</a>
                 <?php
function listCategoriesDropdown($parent_id = 0)
{
    global $db;

    $categories = $db->getRows("SELECT * FROM categories WHERE parent_id = ?", [$parent_id]);

    if ($categories) {
        echo '<ul class="dropdown-menu fade-up m-0">';
        foreach ($categories as $category) {
            echo '<li><a href="category.php?category_slug=' . $category->seo_url . '" class="dropdown-item">' . $category->name . '</a>';
            listCategoriesDropdown($category->id);
            echo '</li>';
        }
        echo '</ul>';
    }
}

?>
<div class="nav-item dropdown">
    <div class="nav-item dropdown">
           <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Məhsullar</a>
                      <?php listCategoriesDropdown(0); ?>
                  </div>

                </div>

                <a href="contact.php" class="nav-item nav-link">Əlaqə</a>
            </div>
            <button type="button" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" data-toggle="modal" data-target="#offerModal">
                Təklif al<i class="fa fa-arrow-right ms-3"></i>
            </button>
        </div>
    </nav>

 