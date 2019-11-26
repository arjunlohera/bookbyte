<section class="static about-sec">
        <div class="container">
            <h2>Buy books</h2>
            <div class="recomended-sec">
                <!-- <div class="row my-5">
                    <input class="form-control col-8 mr-2" id="book_search" name="book_search" type="text" placeholder="Search Book...">
                    <button id="search_btn" class="ml-2 col-2 btn-sm btn-primary" disabled><i class="fas fa-search"></i> Search</button>
                </div> -->
                <div class="row">
                    <?php foreach($books as $book) { ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                        <img src="<?=base_url()?>assets/img/site/default_book.png" height="200" alt="<?=$book->book_title?>">
                            <h3><a href="#"><?=$book->book_title?></a></h3>
                            <h6>Original price <s>&#x20b9;<?=$book->original_price?></s> <br/>Selling price <span class="price">&#x20b9;<?=$book->selling_price?></span></h6>
                            <a class="btn btn-sm btn-block my-1" href="<?=base_url('Site/buy/').$book->book_id;?>">Buy Now</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- <div class="btn-sec">
                    <button class="btn gray-btn">load More books</button>
                </div> -->
            </div>
        </div>
</section>