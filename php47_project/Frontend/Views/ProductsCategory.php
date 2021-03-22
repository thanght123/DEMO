 
    <div class="special-collection">
        <div class="tabs-container">
            <div class="row" style="margin-top:10px;">
                <div class="head-tabs head-tab1 col-lg-3">
                    <h2>
                        <?php 
                            $category = $this->getCategoryName($category_id);
                            echo isset($category->name) ? $category->name : "";
                         ?>
                    </h2>
                </div>
                <div class="col-lg-4 text-right">
                    <select class="form-control" onchange="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id ?>&groupPrice='+this.value;">
                        <option value="0">Sắp xếp theo khoảng giá</option>
                        <option value="1tr-5tr">1 triệu - 5 triệu</option>
                        <option value="5tr-10tr">5 triệu - 10 triệu</option>
                        <option value="10tr-15tr">10 triệu - 15 triệu</option>
                        <option value="15tr-20tr">15 triệu - 20 triệu</option>
                        <option value="20tr-25tr">20 triệu - 25 triệu</option>
                        <option value="25tr-30tr">25 triệu - 30 triệu</option>
                    </select>
                </div>
                <div class="col-lg-3 text-right">
                    <select class="form-control" onchange="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id ?>&order='+this.value;">
                        <option value="0">Sắp xếp theo thứ tự</option>
                        <option value="priceAsc">Giá tăng dần</option>
                        <option value="priceDesc">Giá giảm dần</option>
                        <option value="nameAsc">Sắp xếp A-Z</option>
                        <option value="nameDesc">Sắp xếp Z-A</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <select class="form-control" onchange="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id ?>&pageSize='+this.value;">
                        <option value="0">Số bản ghi</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                    </select>
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
                        <li><a href="index.php?controller=products&action=category&id=<?php echo $category_id; ?>"><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                    </ul></div>
                    <!-- end paging -->
                </div>
            </div>
        </div>
    </div>

