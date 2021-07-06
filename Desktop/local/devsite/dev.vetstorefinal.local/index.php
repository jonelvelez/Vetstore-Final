<?php 

include_once("connections/connection.php");
$con = connection();

?>

<?php include 'header.php'; ?>


    <div class="banner">
        <div class="container-fluid">
            <div class="row">
                <h1>Header</h1>
            </div>
        </div>
    </div>

    <div class="post-group pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="images/checkup.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/checkup.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/checkup.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="post-group pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="images/checkup.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/checkup.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/checkup.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-slider pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="images/royalcanin.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/royalcanin.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/royalcanin.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/royalcanin.jpg" alt=""></div>
            
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 

<?php include 'footer.php'; ?>