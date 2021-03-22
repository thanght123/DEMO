<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit parameters</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Parent</div>
                <div class="col-md-10">
                    <select name="parent_id" class="form-control" style="width: 200px;">
                        <option value="0"></option>
                        <?php 
                            //lay cac danh muc cap 0
                            $listCategory = $this->ModelReadDropDownCategory();
                         ?>
                         <?php foreach($listCategory as $rows): ?>
                            <?php if(isset($record->id)&&$record->id==$rows->id): ?>
                            <?php else: ?>
                            <option <?php if(isset($record->id)&&$record->parent_id==$rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                            <?php endif; ?>
                         <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->            
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>