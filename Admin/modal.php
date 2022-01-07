<!-- Add Product -->
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
		     	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title" id="myModalLabel">Add New Food</h3></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="addproduct.php" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Food Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="pname" required placeholder="Enter Food Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Category:</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" name="category">
                                    <?php
                                        $sql="select * from category order by categoryid asc";
                                        $query=$conn->query($sql);
                                        while($row=$query->fetch_array()){
                                            ?>
                                            <option value="<?php echo $row['categoryid']; ?>"><?php echo $row['catname']; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Price:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="price" required placeholder="Enter Food Price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Offer Title:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="offer_title" placeholder="Discount Offer (If Any)">
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Offer (%):</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="offer" placeholder="Discount Offer (If Any)">
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Quantity:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quantity" required placeholder="Enter Food Quantity">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Photo:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="photo" required>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Add Category -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Category</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="addcategory.php" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Category Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="cname" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
