 <section>
	<?php 
 		if (!empty($this->data['info'])) {
 			$value = $this->data['info'];
 			?>
				<div class="container-fluid" style="background-image: url('<?php echo base_url()."tmp/public/" ?>images/lao_02.png');">
			 		<div class="container by-me">
			 			<h3 style="text-align: center; font-family: UTM Center">Về chúng tôi - Một số điều mà bạn nên biết vè khách sạn Sông La</h3>
			 			<div class="col-sm-6 col-xs-12">
			 				<h4 style="font-family: UTM Center"><?php echo $value[0]['title'] ?></h4>
			 				<p><?php echo $value[0]['content'] ?></p>
			 			</div>
			 			<div class="col-sm-6 col-xs-12">
			 				<h4 style="font-family: UTM Center"><?php echo $value[1]['title'] ?></h4>
			 				<p><?php echo $value[1]['content'] ?></p>
			 			</div>
			 		</div>
			 	</div>
			 	<div class="container-fluid" style="padding: 0px;">
			 		<div class="col-sm-6 col-xs-12" style="padding: 0px">
			 			<img src="<?php echo getImage( $value[0]['image'],'950','404','zc=1') ?>" alt="" style="max-width: 100%">
			 		</div>
			 		<div class="col-sm-6 col-xs-12" style="padding: 0px">
			 			<img src="<?php echo getImage( $value[1]['image'],'950','404','zc=1') ?>" alt="" style="max-width: 100%">
			 		</div>
			 	</div>
			 	<div class="container-fluid" style="background-image: url('<?php echo base_url()."tmp/public/" ?>images/lao_02.png');">
			 		<div class="container by-me-next">
			 			<div class="col-sm-6 col-xs-12">
			 				<h4 style="font-family: UTM Center"><?php echo $value[2]['title'] ?></h4>
			 				<p><?php echo $value[2]['content'] ?></p>
			 			</div>
			 			<div class="col-sm-6 col-xs-12">
			 				<h4 style="font-family: UTM Center"><?php echo $value[3]['title'] ?></h4>
			 				<p><?php echo $value[2]['content'] ?></p>
			 			</div>
			 		</div>
			 	</div>
			 	<div class="container-fluid" style="padding: 0px;">
			 		<div class="col-sm-6 col-xs-12" style="padding: 0px">
			 			<img src="<?php echo getImage( $value[2]['image'],'950','404','zc=1') ?>" alt="" style="max-width: 100%">
			 		</div>
			 		<div class="col-sm-6 col-xs-12" style="padding: 0px">
			 			<img src="<?php echo getImage( $value[3]['image'],'950','404','zc=1') ?>" alt="" style="max-width: 100%">
			 		</div>
			 	</div>
			 	<div class="container-fluid" style="background-image: url('<?php echo base_url()."tmp/public/" ?>images/lao_02.png');">
		 		<div class="container dow-detail">
		 			<h4 style=""><?php echo $value[4]['title'] ?></h4>
		 			<div class="col-sm-2"></div>
		 			<div class="col-sm-8">
		 				<p><?php echo $value[4]['content'] ?></p>
		 			</div>
		 			<div class="col-sm-2"></div>
		 		</div>
		 	</div>
 		<?php
 		}
 	 ?>
 </section>