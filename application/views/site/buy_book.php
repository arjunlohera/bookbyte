    <section class="product-sec">
        <div class="container">
            <h1><?= $book_info->book_title?></h1>
            <div class="row">
                <div class="col-md-6 slider-sec">
                    <!-- main slider carousel -->
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="<?=base_url('assets/img/site/default-book.jpg')?>" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="1">
                                <img src="<?=base_url('assets/img/site/default-book.jpg')?>" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="2">
                                <img src="<?=base_url('assets/img/site/default-book.jpg')?>" class="img-fluid">
                            </div>
                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators list-inline">
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="<?=base_url('assets/img/site/default-book.jpg')?>"  height="100">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="<?=base_url('assets/img/site/default-book.jpg')?>" height="100">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                <img src="<?=base_url('assets/img/site/default-book.jpg')?>" height="100">
                            </a>
                            </li>
                        </ul>
                    </div>
                    <!--/main slider carousel-->
                </div>
                <div class="col-md-6 slider-content">
                    <?php if($book_info->description) { ?>
                        <p><?= $book_info->description ?></p>
                    <?php } else { ?>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. Lorem Ipsum has been the book. </p>
                    <p>t has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and</p>
                    <?php } ?>
                    <ul>
                        <li>
                            <span class="name">Original Price</span><span class="clm">:</span>
                            <span class="price">&#x20b9;<?=$book_info->original_price?></span>
                        </li>
                        <li>
                            <span class="name">Selling</span><span class="clm">:</span>
                            <span class="price final">&#x20b9;<?=$book_info->selling_price?></span>
                        </li>
                        <li><span class="save-cost">Save &#x20b9;<?= ($book_info->original_price - $book_info->selling_price)?></span></li>
                    </ul>
                    <div class="btn-sec">
                        <button class="btn black get_seller_contact_btn" data-book-id="<?=$book_info->book_id;?>"><i class="fas fa-phone"></i> Get Seller Contact</button>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#seller_contact_info">
                Launch demo modal
            </button> -->
            
            <!-- Modal -->
            <div class="modal fade" id="seller_contact_info" tabindex="-1" role="dialog" aria-labelledby="seller_contact_info_title"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="seller_contact_info_title">Seller Contact Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <dl class="row">
                                <dt class="col-sm-6">Seller's Name</dt>
                                <dd class="col-sm-6"><?= $seller->first_name. ' '. $seller->last_name ?></dd>

                                <dt class="col-sm-6">Phone</dt>
                                <dd class="col-sm-6"><?= $seller->phone; ?></dd>

                                <dt class="col-sm-6">Alternate Phone</dt>
                                <dd class="col-sm-6"><?= empty($seller->alternate_phone)? 'NA': $seller->alternate_phone; ?></dd>
                            </dl>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i>
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </section>