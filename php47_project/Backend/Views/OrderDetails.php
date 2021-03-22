<div class="col-md-12"> 
    <div style="margin-bottom: 5px;">   
        <input type="button" class="btn btn-primary" value="Quay lại" onclick="history.go(-1);">
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Chi tiết đơn hàng</div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php foreach($listRecord as $rows): ?>
                    <tr>
                        <td><img src="../Assets/Upload/Products/<?php echo $rows->photo; ?>" style="width: 100px;"></td>
                        <td><?php echo $rows->name; ?></td>
                        <td><?php echo $rows->quantity; ?></td>
                        <td><?php echo number_format($rows->price); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>