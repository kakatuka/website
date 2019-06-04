<!-- <div class="col-md-4 col-lg-3">
    <h4>Tags</h4>
    <p class="text-muted">Tag có thể được dùng để phân loại các sản phẩm.</p>
</div> -->
<div class="col-md-8 col-lg-12" style="width: 50%">
    <div class="panel panel-default panel-light" id="ht-cre-product-tags">
        <div class="panel-body">
        <!--     <div class="form-group">
                <label class="control-label strong" for="Tags">Tags</label>
                <div class="controls">
                    <input placeholder="Nhập từ khóa" class="form-control" id="meta_keyword" name="meta_keyword" value="<?php if(isset($this->data['data_detail']['meta_keyword'])) echo $this->data['data_detail']['meta_keyword']; ?>" />
                </div>
            </div> -->
            <div class="form-group">
                <label class="control-label strong" >Meta tite</label>
                <div class="controls">
                    <input class="form-control" placeholder="title seo" id="title" value="<?php if(isset($this->data['data_detail']['meta_title'])) echo $this->data['data_detail']['meta_title']; ?>" name="meta_title" type="text">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label strong" >Meta keyword</label>
                 <div class="controls">
                    <input class="form-control" placeholder="từ khóa seo" id="title" value="<?php if(isset($this->data['data_detail']['meta_title'])) echo $this->data['data_detail']['meta_keyword']; ?>" name="meta_keyword" type="text">
                    <span class="help-block"><span class="field-validation-valid help-block" ></span></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label strong" for="Tags">Meta description</label>
                <div class="controls">
                   <textarea class="form-control" rows="4" id="meta_description" placeholder="<?php echo lang('meta_description_required');?>" data-counter="300" name="meta_description" cols="50"><?php if(isset($this->data['data_detail']['meta_description'])) echo $this->data['data_detail']['meta_description']; ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
