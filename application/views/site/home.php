<section class="slider">
        <div class="container">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="slide">
                        <img src="<?=base_url()?>assets/img/site/slide1.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>welcome to <?=APP_NAME?></h3>
                                <h5>Discover the best books online with us</h5>
                                <a href="<?=base_url('Site/shop')?>" class="btn">shop books</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="<?=base_url()?>assets/img/site/slide2.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>welcome to <?=APP_NAME?></h3>
                                <h5>Discover the best books online with us</h5>
                                <a href="<?=base_url('Site/shop')?>" class="btn">shop books</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="<?=base_url()?>assets/img/site/slide3.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>welcome to <?=APP_NAME?></h3>
                                <h5>Discover the best books online with us</h5>
                                <a href="<?=base_url('Site/shop')?>" class="btn">shop books</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="<?=base_url()?>assets/img/site/slide4.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>welcome to <?=APP_NAME?></h3>
                                <h5>Discover the best books online with us</h5>
                                <a href="<?=base_url('Site/shop')?>" class="btn">shop books</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recomended-sec">
        <div class="container">
            <div class="title">
                <h2>newly added books</h2>
                <hr>
            </div>
            <div class="row">
            <?php foreach($newly_added_books as $book) {?>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/site/img1.jpg" alt="img">
                        <h3><?=$book->book_title?></a></h3>
                        <p style="font-size:.7em">Author : <?=$book->author?>
                        </p>
                        <h6>Original price <s>&#x20b9;<?=$book->original_price?></s> <br/>Selling price <span class="price">&#x20b9;<?=$book->selling_price?></span></h6>
                        <span class="sale">NEW</span>
                        <div class="hover">
                            <a href="<?=base_url('Site/buy/').$book->book_id;?>">
                            <span><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
    <section class="about-sec">
        <div class="about-img">
            <figure style="background:url(<?=base_url()?>assets/img/site/about-img.jpg)no-repeat;"></figure>
        </div>
        <div class="about-content">
            <h2>About <?=APP_NAME?>,</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. Lorem Ipsum has been the book. </p>
            <p>It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and</p>
            <div class="btn-sec">
                <a href="<?=base_url('Site/shop')?>" class="btn yellow"><i class="fas fa-book"></i> Shop books</a>
                <a href="<?=base_url('Site/pdf')?>" class="btn black"><i class="fas fa-file-pdf"></i> Download PDFs</a>
            </div>
        </div>
    </section>
    <section class="recent-book-sec">
        <div class="container">
            <div class="title">
                <h2>buy books</h2>
                <hr>
            </div>
            <div class="row">
                <?php foreach($books as $book) { ?>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="item">
                        <img src="<?=base_url()?>assets/img/site/r1.jpg" alt="img">
                        <h3><a href="#"><?=$book->book_title?></a></h3>
                        <h6>Original price <s>&#x20b9;<?=$book->original_price?></s> <br/>Selling price <span class="price">&#x20b9;<?=$book->selling_price?></span></h6>
                        <a class="btn btn-sm btn-block my-1" href="<?=base_url('Site/buy/').$book->book_id;?>">Buy Now</a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="btn-sec">
                <a href="<?=base_url('Site/shop')?>" class="btn gray-btn">view all books</a>
            </div>
        </div>
    </section>
    <section class="features-sec">
        <div class="container">
            <ul>
                <li>
                    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <h3>SAFE SHOPPING</h3>
                    <h5>Safe Shopping Guarantee</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
                <li>
                    <span class="icon return"><i class="fa fa-reply-all" aria-hidden="true"></i></span>
                    <h3>Buy & Sell Old Books</h3>
                    <h5>100% Origial Buyers</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
                <li>
                    <span class="icon chat"><i class="fa fa-comments" aria-hidden="true"></i></span>
                    <h3>24/7 SUPPORT</h3>
                    <h5>online Consultations</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
            </ul>
        </div>
    </section>
    <section class="offers-sec" style="background:url(<?=base_url()?>assets/img/site/offers.jpg)no-repeat;">
        <div class="cover"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail">
                        <h3>Top 50% OFF on Selected</h3>
                        <h6>We are now offering some good discount 
                    on selected books go and shop them</h6>
                        <a href="<?=base_url('Site/shop')?>" class="btn blue-btn">view all books</a>
                        <span class="icon-point percentage">
                            <img src="<?=base_url()?>assets/img/site/precentagae.png" alt="">
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail">
                        <h3>Buy 2 and Get Extra!</h3>
                        <h6>We are now offering some good discount 
                    on selected books go and shop them</h6>
                        <a href="<?=base_url('Site/shop')?>" class="btn blue-btn">view all books</a>
                        <span class="icon-point amount"><img src="<?=base_url()?>assets/img/site/amount.png" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
    </section>