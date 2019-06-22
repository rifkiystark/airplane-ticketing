<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="noIE" lang="en-US">
<!--<![endif]-->
<head>
	<!-- meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
	<title>Euro Travel</title>

	<link rel="stylesheet" href="<?php echo base_url() ?>gedang/client/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>gedang/client/assets/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>gedang/client/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>gedang/client/assets/css/owl.theme.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>gedang/client/assets/css/flexslider.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>gedang/client/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>gedang/client/assets/DateTimePicker.css" />
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
				<script src="assets/js/html5shiv.js"></script>
				<script src="assets/js/respond.js"></script>
			<![endif]-->

			<!--[if IE 8]>
		    	<script src="assets/js/selectivizr.js"></script>
		    <![endif]-->
		</head>
		<style>
		.mandiri,.bca,.bni,.bri{
			display:none;
		}
	</style>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html" title="HOME"><i class="ion-paper-airplane"></i> euro <span>travel</span></a>
				</div> <!-- /.navbar-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="<?php echo base_url() ?>">Home</a></li>
					<li><a href="<?php echo base_url('client/status') ?>">Status Pesanan</a></li>
					</ul> <!-- /.nav -->
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
		<section class="tour section-wrapper container">
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading"><b>Pembayaran</b></div>

						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<button class="bank btnmandiri">
										<img src="<?php echo base_url()?>gedang/client/assets/images/mandiri.png" height="35%">
									</button>
								</div>
								<div class="col-md-3">
									<button class="bank btnbni">
										<img src="<?php echo base_url()?>gedang/client/assets/images/bni.png" height="35%">
									</button>
								</div>
								<div class="col-md-3">
									<button class="bank btnbri">
										<img src="<?php echo base_url()?>gedang/client/assets/images/bri.png" height="35%">
									</button>
								</div>
								<div class="col-md-3">
									<button class="bank btnbca">
										<img src="<?php echo base_url()?>gedang/client/assets/images/bca.jpg" height="65%">
									</button>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-3">
									<p>NO.REK</p>
								</div>
								<div class="col-md-9">
									<p class="mandiri">1238-123123 a/n Travel</p>
									<p class="bca">1238-987234 a/n Travel</p>
									<p class="bri">1238-764521 a/n Travel</p>
									<p class="bni">1238-872364 a/n Travel</p>
								</div>

							</div>
							<small>* Harap catat kode reservasi</small>
							<hr>
							<p>Upload Bukti Pembayaran</p>
							<?php echo form_open_multipart('client/upload/'.$this->uri->segment(3)); ?>
							<input type="file" class="form-control" name="berkas" required="">
							<input type="submit" class="tn btn-default border-radius custom-button" value="Upload">
						</form>
						</div>		
					</div>



				</div>
				<div class="col-md-4">
					<?php foreach ($conf as $c) { ?>
					<div class="panel panel-info">
						<div class="panel-heading"><b>Kode Reservasi : <?php echo $c->kd_resv; ?> </b></div>
						<div class="panel-body">
							<b><?php echo "(".$c->code.") ".$c->description; ?></b>	<br><br>
							<?php echo $c->kodefrom." - ".$c->from.", ".$c->kotafrom." -> ".$c->kodeto." - ".$c->to.", ".$c->kotato; ?> <hr>
							<table width="100%">
								<tr>
									<td>
										<b>Waktu</b>
									</td>
									<td>
										<?php 
										$first  = new DateTime($c->depart_at);
										$second = new DateTime($c->arrived_at);

										$diff = $first->diff( $second );

										echo $diff->format('%H:%I:%S'); ?>
									</td>
								</tr>
								<tr>
									<td>
										Pergi
									</td>
									<td>
										<?php echo $c->depart_at." (".$c->kodefrom.")"; ?>
									</td>
								</tr>
								<tr>
									<td>
										Tiba
									</td>
									<td>
										<?php echo $c->arrived_at." (".$c->kodeto.")";?>				
									</td>
								</tr>
							</table>
							<hr>
							<b>Daftar Penumpang</b>
							<br>
							<?php $n = 0; foreach ($cust as $ct) { 
								if($ct->jenkel == "L"){
									$gender = "Tuan";
								}else{
									$gender = "Nyonya";
								}
								echo $gender.". ".$ct->nama."<br>";
								$n++;
							}
							?>
							<hr>
							<b>Total : Rp. <?php echo $c->price*$n ?></b>
						</div>		
						<?php } ?>
					</div>



				</div>
			</div>
		</section>
		<script src="<?php echo base_url() ?>gedang/client/assets/js/jquery-1.11.2.min.js"></script>
		<script src="<?php echo base_url() ?>gedang/client/assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>gedang/client/assets/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url() ?>gedang/client/assets/js/contact.js"></script>
		<script src="<?php echo base_url() ?>gedang/client/assets/js/jquery.flexslider.js"></script>
		<script src="<?php echo base_url() ?>gedang/client/assets/js/script.js"></script>
		<script src="<?php echo base_url() ?>gedang/client/assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>gedang/client/assets/DateTimePicker.js"></script>
		<script type="text/javascript">

			$(document).ready(function()
			{
				$(".btnmandiri").click(function(){
					$(".mandiri").show();
					$(".bca").hide();
					$(".bri").hide();
					$(".bni").hide();
				});
				$(".btnbni").click(function(){
					$(".mandiri").hide();
					$(".bca").hide();
					$(".bri").hide();
					$(".bni").show();
				});

				$(".btnbca").click(function(){
					$(".mandiri").hide();
					$(".bca").show();
					$(".bri").hide();
					$(".bni").hide();
				});

				$(".btnbri").click(function(){
					$(".mandiri").hide();
					$(".bca").hide();
					$(".bri").show();
					$(".bni").hide();
				});

				$("#dtBox").DateTimePicker();

			});


		</script>


	</body>
	</html>