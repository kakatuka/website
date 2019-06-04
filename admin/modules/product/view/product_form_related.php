<?php
$option_status = array('Không hiển thị','Hiển thị');  // key 0 - 1
$option_display    = array(
            'list'      => 'Danh sách',
            'slide'     => 'Slide'
);
$option_orderBy    = array(
            'new'       => 'Mới nhất',
            'old'       => 'Cũ nhất',
            'random'    => 'Ngẫu nhiên'
);
?>
<div class="portlet light bordered" id="block-related" style="display: none;">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">Sản phẩm liên quan</span>
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="javascript:;" class="remove"></a>
        </div>
    </div>
    <div class="portlet-body form" style="">
        <div class="note note-info">
            <p>Quý khách hàng có thể quản lý sản phẩm liên quan sẽ hiện thị dưới sản phẩm này khi xem chi tiết sản phẩm , đặc biệt quý khách có thể quản lý những sản phẩm liên quan tự chọn bằng cách chọn những sản phẩm bên trái chuyển sang khung bên phải.</p>
        </div>
        <!-- <h4 class="form-section font-red-sunglo">Sản phẩm liên quan theo danh mục</h4>
        <div class="row row-related">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status_related_category">
                        <?php 
                        foreach ($option_status as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['category']['status'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Sắp xếp</label>
                    <select class="form-control" name="sort_related_category" aria-invalid="false">
                        <?php 
                        for ($i=1; $i < 5 ; $i++) { 
                            $selected = $this->data['data_detail']['related_product']['category']['sort'] == $i ? ' selected' : '';
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Kiểu hiển thị</label>
                    <select class="form-control" name="display_related_category">
                        <?php 
                        foreach ($option_display as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['category']['display'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Sắp xếp sản phẩm</label>
                    <select class="form-control" name="order_by_related_category">
						<?php 
                        foreach ($option_orderBy as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['category']['order_by'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Số lượng</label>
                    <select class="form-control" name="number_related_category">
                        <?php 
                        for ($i=1; $i < 11 ; $i++) { 
                            $selected = $this->data['data_detail']['related_product']['category']['number'] == $i ? ' selected' : '';
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
        </div>
        <h4 class="form-section font-red-sunglo">Sản phẩm liên quan theo thương hiệu</h4>
        <div class="row row-related">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status_related_brand" aria-invalid="false">
                        <?php 
                        foreach ($option_status as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['brand']['status'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
						
					</select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Sắp xếp</label>
                    <select class="form-control" name="sort_related_brand">
						<?php 
                        for ($i=1; $i < 5 ; $i++) { 
                            $selected = $this->data['data_detail']['related_product']['brand']['sort'] == $i ? ' selected' : '';
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Kiểu hiển thị</label>
                    <select class="form-control" name="display_related_brand">
						<?php 
                        foreach ($option_display as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['brand']['display'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Sắp xếp sản phẩm</label>
                    <select class="form-control" name="order_by_related_brand">
                        <?php 
                        foreach ($option_orderBy as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['brand']['order_by'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Số lượng</label>
                    <select class="form-control" name="number_related_brand">
						<?php 
                        for ($i=1; $i < 11 ; $i++) { 
                            $selected = $this->data['data_detail']['related_product']['brand']['number'] == $i ? ' selected' : '';
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
        </div>
        <h4 class="form-section font-red-sunglo">Sản phẩm liên quan theo khoảng giá</h4>
        <div class="row row-related">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status_related_price">
                        <?php 
                        foreach ($option_status as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['price']['status'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Sắp xếp</label>
                    <select class="form-control" name="sort_related_price">
						<?php 
                        for ($i=1; $i < 5 ; $i++) { 
                            $selected = $this->data['data_detail']['related_product']['price']['sort'] == $i ? ' selected' : '';
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Kiểu hiển thị</label>
                    <select class="form-control" name="display_related_price">
						<?php 
                        foreach ($option_display as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['price']['display'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Sắp xếp sản phẩm</label>
                    <select class="form-control" name="order_by_related_price" aria-invalid="false">
						<?php 
                        foreach ($option_orderBy as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['price']['order_by'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Số lượng</label>
                    <select class="form-control" name="number_related_price">
						<?php 
                        for ($i=1; $i < 11 ; $i++) { 
                            $selected = $this->data['data_detail']['related_product']['price']['number'] == $i ? ' selected' : '';
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Chênh lệch giá</label>
                    <input type="text" class="form-control" name="range_related_price" id="range_related_price" value="<?php if($this->data['data_detail']['related_product']['price']['range']!="") echo number_format($this->data['data_detail']['related_product']['price']['range'],2,",",".");?>">
                </div>
            </div>
        </div> -->
        <h4 class="form-section font-red-sunglo">Sản phẩm liên quan tự chọn</h4>
        <div class="row row-related">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status_related_select">
                        <?php 
                        foreach ($option_status as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['select']['status'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Sắp xếp</label>
                    <select class="form-control" name="sort_related_select">
						<?php 
                        for ($i=1; $i < 5 ; $i++) { 
                            $selected = $this->data['data_detail']['related_product']['select']['sort'] == $i ? ' selected' : '';
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Kiểu hiển thị</label>
                    <select class="form-control" name="display_related_select">
						<?php 
                        foreach ($option_display as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['select']['display'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Sắp xếp sản phẩm</label>
                    <select class="form-control" name="order_by_related_select">
						<?php 
                        foreach ($option_orderBy as $key => $value) {
                            $selected = $this->data['data_detail']['related_product']['select']['order_by'] == $key ? ' selected' : '';
                            echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                        ?>
					</select>
                </div>
            </div>
        </div>
        <div class="form-group" style="margin-top:10px;height: 367px;">
        	<label class="control-label col-md-2">Chọn sản phẩm liên quan</label>								            
            <div class="col-md-10">
                <div class="col-left">
                    <div class="col-title">
                        <input type="text" class="form-control" id="text-search-product" placeholder="Tìm theo tên sản phẩm">
                        <a class="btn green btn_search" id="button-search-product" data-lang="vi"><i class="fa fa-search"></i> Tìm</a>
                    </div>
                    <div class="scrollbar" id="left-product">
                    <?php 
                    if (!empty($this->data['data_product_related'])) {
                    	echo "<ul>";
                    	foreach ($this->data['data_product_related'] as $key => $value) { ?>
                    	<li class="select-product" data-id="<?php echo $value['id'];?>">
	                    	<div class="imgs">
	                    		<img src="<?php echo base_url_cloud().'cdn/'.$value['image']; ?>" alt="<?php echo $value['name'];?>"/>
	                    	</div>
	                    	<a><?php echo $value['name'];?></a>
                    	</li>
                    <?php 
                    	}
                    	echo "</ul>";
                    	if(isset($this->data['more_product_related']) && $this->data['more_product_related']['flag'] == true){ ?>
							<span class="btn btn-xs grey-cascade load-more" id="load-more-product" data-start="<?php echo $this->data['more_product_related']['start'];?>"><i class="glyphicon glyphicon-refresh fa-spin"></i> Tải thêm dữ liệu</span>
					<?php 
                    	}
                    }else{
                    	echo "<center>Không có sản phẩm nào</center>";
                    }
                     ?>
                        
                    </div>
                </div>
                <div class="col-center"></div>
                <div class="col-right">
                    <div class="col-title"><span>Sản phẩm liên quan được chọn</span></div>
                    <div class="scrollbar" id="right-product">
                        <?php 
                        if (!empty($this->data['arr_list_selected'])) {
                            echo "<ul>";
                            foreach ($this->data['arr_list_selected'] as $key => $value) { ?>
                            <li class="select-product" data-id="<?php echo $value['id'];?>">
                                <div class="imgs">
                                    <?php 
                                    if ($value['image']!=null) { ?>
                                        <img src="<?php echo base_url_cloud().'cdn/'.$value['image']; ?>" alt="<?php echo $value['name'];?>"/>
                                    <?php 
                                    }
                                     ?>
                                    
                                </div>
                                <a><?php echo $value['name'];?></a>
                            </li>
                        <?php 
                            }
                            echo "</ul>";
                            if(isset($this->data['more_product_related']) && $this->data['more_product_related']['flag'] == true){ ?>
                                <span class="btn btn-xs grey-cascade load-more" id="load-more-product" data-start="<?php echo $this->data['more_product_related']['start'];?>"><i class="glyphicon glyphicon-refresh fa-spin"></i> Tải thêm dữ liệu</span>
                        <?php 
                            }
                        }else{
                            echo "<center>Không có sản phẩm nào</center>";
                        }
                         ?>
                    </div>
                </div>
                <input type="hidden" name="product_related" id="product-related" value="<?php if(isset($this->data['data_product_related_active'])) echo $this->data['data_product_related_active'];?>">
                <input type="hidden" name="product_current" id="product-current" value="<?php if(isset($this->data['data']['id'])) echo $this->data['data']['id'];?>">
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>