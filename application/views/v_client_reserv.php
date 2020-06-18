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
				<div class="container">
								<hr> 
					<div class="row">
						<div class="col-sm-8">
						<br>

							<table class="table table-bordered">
								<thead>
									<?php foreach ($reserve as $r) { ?>
									<tr>
										<th colspan="4">Rute</th>
										<th width="20%"><?php echo $r->date ?></th>
									</tr>
								</thead>
								<tbody>

									<tr>
										<td><?php echo $r->description ?> <br>
											(<?php echo $r->code ?>)</td>
											<td><?php echo $r->rute_from ?></td>
											<td><?php echo $r->rute_to ?></td>
											<td><?php echo $r->depart_at ?></td>
											<td><?php echo "Rp. ".$r->price ?></td>
										</tr>

										<tr>
											<td colspan="4" align="right">Total (<?php echo $this->uri->segment(4) ?>)</td>
											<td><?php echo "Rp. ".$r->price*$this->uri->segment(4) ?></td>
											<?php } ?>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="col-sm-">

							</div>
						</div>
						<?php if ($this->uri->segment(4) > 4) {
							echo "Tidak Valid";
						
						}else{ ?>
						<div class="row">
							<div class="col-sm-8">
								<form action="<?php echo base_url('client/pesan') ?>" method="post">        
									<table class="table table-bordered">
										<thead>

											<tr>
												<th colspan="5" bgcolor="#087aa2" style="color:white;font-size: 17px;">Isi Detail Penumpang</th>
											</tr>
											<tr>
												<td colspan="5" bgcolor="#76aff7" style="color:white;font-size: 15px;">Informasi Kontak yang Dapat Dihubungi</td>
											</tr>
										</thead>
										<tbody>
											<tr><td style="border-right: none;">
												<div class="form-group">
													<label for="pwd">Nama</label>
													<?php foreach ($reserve as $s) { ?>
													<input type="hidden" class="form-control" value="<?php echo $s->id ?>" name="rute_id">
													<?php } ?>
													<input type="text" class="form-control" name="namapemesan" >
												</div>
												<div class="form-group">
													<label for="pwd">Alamat</label>
													<input type="hidden" name="qty" value="<?php echo $this->uri->segment(4)?>">
													<input type="text" class="form-control" name="alamatpemesan" >
												</div></td>
												<td style="border-left: none;"><div class="form-group">
													<label for="usr">Kontak Email</label>
													<input type="email" class="form-control" name="emailpemesan" >
												</div>
												<div class="form-group">
													<label for="pwd">No.Telp </label>
													<input type="text" class="form-control" name="notelpemesan" >
												</div></td>
											</tr>

											<tr>
												<td colspan="5" bgcolor="#76aff7" style="color:white;font-size: 15px;">Data Penumpang</td>
											</tr>

											<?php for($i=0; $i < $this->uri->segment(4); $i++) { ?>
											<tr style="border-bottom: none;">
												<td style="border-right: none;border-bottom: none">
													<div class="form-group">
														<label for="sel1">Title</label>
														<select class="form-control" name="jenkelpenumpang[<?php echo $i ?>]" >
															<option value="L">Tuan</option>
															<option value="P">Nyonya</option>
														</select>
													</div></td>
													<td style="border-left: none;border-bottom: none;"><div class="form-group">
														<label for="usr">Nama</label>
														<input type="text" class="form-control" name="namapenumpang[<?php echo $i ?>]" >
													</div>
												</td>
											</tr>
											<?php }?>
											<tr>
												<td colspan="2">

													<?php 
													$x = 1;
													foreach ($seat as $s) {
														while($x <= $s->seat_qty) { ?>
														<input class="chk" type="checkbox" value='<?php echo $x ?>' name="kursi[]" <?php foreach($filter as $f) { if($x == $f->seat){ echo "disabled"; } } ?>>
														<?php $x++;
													} 
												}
												?>
											</td>
										</tr>
										<tr style="border-top: none;">
											<td align="right" colspan="2" style="border-top: none;">
												<div class="form-group">
													<button type="submit" class="btn btn-warning" style="width: 100px; height: 40px;">Pesan</button>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>
						<div class="col-sm-4">

						</div>
					</div>
					<?php } ?>

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