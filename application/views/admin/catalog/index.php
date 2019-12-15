<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý danh mục</li>
			</ol>
			<?php $this->load->view('admin/message', $this->data); ?>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="<?php echo "http://localhost/projectdatabase/index.php/admin/Catalog/add";?>" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm danh mục
            </a>
        </div>
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table 
									data-toolbar="#toolbar"
									data-toggle="table">
		
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên danh mục</th>
										<th>Hành động</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach ($list as $row):?>
										<tr>
											<td style=""><?php echo $row->cata_id; ?></td>
											<td style=""><?php echo $row->cata_name; ?></td>
											<td class="form-group">
												<a href="<?php echo "http://localhost/projectdatabase/index.php/admin/Catalog/edit/".$row->cata_id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
												<a href="<?php echo "http://localhost/projectdatabase/index.php/admin/Catalog/delete/".$row->cata_id;?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
									</ul>
								</nav>
							</div>
						</div>
			</div>
		</div><!--/.row-->