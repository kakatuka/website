<?php require_once DIR_ROOT ."tmp/themes/menu.php";?>
<div class="container">
<div class="row">
<hr>
				<article>
					<ol class="breadcrumb">
						<li>
							<a href="<?php echo base_url();?>">Trang chủ</a>
						</li>
						<li class="active"><?php echo lang('login');?> - <?php echo lang('regis');?></li>
					</ol>

					<div class="f-ctn-centers col-md-12 col-xs-12 col-sm-12 ">

					    <!-- content-->
					    <div class=" login">
					        <div class="row">
					            <div class="col-md-6">
					                <div class="v2-login">
					                    <form action="" method="POST">
					                        <h3><?php echo lang('login');?></h3>
					                        <div class="input-group"><input type="email" class="form-control" id="txtemail" name="txtemail" value="" placeholder="<?php echo lang('email');?>">
					                        </div><br>
					                        <div class="input-group"><input type="password" class="form-control" id="txtpassword" name="txtpassword" value="" placeholder="<?php echo lang('password')?>">
					                        </div><br><a class="text-center text-danger" href="<?php echo base_url();?>"><?php echo lang('forgot');?></a><button type="submit" name="login_ok" class="btn btn-primary"><?php echo lang('login');?></button></form>
					                </div>
					            </div>
					            <div class="col-md-6">
					            	<?php 
					            	if (!empty($this->error)) {
					            		echo '<div class="alert alert-danger">
  												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  												<strong>'.lang('warning').'!</strong>';
												
					            		foreach ($this->error as $key => $value) {
					            			echo "<p>".$value."</p>";
					            		}
					            		echo '</div>';
					            	}
					            	if (!empty($this->success)) {
					            		echo '<div class="alert alert-success">
  												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  												<strong>'.lang('success').'!</strong>';
												
					            		foreach ($this->success as $key => $value) {
					            			echo "<p>".$value."</p>";
					            		}
					            		echo '</div>';
					            	}

					            	?>
					                <div class="v2-reg">
					                    <form action="" method="POST">
					                        <h3><?php echo lang('regis_new');?></h3>
					                        <input type="hidden" name="_token" value="<?php echo $this->data['_token'];?>">
					                        <div class="input-group"><input type="text" class="form-control email" id="email" name="email" value="" placeholder="<?php echo lang('email');?>">
					                        </div><br>
					                        <div class="input-group"><input type="text" class="form-control name" id="name" name="username" value="" placeholder="<?php echo lang('username');?>">
					                        </div><br>
					                        <div class="input-group"><input type="password" class="form-control" id="password" name="password" value="" placeholder="<?php echo lang('password');?>">
					                        </div><br>
					                        <div class="input-group"><input type="password" class="form-control" id="repassword" name="repassword" value="" placeholder="<?php echo lang('repassword');?>">
					                        </div><br />
					                        <div class="form-group check_capcha">
					                            <div style="float: left; padding: 1px 5px 0 0; width: 40%;">
					                            	<input type="text" placeholder="<?php echo lang('capcha_code');?>" class="form-control" id="captcha_cha" name="captcha_cha" value="">
					                            </div>
					                            <span>
					                            <img id="capt_img_ct" src="<?php echo base_url().'index.php?mod=user&controller=user&action=capcha';?>"> 
					                            <img title="Tải lại mã bảo vệ" id="f5capt_cha" src="<?php echo base_url();?>tmp/public/images/view-refresh-small.png">
					                        </span>
					                </div><br><button type="submit" name="regis_ok" class="btn btn-success"><?php echo lang('regis');?></button></form>
					            </div>
					        </div>
					    </div>
					</div>
				</article>
</div>
</div>