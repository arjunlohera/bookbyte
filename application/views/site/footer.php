 <!-- START: FOOTER -->
 <?php if($show_footer) { ?>
  <!-- Footer -->
  <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h4>Our Address</h4>
                        <h6><?=APP_NAME?>, Lovely Professional University,
                        Jalandhar, India</h6>
                        <h6>Call : +91-7981268233 </h6>
                        <h6>Email : admin@bookbyte.com</h6>
                    </div>
                    <div class="timing">
                        <h4>Call Timing</h4>
                        <h6>Mon - Fri: 7am - 10pm</h6>
                        <h6>​​Saturday: 8am - 10pm</h6>
                        <h6>​Sunday: 8am - 11pm</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="navigation">
                        <h4>Navigation</h4>
                        <ul>
                            <li><a href="<?=base_url('Site')?>" class="nav-link">Home</a></li>
                            <li><a href="<?=base_url('Site/shop')?>" class="nav-link">Shop</a></li>
                            <li><a href="<?=base_url('site/pdf')?>" class="nav-link">PDFs</a></li>
                            <li><a href="<?=base_url('site/ppt')?>" class="nav-link">PPTs</a></li>
                        </ul>
                    </div>
                    <div class="navigation">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="<?=base_url('site/terms')?>">Terms & Conditions</a></li>
                            <li><a href="<?=base_url('site/privacy_policy')?>">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Quick Contact us</h3>
                        <h6>We are now offering some good discount 
                            on selected books go and shop them</h6>
                        <form action="<?=base_url('Site/contact_us')?>" method="post" id="contact_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input placeholder="Name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Messege" name="message" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn black" type="submit"><i class="fas fa-paper-plane mr-2"></i> SEND</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>&copy; <?=date('Y')?>. All Rights Reserved. <?=APP_NAME?></h5>
                    </div>
                    <div class="col-md-6">
                        <div class="share align-middle">
                            <span class="fb"><i class="fab fa-facebook-official"></i></span>
                            <span class="instagram"><i class="fab fa-instagram"></i></span>
                            <span class="twitter"><i class="fab fa-twitter"></i></span>
                            <span class="pinterest"><i class="fab fa-pinterest"></i></span>
                            <span class="google"><i class="fab fa-google-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
      <!-- End of Footer -->
    <?php } ?>
  <!-- END: FOOTER -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#top">
    <i class="fas fa-angle-up"></i>
  </a>
 
<?php foreach ($js as $j) {?>
    <script type="text/javascript" src="<?=$j?>"></script>
<?php }?>
</body>
</html>