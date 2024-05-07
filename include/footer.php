<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <?php 
                      $SettingsID=1;
                      $settings = $db->getRow("SELECT * FROM site_settings WHERE id = ?",array($SettingsID));
                    ?>
                    <h4 class="text-light mb-4">Əlaqə</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo $settings->address; ?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo $settings->phone; ?></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><?php echo $settings->email; ?></p>
                    <div class="d-flex pt-2">
                      <a class="btn btn-outline-light btn-social" href="<?php echo $settings->twitter_url; ?>">
                        <i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo $settings->facebook_url; ?>">
                            <i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo $settings->instagram_url; ?>">
                            <i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo $settings->linkedin_url; ?>">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                     <img src="assets/images/footer_img.png" alt="<?php echo $settings->title; ?>" class="img-fluid logo">
                </div>
                <div class="col-lg-3 col-md-6">
                 <h4 class="text-light mb-4">Haqqımızda</h4>   
                <?php 
                 $aboutID=1;
                 $about = $db->getRow("SELECT * FROM about WHERE id = ?",array($aboutID));

                 $metin =  $about->description;
                 $kisaltilmisMetin = substr($metin, 0, 187);
                 echo $kisaltilmisMetin;
                ?>
                </div>
                <div class="col-lg-3 col-md-6">
                   <a href="/">
                       <img src="assets/images/logo-footer.png" alt="<?php echo $settings->title; ?>" class="img-fluid logo">
                   </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">forteteknik.az</a>, Bütün hüquqlar qorunur.
                        CREATED BY <a class="border-bottom" href="https://royalyusifli.info.gf">RevibeSoft LLC</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="/">Ana Səhifə</a>
                            <a href="tel:+994508812696" target="blank">Əməkdaşlıq</a>
                            <a href="abouts.php">Haqqımızada</a>
                            <a href="#">FAQ</a>
                            <a href="contact.php">Əlaqə</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="offerModal" tabindex="-1" role="dialog" aria-labelledby="offerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="offerModalLabel">Təklif alın</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <form id="teklifForm" method="POST" action="">
    <div class="form-group">
        <label for="name">Ad və soyad</label>
        <input type="text" class="form-control shadow-none" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="email">E-poçt ünvanı</label>
        <input type="email" class="form-control shadow-none" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="phone">Telefon No.</label>
        <input type="tel" class="form-control shadow-none" id="phone" name="phone">
    </div>
    <div class="form-group">
        <label for="message">Təklif mətni</label>
        <textarea class="form-control shadow-none" id="message" name="message" rows="5"></textarea>
    </div>
    <div id="result"></div> 
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
        <button type="submit" name="gonder" class="btn btn-primary">Təklif Al</button>
    </div>
</form>

    </div>
  </div>
</div>


    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
         <script src="assets/js/jquery.jqZoom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/wow/wow.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/counterup/counterup.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>


$(document).ready(function() {
    $('#teklifForm').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true
            },
            message: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Zəhmət olmasa ad və soyadınızı daxil edin."
            },
            email: {
                required: "Zəhmət olmasa E-poçt ünvanınızı daxil edin.",
                email: "Zəhmət olmasa etibarlı bir e-poçt ünvanı daxil edin."
            },
            phone: {
                required: "Zəhmət olmasa telefon nömrənizi daxil edin.",
                digits: "Yalnız rəqəmlərdən istifadə edin."
            },
            message: {
                required: "Mətini yazın..."
            }
        },
        submitHandler: function(form) {
            var formData = $(form).serialize();
            $.ajax({
                type: 'POST',
                url: '../islem.php',
                data: formData,
                success: function(response) {
                    $('#result').html('<div class="alert alert-success">' + response + '</div>');
                    form.reset();
                    setTimeout(function() {
                        $('#result').empty();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    $('#result').html('<div class="alert alert-danger">E-poçt göndərmə xətası: ' + error + '</div>');
                    setTimeout(function() {
                        $('#result').empty();
                    }, 2000);
                }
            });
        }
    });
});



</script>

<script>
var swiper = new Swiper('.swiper', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    loop: true,
    autoplay: {
        delay: 5000, // Otomatik dönüş hızı (milisaniye cinsinden)
    },

    // Sayfalama gerekiyorsa
    pagination: {
        el: '.swiper-pagination',
        clickable: true, // Sayfalara tıklanabilirlik özelliği
    },
});


 // jqZoom eklentisini resminiz üzerinde çalıştırın
$(function(){
  $(".urunresim").jqZoom({
    selectorWidth: 30,
    selectorHeight: 30,
    viewerWidth: 400,
    viewerHeight: 300
  });
})
</script>
</body>

</html>