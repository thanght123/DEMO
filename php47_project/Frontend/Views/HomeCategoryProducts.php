<?php foreach($listCategories as $rowsCategory): ?>
<div class="special-collection">
    <div class="tabs-container">
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-10">
                <h2><?php echo $rowsCategory->name; ?></h2>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php 
        //lay cac san pham thuoc danh muc nay
        $products = $this->modelProductsInCategory($rowsCategory->id);
     ?>
    <div class="tabs-content row">
        <div id="content-tabb1" class="content-tab content-tab-proindex">
            <div class="clearfix">
                <?php foreach($products as $rows): ?>
               <!-- box product -->
                <div class="col-xs-6 col-md-2 col-sm-6 ">
                    <div class="product-grid" id="product-1168979">
                        <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img src="../Assets/Upload/Products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
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

            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>