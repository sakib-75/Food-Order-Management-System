
<!-- Edit news post-->
<div class="modal fade" id="editnews<?php echo $row['postid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Edit News</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editnews.php?newsid=<?php echo $row['postid']; ?>" enctype="multipart/form-data">
                        <div class="form-group" style="margin-top:10px;">
                            <div class="row">
                                <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                    <label class="control-label">Title:</label>
                                </div>
                                <div class="col-md-9">
                                    <input required type="text" class="form-control" value="<?php echo $row['title']; ?>" name="title">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                    <label class="control-label">Food name:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="food">
                                        <option value="<?php echo $row['food']; ?>"><?php echo $row['food']; ?></option>
                                        <?php
                                        $sql="select * from product where productname != '".$row['food']."'";
                                        $cquery=$conn->query($sql);

                                        while($crow=$cquery->fetch_array()){
                                            ?>
                                        <option value="<?php echo $crow['productname']; ?>"><?php echo $crow['productname']; ?></option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                    <label class="control-label">Photo:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="photo">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3" style="text-align:left;margin-top:7px;">
                                    <label class="control-label">News:</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea maxlength="1000" id="custom_format_2<?php echo $row['postid']; ?>" required style="resize:none;height:150px;" class="form-control" name="news"> <?php echo $row['news']; ?> </textarea>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

</div>

<script type="text/javascript" src="jquery.charactercounter.js"></script>
<script>
    $(function() {
        $("#custom_format_2<?php echo $row['postid']; ?>").characterCounter({
            counterFormat: 'Characters Remaining: %1'
        });
    });

</script>



<!-- Delete news post-->
<div class="modal fade" id="deletenews<?php echo $row['postid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Delete News?</h4>
                </center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['title']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <a href="deletenews.php?newsid=<?php echo $row['postid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
