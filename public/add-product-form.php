<?php include_once('sql-query.php'); ?>

<?php

 	if (isset($_POST['submit'])) {

		$product_image = time().'_'.$_FILES['product_image']['name'];
		$pic2			 = $_FILES['product_image']['tmp_name'];
		$tpath2			 = 'upload/product/'.$product_image;
		copy($pic2, $tpath2);

        $data = array(
		
			'product_name'  		=> $_POST['product_name'],
			'product_price'  		=> $_POST['product_price'],
			'product_status'  		=> $_POST['product_status'],
			'product_image' 		=> $product_image,
            'product_description'	=> $_POST['product_description'],
            'product_quantity'		=> $_POST['product_quantity'],
            'category_id'  			=> $_POST['category_id']
		);		

 		$qry = Insert('tbl_product', $data);									
                      
  		//$_SESSION['msg'] = "";
		        $succes =<<<EOF
					<script>
					alert('New product successfully added...');
					window.location = 'manage-product.php';
					</script>
EOF;
				echo $succes;
		exit;

 	}

	$sql_category = "SELECT * FROM tbl_category ORDER BY category_name ASC";
	$category_result = mysqli_query($connect, $sql_category);

	$sql_currency = "SELECT currency_code FROM tbl_config, tbl_currency WHERE tbl_config.currency_id = tbl_currency.currency_id";
	$result = mysqli_query($connect, $sql_currency);
	$row = mysqli_fetch_assoc($result);

?>

<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">

	<!--tab start-->
	<div class="container-fluid full-width-container">
		<h1></h1>
			
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
		  <li><a href="dashboard.php">Pagrindinis</a></li>
		  <li class="active">Papildyti produktą</li>
		</ol>
		<!--breadcrum end-->
	
		<div class="section"> 

			<form id="validationForm" method="post" enctype="multipart/form-data">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">

					<div class="group-fields clearfix row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="lead">PAPILDYTI PRODUKTĄ</div>
						</div>
					</div>

					<div class="group-fields clearfix row">

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="product_name" class="control-label">Produkto pavadinimas *</label>
								<input type="text" name="product_name" id="product_name" class="form-control" placeholder="Produkto pavadinimas" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="product_price" class="control-label">Produkto kaina ( <?php echo $row["currency_code"]; ?> ) *</label>
								<input type="text" name="product_price" id="product_price" class="form-control" placeholder="50" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="product_quantity" class="control-label">Produkto kiekis *</label>
								<input type="number" name="product_quantity" id="product_quantity" class="form-control" placeholder="0" required>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="form-group pmd-textfield">       
								<label>Kategorija *</label>
								<select class="select-with-search form-control pmd-select2" name="category_id" id="category_id">
									<?php while ($data = mysqli_fetch_array ($category_result)) { ?>
									<option value="<?php echo $data['category_id'];?>"><?php echo $data['category_name'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="form-group pmd-textfield">       
								<label>Būsena *</label>
								<select class="select-simple form-control pmd-select2" name="product_status">
									<option value="Available">Turimas</option>
									<option value="Sold Out">Išparduota</option>
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group pmd-textfield">
								<label for="regular1" class="control-label">Nuotraukos ( jpg / png ) *</label>
								<input type="file" name="product_image" id="product_image" id="product_image" class="dropify-image" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif" required />
							</div>
						</div>						

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="form-group pmd-textfield">
								<label class="control-label">Produkto aprašymas *</label>
  								<textarea required class="form-control" name="product_description"></textarea>
  								<script>                             
									CKEDITOR.replace( 'product_description' );
								</script>	
							</div>
						</div>

						<div class="pmd-card-actions col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p align="right">
							<button type="submit" class="btn pmd-ripple-effect btn-danger" name="submit">Patvirinti</button>
							</p>
						</div>						

						</div>

				</div>

			</div> <!-- section content end -->  
			</form>
		</div>
			
	</div><!-- tab end -->

</div><!--end content area