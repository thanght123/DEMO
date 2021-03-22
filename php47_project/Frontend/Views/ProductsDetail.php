<div class="product-detail" itemscope itemtype="http://schema.org/Product">
        <meta itemprop="url" content="//dktstore-theme.bizwebvietnam.net/microsoft-lumia-950-xl-mau-den">
        <meta itemprop="image" content="publicassets/frontend/images/msc.jpg?v=1469340617533">
        <meta itemprop="shop-currency" content="VND">
        <div class="top">
            <div class="row">
                <div class="col-xs-12 col-md-6 product-image">
                    <div class="featured-image">
                        <img src="../Assets/Upload/Products/<?php echo $record->photo; ?>" class="img-responsive" id="large-image" itemprop="image" data-zoom-image="../Assets/Upload/Products/<?php echo $record->photo; ?>" alt="<?php echo $record->name; ?>" />
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 info">
                    <h1 itemprop="name"><?php echo $record->name; ?></h1>
                    <p class="vendor">
                        Danh mục sản phẩm:&nbsp;
                        <span>
                            <?php 
                                $category = $this->getCategoryName($record->category_id);
                                echo isset($category->name) ? $category->name : "";
                             ?>
                        </span>
                    </p>
                    <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($record->price); ?>₫ </span> </span> </p>
                    <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($record->price - ($record->price*$record->discount)/100); ?>₫ </span> </span> </p>
                        <table style="width: 200px;">
                            <tr>
                                <td style="width: 100px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"></td>
                                <td style="text-align: right;"><?php echo $this->modelGet1Star($record->id); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"></td>
                                <td style="text-align: right;"><?php echo $this->modelGet2Star($record->id); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"></td>
                                <td style="text-align: right;"><?php echo $this->modelGet3Star($record->id); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"></td>
                                <td style="text-align: right;"><?php echo $this->modelGet4Star($record->id); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"><img src="../Assets/Frontend/images/star.png" style="width: 16px;"></td>
                                <td style="text-align: right;"><?php echo $this->modelGet5Star($record->id); ?></td>
                            </tr>
                        </table>
                </p>

                <a href="/Cart/Buy/9" class="btn btn-primary">Cho vào giỏ hàng</a>

            </div>
        </div>
    </div>
    <div class="middle">
        <ul class="list-unstyled navtabs">
            <li><a href="#tab1" class="head-tabs head-tab1 active" data-src=".head-tab1">Chi tiết sản phẩm</a></li>
        </ul>
        <div class="tab-container">
            <!-- chi tiet -->
            <?php echo $record->description; ?>
            <?php echo $record->content; ?>
            <!-- chi tiet -->
        </div>
    </div>
    <!-- comment facebook -->
    <div class="fb-comments" data-href="https://dantri.com.vn" data-width="" data-numposts="5"></div>
    <!-- end comment facebook -->
</div>