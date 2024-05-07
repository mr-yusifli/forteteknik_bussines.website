<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-primary text-uppercase">// BİZİM TƏRƏFDAŞLARIMIZ //</h6>
                 <h1 class="mb-4"><span class="text-primary">ForteTeknik</span>Tərəfdaş şirkətlər</h1>
            </div>
<div class="owl-carousel testimonial-carousel position-relative">
    <?php
    $myquery = $db->getRows("SELECT * FROM partnes");
    foreach($myquery as $items) {
    ?>
        <div class="testimonial-item text-center">
            <a href="<?php echo $items->website_url; ?>">
                <img class="bg-light p-2 mx-auto mb-3" src="<?php echo $items->image_url;?>" style="width:250px; height: 120px;">
                <h5 class="mb-0"><?php echo $items->name; ?></h5>
            </a>
        </div>
    <?php } ?>
</div>

            </div>
        </div>
    </div>