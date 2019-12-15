<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý nhãn hiệu</a></li>
				<li class="active">Thêm nhãn hiệu</li>
			</ol>
		</div><!--/.row-->
        <?php $this->load->view('admin/message', $this->data); ?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm nhãn hiệu</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <form role="form" method="post">
                             <div class="form-group">
                                    <label>Tên nhãn hiệu</label>
                                    <input name="name" required class="form-control" placeholder="" value="<?php echo set_value('name'); ?>">
                                    <?php echo form_error('name'); ?>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    	</form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	