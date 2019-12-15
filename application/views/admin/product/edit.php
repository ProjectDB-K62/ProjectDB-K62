<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active">Edit</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm: <?php echo $product->name; ?></h1>
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
                                    <input required name="name" class="form-control" placeholder="" value="<?php echo $product->name; ?>">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required name="price" type="text" value="<?php echo $product->price; ?>" class="form-control">
                                </div>                   
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input  name="discount" type="text" value="<?php echo $product->discount; ?>" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input required name="amount" type="number" min="0" value="<?php echo $product->amount; ?>" class="form-control">
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" name="image" >
                                    <br>
                                    <div>
                                        <img height="70" width="100" src="<?php echo base_url('upload/product/'.$product->image_link)?>"> 
                                    </div>
                                </div>
                                <?php $image_list = json_decode($product->image_list); ?>
                                <div class="form-group">
                                    <label>Ảnh kèm theo</label>                                   
                                    <input type="file" multiple="" name="image_list[]" id="image_list" size="25" >
                                    <?php foreach ($image_list as $img):?>
                                        <img height="70" width="100" margin="5" src="<?php echo base_url('upload/product/'.$img)?>"> 
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="catalog" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($catalog as $row):?>
                                            <option value="<?php echo $row->cata_id; ?>" <?php if($row->cata_id == $product->catalog_id) echo "selected"; ?>><?php echo $row->cata_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>   
                                <div class="form-group">
                                    <label>Nhãn hiệu</label>
                                    <select name="brand" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($brand as $row):?>
                                            <option value="<?php echo $row->brand_id; ?>" <?php if($row->brand_id == $product->brand_id) echo "selected"; ?>><?php echo $row->brand_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea required name="description" class="form-control" rows="3"><?php echo $product->description; ?></textarea>
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->