<div class="form-group" id="ht-cre-product-content" >
<label class="control-label strong required" for="content" style="margin-top: 20px;">Lịch trình chi tiết tour</label>
	<textarea id="content" name="content" class="form-control" style="height:250px;">
		<?php if(isset($this->data['data_detail']['full_info'])) echo $this->data['data_detail']['full_info']; ?>
	</textarea>
	<script type="text/javascript">CKEDITOR.replace('content');</script>
</div>
<div class="form-group" id="ht-cre-product-content" >
<label class="control-label strong required" for="content" style="margin-top: 20px;">Giá & bao gồm </label>
	<textarea id="dichvu" name="dichvu" class="form-control" style="height:250px;">
		<?php if(isset($this->data['data_detail']['dichvu'])) echo $this->data['data_detail']['dichvu']; ?>
	</textarea>
	<script type="text/javascript">CKEDITOR.replace('dichvu');</script>
</div>
<div class="form-group" id="ht-cre-product-content" >
<label class="control-label strong required" for="content" style="margin-top: 20px;">Điều Khoản </label>
	<textarea id="dieukhoan" name="dieukhoan" class="form-control" style="height:250px;">
		<?php if(isset($this->data['data_detail']['dieukhoan'])) echo $this->data['data_detail']['dieukhoan']; ?>
	</textarea>
	<script type="text/javascript">CKEDITOR.replace('dieukhoan');</script>
</div>
<div class="form-group hidden" id="ht-cre-product-content " >
<label class="control-label strong required" for="content" style="margin-top: 20px;">Câu hỏi thường gặp</label>
	<textarea id="ghichu" name="mote" class="form-control" style="height:250px;">
		<?php if(isset($this->data['data_detail']['ghichu'])) echo $this->data['data_detail']['ghichu']; ?>
	</textarea>
	<script type="text/javascript">CKEDITOR.replace('ghichu');</script>
</div
