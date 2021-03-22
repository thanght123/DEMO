<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=products&action=createParameter&product_id=<?php echo $product_id; ?>" class="btn btn-primary">Thêm thuộc tính sản phẩm</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách thuộc tính sản phẩm</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Tên thuộc tính</th>
                    <th style="width:100px;"></th>
                </tr>
                <?php foreach($listRecord as $rows): ?>
                <tr>
                    <td><?php echo $rows->name; ?></td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=products&action=deleteParameter&product_id=<?php echo $product_id; ?>&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>            
        </div>
    </div>
</div>