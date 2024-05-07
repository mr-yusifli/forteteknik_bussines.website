<div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-warning me-2"></small>
                    <small><?php echo $settings->address; ?></small>
                </div>
                <?php
                 $bugununTarihi = date("d F Y");
                 setlocale(LC_TIME, 'az_AZ.utf8');
                 $formatliTarih = strftime("%d %B %Y", strtotime($bugununTarihi));
                 //echo "Bugünün Tarihi: $formatliTarih";
                 ?>

                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-warning me-2"></small>
                    <small><?php echo "Bugün: $formatliTarih";?></small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-warning me-2"></small>
                    <small><?php echo $settings->phone; ?></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a href="<?php echo $settings->facebook_url; ?>" class="btn btn-sm-square bg-white text-warning me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo $settings->twitter_url; ?>" class="btn btn-sm-square bg-white text-warning me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo $settings->linkedin_url; ?>" class="btn btn-sm-square bg-white text-warning me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href="<?php echo $settings->instagram_url; ?>" class="btn btn-sm-square bg-white text-warning me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>