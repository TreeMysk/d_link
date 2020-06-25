<?php

	if (isset($_GET['id'])) {
		$ID = $_GET['id'];
	} else {
		$ID = "";
	}

	// gauti vaizdo failą iš lentelės
	$sql_query = "SELECT category_image FROM tbl_category WHERE category_id = ?";

	$stmt = $connect->stmt_init();
	if ($stmt->prepare($sql_query)) {
		$stmt->bind_param('s', $ID);
		// Vykdyti užklausą
		$stmt->execute();
		// parduotuvės rezultatas
		$stmt->store_result();
		$stmt->bind_result($category_image);
		$stmt->fetch();
		$stmt->close();
	}

	// ištrinti vaizdų failą iš katalogo
	$delete = unlink('upload/category/'."$category_image");

	// ištrinti duomenis iš meniu lentelės
	$sql_query = "DELETE FROM tbl_category WHERE category_id = ?";

	$stmt = $connect->stmt_init();
	if ($stmt->prepare($sql_query)) {

		$stmt->bind_param('s', $ID);

		$stmt->execute();

		$delete_category_result = $stmt->store_result();
		$stmt->close();
	}


	$sql_query = "SELECT product_image FROM tbl_product WHERE category_id = ?";

	// sukurti masyvo kintamąjį, kad išsaugotumėte meniu vaizdą
	$image_data = array();

	$stmt_menu = $connect->stmt_init();
	if ($stmt_menu->prepare($sql_query)) {

		$stmt_menu->bind_param('s', $ID);

		$stmt_menu->execute();

		$stmt_menu->store_result();
		$stmt_menu->bind_result($image_data['product_image']);
	}

	// ištrinti visus meniu vaizdų failus iš katalogo
	while ($stmt_menu->fetch()) {
		$product_image = $image_data[product_image];
		$delete_image = unlink('upload/'."$product_image");
	}

	$stmt_menu->close();

	// ištrinti duomenis iš meniu lentelės
	$sql_query = "DELETE FROM tbl_product WHERE category_id = ?";

	$stmt = $connect->stmt_init();
	if ($stmt->prepare($sql_query)) {

		$stmt->bind_param('s', $ID);

		$stmt->execute();

		$delete_menu_result = $stmt->store_result();
		$stmt->close();
	}

	// jei ištrinti duomenų sėkmę atgal į rezervavimo puslapį
	if ($delete_category_result && $delete_menu_result) {
		header("location: manage-category.php");
	}

?>
