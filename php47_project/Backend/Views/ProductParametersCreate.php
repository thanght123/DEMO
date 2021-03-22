<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm thuộc tính</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Tên thuộc tính</div>
                <div class="col-md-10">
                    <select name="parameter_id" class="form-control" style="width: 200px;">
                        <?php 
                            //lay danh muc cap cha
                            $parameter = $this->modelListParameter();
                         ?>
                        <?php foreach($parameter as $rows): ?>
                            <option value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                            <?php 
                                //lay danh muc cap con
                                $parameterSub = $this->modelListParameterSub($rows->id);
                             ?>
                             <?php foreach($parameterSub as $rowsSub): ?>
                                <option value="<?php echo $rowsSub->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name; ?></option>
                             <?php endforeach; ?>
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