<div class="col-md-12">    
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách đơn hàng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th style="width:150px;"></th>
                </tr>
                <?php foreach($listRecord as $rows): ?>
                    <?php 
                        //lay ban ghi customers tuong ung voi id
                        $customer = $this->getCustomer($rows->customer_id);
                     ?>
                <tr>
                    <td><?php echo $customer->name; ?></td>
                    <td><?php echo $customer->address; ?></td>
                    <td><?php echo $customer->phone; ?></td>
                    <td><?php echo $rows->date; ?></td>
                    <td><?php echo $rows->price; ?></td>
                    <td>
                        <?php if($rows->status == 1): ?>
                            <span class="label label-primary">Đã giao hàng</span>
                        <?php else: ?>
                            <span class="label label-danger">Chưa giao hàng</span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=orders&action=detail&id=<?php echo $rows->id; ?>">Chi tiết</a>
                        <?php if($rows->status == 1): ?>
                            &nbsp;&nbsp;
                            <a href="index.php?controller=orders&action=delivery&id=<?php echo $rows->id; ?>">Giao hàng</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link">Trang</a></li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a href="index.php?controller=users&action=read&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>