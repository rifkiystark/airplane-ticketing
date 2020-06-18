

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
		<h2 class="section-title">
			Find a Tour
		</h2>
		<div class="table-responsive">
<?php if($rute){ ?>
<center><table class="table table-hover"  >
<thead>
		<th >#</th>
		<th>From</th>
		<th>To</th>
		<th>Depart</th>
		<th>Maskapai</th>
		<th>Price</th>
		<th></th>
	</thead>
<?php $no=1; foreach($rute as $r){ ?>
<tr height="55px" style="padding-top: 100px;">
	<td style="padding-top: 27px; padding-bottom: 27px;"><?php echo $no++; ?></td>
	<td style="padding-top: 27px; padding-bottom: 27px;"><?php echo $r->rute_from; ?></td>
	<td style="padding-top: 27px; padding-bottom: 27px;"><?php echo $r->rute_to; ?></td>
	<td style="padding-top: 27px; padding-bottom: 27px;"><?php echo $r->depart_at; ?></td>
	<td style="padding-top: 27px; padding-bottom: 27px;"><?php echo $r->description; ?></td>
	<td style="padding-top: 27px; padding-bottom: 27px;"><?php echo "Rp. ".$r->price; ?></td>
	<td style="padding-top: 15px; padding-bottom: 15px;"><a style="cursor: pointer; color:white;" title="" onclick="href='<?php echo base_url("client/reservation/".$r->id."/".$_GET['qty']); ?>'"><button type="submit" name="" class="btn btn-default border-radius custom-tombol">Book</button></a></td>
</tr>
<?php } ?>
</table>
</center>
<?php }else{ ?>
	<div>
		Jadwal tidak ada
	</div>
<?php } ?>
</div>
	</section>

	<script src="<?php echo base_url() ?>gedang/client/assets/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url() ?>gedang/client/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>gedang/client/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>gedang/client/assets/js/contact.js"></script>
    <script src="<?php echo base_url() ?>gedang/client/assets/js/jquery.flexslider.js"></script>
	<script src="<?php echo base_url() ?>gedang/client/assets/js/script.js"></script>
	<script src="<?php echo base_url() ?>gedang/client/assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>gedang/client/assets/DateTimePicker.js"></script>
	<script type="text/javascript">

		$(document).ready(function()
 {
   
     $("#dtBox").DateTimePicker();
   
 });

	
</script>


</body>
</html>