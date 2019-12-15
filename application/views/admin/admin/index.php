
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<?php $this->load->view('admin/admin/head', $this->data); ?>
    <?php $this->load->view('admin/message', $this->data); ?>
	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
	</div>
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <div class="bootstrap-table"><div class="fixed-table-toolbar"><div class="bars pull-left"><div id="toolbar" class="btn-group">
            <a href="http://localhost/projectdatabase/index.php/admin/admin/add" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
            </a>
        </div></div></div><div class="fixed-table-container"><div class="fixed-table-header"><table></table></div><div class="fixed-table-body"><div class="fixed-table-loading" style="top: 37px;">Loading, please wait…</div><table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">

						    <thead>
						    <tr><th style=""><div class="th-inner sortable">ID</div><div class="fht-cell"></div></th><th style=""><div class="th-inner sortable">Họ & Tên</div><div class="fht-cell"></div></th>
						    <th style=""><div class="th-inner sortable">UserName</div><div class="fht-cell"></div></th>
						    <th style=""><div class="th-inner sortable">Gmail</div><div class="fht-cell"></div></th>
						    <th style=""><div class="th-inner ">Hành động</div><div class="fht-cell"></div></th></tr>
                            </thead>
                            <tbody>

                          	<?php foreach($list as $row):?>
                            	<p><tr>
                                    <td style=""><?php echo $row->id ?></td>
                                    <td style=""><?php echo $row->name ?></td>
                                    <td style=""><?php echo $row->username ?></td>
                                    <td style=""><?php echo $row->gmail ?></td>
                                    <td class="form-group">
                                        <a href="<?php echo "http://localhost/projectdatabase/index.php/admin/admin/edit/".$row->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="<?php echo "http://localhost/projectdatabase/index.php/admin/admin/delete/".$row->id;?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr></p>
                            <?php endforeach; ?>
                            </tbody>
						</table></div><div class="fixed-table-pagination"></div></div></div><div class="clearfix"></div>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </nav>
                   </div>
			</div>
		</div>
	</div>
</div>