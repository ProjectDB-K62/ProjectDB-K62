<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
                <li class="active">Thêm thành viên</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm thành viên</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                                <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="name" required class="form-control" placeholder="" value="<?php echo set_value('name'); ?>">
                                    <?php echo form_error('name'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" required class="form-control" placeholder="" value="<?php echo set_value('username'); ?>">
                                    <?php echo form_error('username'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="gmail" required type="text" class="form-control" value="<?php echo set_value('gmail'); ?>">
                                    <?php echo form_error('gmail'); ?>
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="password" required type="password"  class="form-control">
                                    <?php echo form_error('password'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="re_password" required type="password"  class="form-control">
                                    <?php echo form_error('re_password'); ?>
                                </div>
                               
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
        
    </div>  <!--/.main-->   