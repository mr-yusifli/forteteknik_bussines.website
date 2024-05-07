<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
  <div class="text-center">
                <h6 class="text-primary text-uppercase">// Media //</h6>
                 <h1 class="mb-4">Şəkil qalereyası</h1>
   </div>
<div class="row">
      <?php
    $myquery = $db->getRows("SELECT * FROM image_gallery");
    foreach($myquery as $items) {
    ?>
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img
      src="<?php echo $items->image_url;?>"
      class="w-100 shadow-1-strong rounded mb-4 img-fluid"
      alt="<?php echo $items->title;?>"
    />
  </div>
<?php } ?>

</div>
</div>