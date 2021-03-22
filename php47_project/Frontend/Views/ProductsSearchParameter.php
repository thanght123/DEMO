 
    <div class="special-collection">
        <div class="tabs-container">
            <div class="row" style="margin-top:10px;">
                <div class="head-tabs head-tab1 col-lg-3">
                    <h2>
                        Search theo cấu hình sản phẩm
                    </h2>
                </div>                
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="tabs-content row">
            <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
                <div class="clearfix">
                    
                   <?php foreach($listRecord as $rows): ?>
                    <!-- box product -->
                    <div class="col-xs-6 col-md-3 col-sm-6 " style="height: 350px; overflow: hidden;">
                        <div class="product-grid" id="product-1168979">
                            <div class="image">
                                <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>">
                                    <img src="../Assets/Upload/Products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="info">
                                <h3 class="name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                                <p class="price-box">
                                    <span class="special-price">
                                        <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?> VNĐ </span>
                                    </span>
                                </p>
                                <p class="price-box">
                                    <span class="special-price">
                                        <span class="price product-price"> <?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?> VNĐ </span>
                                    </span>
                                </p>
                                <div class="action-btn">
                                    <form action="cart/add" method="post" enctype="multipart/form-data" id="product-actions-1168979">
                                        <a href="index.php?controller=cart&action=add&id=<?php echo $rows->id; ?>" class="button">Cho vào giỏ hàng</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end box product -->
                    <?php endforeach; ?>
                    <!-- paging -->
                    <div style="clear: both;"></div>
                    <div class="&#x70;&#x61;&#x67;&#x69;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x2D;&#x63;&#x6F;&#x6E;&#x74;&#x61;&#x69;&#x6E;&#x65;&#x72;"><ul class="&#x70;&#x61;&#x67;&#x69;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;">
                        <li class="disabled"><a href="#">Trang</a></li>
                        <?php for($i = 1; $i <= $numPage; $i++): ?>
                        <li><a href="index.php?controller=products&action=search&key=<?php echo $key; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                    </ul></div>
                    <!-- end paging -->
                </div>
            </div>
        </div>
    </div>

