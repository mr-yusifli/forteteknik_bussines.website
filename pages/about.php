<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <?php 
                $aboutID=1;
                 $about = $db->getRow("SELECT * FROM about WHERE id = ?",array($aboutID));
                ?>
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute assets/images-fluid w-100 h-100" src="<?php echo $about->image_url; ?>" style="object-fit: cover;" alt="">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">20 <span class="fs-4">İllik</span></h1>
                            <h4 class="text-white">Təcrübə</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-primary text-uppercase">// Haqqımızda //</h6>
                    <h1 class="mb-4"><span class="text-primary">ForteTeknik</span> Usta Təmir xidməti</h1>
                    <p class="mb-4">
                        <?php 
                        function kisaltMetin($metin, $limit = 200) {
                        $kisaltilmisMetin = substr($metin, 0, $limit);
                        $kisaltilmisMetin = substr($kisaltilmisMetin, 0, strrpos($kisaltilmisMetin, ' '));
                      if (strlen($metin) > $limit) {
                         $kisaltilmisMetin .= '...';
                       }
                        return $kisaltilmisMetin;
                       }
                        $orijinalMetin =  $about->description; 
                        $kisaltilmisMetin = kisaltMetin($orijinalMetin, 200);
                        echo $kisaltilmisMetin;
                        ?>
                            
                        </p>
                    <div class="row g-4 mb-3 pb-3">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">01</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Missiyamız</h6>
                                    <span><?php echo $about->mission; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">02</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Hədəfimiz</h6>
                                    <span><?php echo $about->vision; ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a href="abouts.php" class="btn btn-primary py-3 px-5">Daha çox<i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </div>
        </div>
    </div>