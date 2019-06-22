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
         <li><a href="<?php echo base_url() ?>">Home</a></li>
         <li class="active"><a href="<?php echo base_url('client/status') ?>">Status Pesanan</a></li>
       </ul> <!-- /.nav -->
     </div><!-- /.navbar-collapse -->
   </div><!-- /.container -->
 </nav>
 <section class="tour section-wrapper container">
  <div class="box box-primary">
    <div class="box-header">
      <div class="row">
        <div class="col-md-10">
          <h4>            
            <?php foreach ($resv as $r) {
              echo "Rute : ".$r->kodefrom." - ".$r->from.", ".$r->kotafrom." -> ".$r->kodeto." - ".$r->to.", ".$r->kotato." | Kode Reservasi : ".$r->kd_resv;
            } ?>
          </h4>
        </div>

      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <?php 
      $no = 1;
      foreach($resv as $b){ 
        ?>
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-info">
              <div class="panel-heading">Data Pemesan</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-4">
                    Nama
                  </div>
                  <div class="col-md-8">
                    <?php echo $b->namapemesan; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    Nomor Telepon
                  </div>
                  <div class="col-md-8">
                    <?php echo $b->notelpemesan; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    Email Pemesan
                  </div>
                  <div class="col-md-8">
                    <?php echo $b->emailpemesan; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    Alamat Pemesan
                  </div>
                  <div class="col-md-8">
                    <?php echo $b->alamatpemesan; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    Status
                  </div>
                  <div class="col-md-8">
                    <?php echo $b->status; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    Kode Tiket
                  </div>
                  <div class="col-md-8">
                   <?php if($b->status == "Menunggu Pembayaran"){;?>
                   <p>Upload Bukti Pembayaran</p>
                   <?php echo form_open_multipart('client/upload2'); ?>
                    <input type="hidden" class="form-control" name="kode" required="" value="<?php echo $b->kd_resv; ?>">
                   <input type="file" class="form-control" name="berkas" required="">
                   <input type="submit" class="tn btn-default border-radius custom-button" value="Upload">
                   <?php }elseif($b->status == "Menunggu Konfirmasi"){echo "Belum Dikonfirmasi";}else{echo "<b>".$b->kd_book."</b>";}  ?>
                 </div>
               </div>

             </div>
           </div>

         </div>
         <?php } ?>

         <div class="col-md-6">
          <div class="panel panel-info">
            <div class="panel-heading">Data Penumpang</div>
            <div class="panel-body">
              <?php 
              $no=1; 
              foreach ($cust as $c) { ?>
              <b><p>Penumpang <?php echo $no ?></p></b>
              <div class="row">
                <div class="col-md-4">
                  Nama
                </div>
                <div class="col-md-8">
                  <?php echo $c->nama; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  Nomor Telepon
                </div>
                <div class="col-md-8">
                  <?php 
                  if($c->jenkel == "L"){
                    echo "Laki-laki"; 
                  }else{
                    echo "Perempuan";
                  }
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  Email Pemesan
                </div>
                <div class="col-md-8">
                  <?php echo $c->seat; ?>
                </div>
              </div>
              <hr>
              <?php $no++;?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.box-body -->
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

   $("#dtBox").DateTimePicker(

    );

 });


</script>


</body>
</html>