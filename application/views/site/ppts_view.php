<section class="static about-sec">
        <div class="container">
            <h2>Download PPTs</h2>
            <div class="recomended-sec">
                <!-- <div class="row my-5">
                    <input class="form-control col-8 mr-2" id="ppt_search" name="ppt_search" type="text" placeholder="Search Presentation...">
                    <button id="search_btn" class="ml-2 col-2 btn-sm btn-primary" disabled><i class="fas fa-search"></i> Search</button>
                </div> -->
                <div class="row">
                    <?php 
                    if(!$ppts) {?>
                    <h3 class="text-muted">No PPT Found!</h3>
                    <?php } 
                    foreach($ppts as $ppt) { ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <div class="display-1 text-danger"><i class="fas fa-file-powerpoint"></i></div>
                            <h3><?=$ppt->client_name?></h3>
                            <a class="btn btn-sm btn-block my-1" href="<?=base_url("Site/download_ppt/$ppt->ppt_id")?>"><i class="fas fa-download"></i> Download</a>

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