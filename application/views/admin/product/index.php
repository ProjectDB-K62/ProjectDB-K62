<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
            <?php $this->load->view('admin/message', $this->data); ?>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="<?php echo "http://localhost/projectdatabase/index.php/admin/Product/add";?>" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Lượng tồn</th>
                                <th>Danh mục</th>
                                <th>Nhãn hiệu</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $row):?>
                                    <tr>
                                        <td style=""><?php echo $row->name; ?></td>
                                        <td class="textR">
                                            <?php if($row->discount > 0): ?>
                                                <?php $price_new = $row->price - $row->discount; ?>
                                                <b style="color: red">$<?php echo number_format($price_new); ?></b>
                                                <p style="text-decoration: line-through"><?php echo number_format($row->price); ?></p>
                                            <?php else: ?>
                                                <b style="color: red">$<?php echo number_format($row->price); ?></b>
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align: center"><img height="50" src="<?php echo base_url('upload/product/'.$row->image_link)?>"></td>
                                        <td><?php echo $row->amount; ?></td>
                                        <td><?php foreach ($catalog as $sub) {
                                                    if ($sub->cata_id == $row->catalog_id) {
                                                        echo $sub->cata_name;
                                                    }
                                            }?>
                                        </td>
                                        <td><?php foreach ($brand as $sub) {
                                                    if ($sub->brand_id == $row->brand_id) {
                                                        echo $sub->brand_name;
                                                    }
                                            }?>
                                        </td>
                                        <td class="form-group">
                                            <a href="<?php echo "http://localhost/projectdatabase/index.php/admin/Product/edit/".$row->product_id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="<?php echo "http://localhost/projectdatabase/index.php/admin/Product/delete/".$row->product_id;?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                               <?php echo $this->pagination->create_links();?>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->