<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<h1 class="page-header text-center">CATEGORY CRUD</h1>
	<div class="row">
		<div class="col-md-12">
			<a style="font-size:18px" href="#addcategory" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add Category</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th style="font-size:18px">Category Name</th>
				<th style="font-size:18px" class="text-center">Action</th>
			</thead>
			<tbody>
				<?php
					$sql="select * from category order by categoryid asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td style="font-size:18px"><?php echo $row['catname']; ?></td>
							<td class="text-center">
								<a href="#editcategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deletecategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('category_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('modal.php'); ?>
</body>
</html>