<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
                <li class="active">Thêm sản phẩm</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required name="name" class="form-control" placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required name="price" type="text" class="form-control">
                                </div>                   
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input  name="discount" type="text" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input required name="amount" type="number" min="0" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>                                   
                                    <input type="file" name="image" id="image" size="25">
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh kèm theo</label>                                   
                                    <input type="file" multiple="" name="image_list[]" id="image_list" size="25" >
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="catalog" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($catalog as $row):?>
                                            <option value="<?php echo $row->cata_id; ?>"><?php echo $row->cata_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Nhãn hiệu</label>
                                    <select name="brand" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($brand as $row):?>
                                            <option value="<?php echo $row->brand_id; ?>"><?php echo $row->brand_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>                                                              
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea required name="description" class="form-control" rows="3"></textarea>
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