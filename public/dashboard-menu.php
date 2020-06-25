<?php 

	// pending order
	$sql_pending = "SELECT COUNT(*) as num FROM tbl_order WHERE status = '0' ";
	$total_pending = mysqli_query($connect, $sql_pending);
	$total_pending = mysqli_fetch_array($total_pending);
	$total_pending = $total_pending['num'];

	// processed order
	$sql_processed = "SELECT COUNT(*) as num FROM tbl_order WHERE status = '1' ";
	$total_processed = mysqli_query($connect, $sql_processed);
	$total_processed = mysqli_fetch_array($total_processed);
	$total_processed = $total_processed['num'];

	// canceled order
	$sql_canceled = "SELECT COUNT(*) as num FROM tbl_order WHERE status = '2' ";
	$total_canceled = mysqli_query($connect, $sql_canceled);
	$total_canceled = mysqli_fetch_array($total_canceled);
	$total_canceled = $total_canceled['num'];	

	// total order
	$sql_total_order = "SELECT COUNT(*) as num FROM tbl_order";
	$total_order = mysqli_query($connect, $sql_total_order);
	$total_order = mysqli_fetch_array($total_order);
	$total_order = $total_order['num'];

	// total category
	$sql_total_category = "SELECT COUNT(*) as num FROM tbl_category";
	$total_category = mysqli_query($connect, $sql_total_category);
	$total_category = mysqli_fetch_array($total_category);
	$total_category = $total_category['num'];

	// total product
	$sql_total_product = "SELECT COUNT(*) as num FROM tbl_product";
	$total_product = mysqli_query($connect, $sql_total_product);
	$total_product = mysqli_fetch_array($total_product);
	$total_product = $total_product['num'];

	// total template
	$sql_total_template = "SELECT COUNT(*) as num FROM tbl_fcm_template";
	$total_template = mysqli_query($connect, $sql_total_template);
	$total_template = mysqli_fetch_array($total_template);
	$total_template = $total_template['num'];

	// total help
	$sql_total_help = "SELECT COUNT(*) as num FROM tbl_help";
	$total_help = mysqli_query($connect, $sql_total_help);
	$total_help = mysqli_fetch_array($total_help);
	$total_help = $total_help['num'];

	$sql_setting = "SELECT currency_code, currency_name, tax FROM tbl_config, tbl_currency WHERE tbl_config.currency_id = tbl_currency.currency_id";
	$setting_result = mysqli_query($connect, $sql_setting);
	$setting_row = mysqli_fetch_assoc($setting_result);	

	$sql_notif = "SELECT app_fcm_key, onesignal_app_id, onesignal_rest_api_key FROM tbl_config WHERE id = 1";
	$notif_result = mysqli_query($connect, $sql_notif);
	$notif_row = mysqli_fetch_assoc($notif_result);

    $username = $_SESSION['user'];
    $sql_query = "SELECT id FROM tbl_admin WHERE username = ?";
    $data = array();
    $stmt = $connect->stmt_init();
    if($stmt->prepare($sql_query)) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $data['id']
            );
        $stmt->fetch();
        $stmt->close();
    }		

?>

<style>
  .borderless tr, .borderless td, .borderless th {
    border: none !important;
   }
</style>
<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">

	<!--tab start-->
	<div class="container-fluid full-width-container">
	
		<!-- Title -->
		<h1 class="section-title" id="services">
		</h1><!-- End Title -->
			
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
		  <li class="active">Pagrindinis</li>
		</ol><!--breadcrum end-->
	
		<div class="section"> 

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		 </div> <!--end Today's Site Activity -->

		 <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-title" align="center">
					<h1 class="pmd-card-title-text typo-fill-secondary propeller-title">INFROMACIJOS</h1>
				</div>
				<div class="pmd-card-body">
					<table class="table pmd-table" id="table-propeller">
						<tr>
							<td>KATEGORIJOS</td>
							<td>:</td>
							<td><?php echo $total_category; ?></td>
						</tr>
						<tr>
							<td>PRODUKTAI</td>
							<td>:</td>
							<td><?php echo $total_product; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-title" align="center">
					<h1 class="pmd-card-title-text typo-fill-secondary propeller-title">NUSTATYMAI</h1>
				</div>
				<div class="pmd-card-body" align="center">
					<table class="table pmd-table" id="table-propeller">
						<tr>
							<td>VALIUTA</td>
							<td>:</td>
							<td><?php echo $setting_row['currency_code']; ?></td>
						</tr>
						<tr>
							<td>Administracija</td>
							<td>:</td>
							<td><a href="edit-profile.php?id=<?php echo $data['id']; ?>">REDAGUOTI</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-title" align="center">
					<h1 class="pmd-card-title-text typo-fill-secondary propeller-title">APIE</h1>
				</div>
				<div class="pmd-card-body" align="center">
					<p>ADMINISTRACIJOS VALDYMAS</p>
					<br>
					<p><a href="http://www.dlink.ru/lt/" target="_blank">D-Link</a></p>
					<br>
					<p>linasmiskas@gmail.com</p>
				</div>
			</div>
		</div>

		</div>
			
	</div>

</div>