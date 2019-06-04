<div class="col_right">
	<div class="content-wrapper">
		<div class="page-heading page-heading-md">
			<h2 class="header__main"><span class="breadcrumb hidden-xs"><i class="fa fa-user-o"></i> </span><span class="title"><a href="<?php echo base_url().'users/manager/index'; ?>">Quản lý người dùng</a> / <span><?php echo $this->data['data_user']['firstname']; ?></span></span></h2>
			<div class="header-right">
				<!-- <a class="btn btn-default" href="javascript:void(0)"><i class="fa fa-save"></i>&nbsp;Lưu <span class="hidden-xs"> </span>  </a> -->
			</div>
		</div>
		<!-- Main content -->
		<div class="content_col_right">
			<div class="container-fluid-md" style="margin-bottom:20px;margin-top: 50px;">
				<section class="content">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="user-profile" style="min-height: 720px;">
							<div class="col-lg-4 crop-avatar">

								<!-- Profile links -->
								<div class="block">
									<div class="block">
										<div class="thumbnail">
											<div class="thumb">
												<div class="profile-userpic">
													<div class="avatar-view">
														<a class="text-center">
															<img src="
															<?php echo base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url_cloud().'cdn/'.$this->data['data_user']['avatar'].'&h=132&w=132&zc=2';?>" class="img-responsive avatar_img" alt="avatar">
														</a>
													</div>
												</div>
											</div>

											<div class="caption text-center">
												<h6><?php echo $this->data['data_user']['lastname'];?> <?php echo $this->data['data_user']['firstname'];?>   <br /><small><?php echo $this->data['data_user']['job'];?></small></h6>
												<div class="icons-group" style="margin-top: 5px;">
													<a href="<?php echo $this->data['data_user']['facebook'];?>" target="_blank" title="" class="tip" data-original-title="Facebook"> 
														<i class="fa fa-facebook" aria-hidden="true"></i>
													</a>
													<a href="skype:?chat" target="_blank" title="" class="tip" data-original-title="Skype">
														<i class="fa fa-skype" aria-hidden="true"></i>
													</a>
													<a href="<?php echo $this->data['data_user']['github'];?>" target="_blank" title="" class="tip" data-original-title="Github">
														<i class="fa fa-github" aria-hidden="true"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /profile links -->

							</div>
							<div class="col-lg-8">
								<div class="profile-content">
									<div class="row">
										<div class="col-md-12">
											<div class="tabbable-line">
												<ul class="nav nav-tabs">
													<li class="active">
														<a href="#tab_1_1" data-toggle="tab" aria-expanded="true"><?php echo lang('personal_info');?></a>
													</li>
												</ul>
											</div>
											<div class="tab-content">
												<!-- PERSONAL INFO TAB -->
												<div class="tab-pane active" id="tab_1_1">
													<input name="_token" type="hidden" value="<?php echo base64url_encode(time());?>">
													<input name="id_user" type="hidden" value="<?php echo $this->data['data_user']['id'];?>">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-xs-12">
															<div class="form-group ">
																<label for="last_name" class="control-label"><?php echo lang('last_name');?></label>
																<input class="form-control" id="last_name" placeholder="Họ" data-counter="60" name="last_name" type="text" value="<?php echo $this->data['data_user']['lastname'];?>" disabled/>
															</div>
															<div class="form-group ">
																<label for="first_name" class="control-label"><?php echo lang('first_name');?></label>
																<input class="form-control" id="first_name" placeholder="Tên" data-counter="60" name="first_name" type="text" value="<?php echo $this->data['data_user']['firstname'];?>" disabled/>
															</div>
															
															<div class="form-group ">
																<label for="username" class="control-label"><?php echo lang('username');?></label>
																<input class="form-control" id="username" placeholder="<?php echo lang('username');?>" data-counter="30" name="username" type="text" value="<?php echo $this->data['data_user']['username'];?>" disabled/>
															</div>
															<div class="form-group ">
																<label for="email" class="control-label"><?php echo lang('email');?></label>
																<input class="form-control" id="email" placeholder="Email@gmail.com" data-counter="60" name="email" type="text" value="<?php echo $this->data['data_user']['email'];?>" disabled/>
															</div>
															<div class="form-group ">
																<label for="address" class="control-label"><?php echo lang('address');?></label>
																<input class="form-control" id="address" placeholder="Địa chỉ" data-counter="255" name="address" type="text" value="<?php echo $this->data['data_user']['address'];?>" disabled/>
															</div>
															<div class="form-group">
																<label for="dob" class="control-label"><?php echo lang('day_of_birth'); ?></label>
																<div class='input-group date' >
																	<input data-format="yyyy-MM-dd" placeholder="" class="form-control" name="birthday" type="text" value="<?php echo date('d-m-Y',$this->data['data_user']['birthday']);?>" disabled/>
																	<span class="add-on input-group-addon">
																		<i class="fa fa-calendar">
																		</i>
																	</span>
																</div>
															</div>
															<div class="form-group ">
																<label for="job_position" class="control-label"><?php echo lang('job_position');?></label>
																<input class="form-control" id="job_position" placeholder="Nghề nghiệp" data-counter="255" name="job_position" type="text" value="<?php echo $this->data['data_user']['job'];?>" disabled/>
															</div>
															<div class="form-group ">
																<label for="phone" class="control-label"><?php echo lang('phone');?></label>
																<input class="form-control" id="phone" placeholder="+84 988 444 561" data-counter="15" name="phone" type="text" value="<?php echo $this->data['data_user']['phone'];?>" disabled/>
															</div>
															<div class="form-group ">
																<label for="role" class="control-label"><?php echo lang('role');?></label>
																<select name="role" id="role" class="form-control" disabled>
																<?php foreach ($this->data['getGroup_permission'] as $key => $value) { 
																	?>
																	<option value="<?php echo $value['id']; ?>" 
																		<?php 
																		if($this->data['data_user']['group_id'] == $value['id']) echo "selected='selected'";
																		?>
																		>
																		<?php echo $value['name']; ?>		
																	</option>
																	<?php 
																	} 
																	?>
																</select>
														   </div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="form-group ">
															<label for="gender" class="control-label"><?php echo lang('gender');?></label>
															<select name="gender" id="gender" class="form-control" disabled/>
															<option value="0">Male</option>
															<option value="1">Female</option>
															<option value="2">Other</option>
														</select>
													</div>
													<div class="form-group ">
														<label for="about" class="control-label"><?php echo lang('about');?></label>
														<textarea class="form-control" rows="4" id="about" placeholder="Giới thiệu bản thân" data-counter="400" name="about" cols="50" disabled><?php echo $this->data['data_user']['about'];?></textarea>
													</div>
													<div class="form-group ">
														<label for="skype" class="control-label">Skype</label>
														<input class="form-control" id="skype" placeholder="Skype" data-counter="60" name="skype" type="text" value="<?php echo $this->data['data_user']['skype'];?>" disabled/>
													</div>
													<div class="form-group ">
														<label for="facebook" class="control-label">Facebook</label>
														<input class="form-control" id="facebook" placeholder="https://facebook.com/xxxx" data-counter="255" name="facebook" type="text" value="<?php echo $this->data['data_user']['facebook'];?>" disabled/>
													</div>
													<div class="form-group ">
														<label for="twitter" class="control-label">Twitter</label>
														<input class="form-control" id="twitter" placeholder="http://www.twitter.com/xxxx" data-counter="255" name="twitter" type="text" value="<?php echo $this->data['data_user']['twitter'];?>" disabled/>
													</div>
													<div class="form-group ">
														<label for="github" class="control-label">Github</label>
														<input class="form-control" id="github" placeholder="http://www.github.com/xxxx" data-counter="255" name="github" type="text" value="<?php echo $this->data['data_user']['github'];?>" disabled/>
													</div>
													<div class="form-group ">
														<label for="website" class="control-label">Website</label>
														<input class="form-control" id="website" placeholder="http://www.xxx.com" data-counter="255" name="website" type="text" value="<?php echo $this->data['data_user']['website'];?>" disabled/>
													</div>
												</div>
											</div>

										</div>
										<!-- END PERSONAL INFO TAB -->
									</div>
								</div>
							</div>
						</div>
						<!-- END PROFILE CONTENT -->
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- /.row -->
			<!-- Main row -->
		</section>
	</div>
</div>
<!-- /.content -->
</div>
</div>