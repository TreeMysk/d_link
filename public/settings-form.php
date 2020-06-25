<?php include_once('sql-query.php'); ?>

<?php

    if(isset($_POST['submit'])) {

        $sql_query = "SELECT * FROM tbl_config WHERE id = '1'";
        $result = mysqli_query($connect, $sql_query);
        $row =  mysqli_fetch_assoc($result);

        $data = array(
            'currency_id' => $_POST['currency_id'],
            'tax' => $_POST['tax']
        );

        $update_setting = Update('tbl_config', $data, "WHERE id = '1'");

        if ($update_setting > 0) {
            //$_SESSION['msg'] = "";
                $succes =<<<EOF
                    <script>
                    alert('Settings Updated Successfully...');
                    window.location = 'settings.php';
                    </script>
EOF;
                echo $succes;
            exit;
        }
    }

    if (isset($_POST['submit_currency'])) {

        $data = array(
            'currency_code' => $_POST['currency_code'],
            'currency_name' => $_POST['currency_name']
        );      

        $qry = Insert('tbl_currency', $data);                                    
                      
        //$_SESSION['msg'] = "";
                $succes =<<<EOF
                    <script>
                    alert('New Currency Added Successfully...');
                    window.location = 'settings.php';
                    </script>
EOF;
                echo $succes;
        exit;

    }    

    if (isset($_POST['submit_shipping'])) {

        $data = array(
            'shipping_name' => $_POST['shipping_name']
        );      

        $qry = Insert('tbl_shipping', $data);                                    
                      
        //$_SESSION['msg'] = "";
                $succes =<<<EOF
                    <script>
                    alert('New Shipping Added Successfully...');
                    window.location = 'settings.php';
                    </script>
EOF;
                echo $succes;
        exit;

    }

    if(isset($_POST['submit_settings'])) {

        $sql_query = "SELECT * FROM tbl_config WHERE id = '1'";
        $result = mysqli_query($connect, $sql_query);
        $row =  mysqli_fetch_assoc($result);

        $data = array(
            'app_fcm_key' => $_POST['app_fcm_key'],
            'onesignal_app_id' => $_POST['onesignal_app_id'],
            'onesignal_rest_api_key' => $_POST['onesignal_rest_api_key'],
            'protocol_type' => $_POST['protocol_type']
        );

        $update_setting = Update('tbl_config', $data, "WHERE id = '1'");

        if ($update_setting > 0) {
            //$_SESSION['msg'] = "";
                $succes =<<<EOF
                    <script>
                    alert('Settings Updated Successfully...');
                    window.location = 'settings.php';
                    </script>
EOF;
                echo $succes;
            exit;
        }
    }


    $sql_query_config = "SELECT * FROM tbl_config where id = '1'";
    $config_result = mysqli_query($connect, $sql_query_config);
    $config_row = mysqli_fetch_assoc($config_result);

    $sql_query_currency = "SELECT * FROM tbl_currency ORDER BY currency_code ASC";
    $currency_result = mysqli_query($connect, $sql_query_currency);

    $sql_query_shipping = "SELECT * FROM tbl_shipping ORDER BY shipping_id ASC";
    $shipping_result = mysqli_query($connect, $sql_query_shipping);

?>

<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">

    <!--tab start-->
    <div class="container-fluid full-width-container">
        <h1></h1>
            
        <!--breadcrum start-->
        <ol class="breadcrumb text-left">
          <li><a href="dashboard.php">Pagrindinis</a></li>
          <li class="active">Nustatymai</li>
        </ol>
        <!--breadcrum end-->
    
        <div class="section"> 

            <form id="validationForm" method="post" enctype="multipart/form-data">
            <div class="pmd-card pmd-z-depth">
                <div class="pmd-card-body">

                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="lead">VALIUTA</div>
                        </div>
                    </div>

                    <div class="group-fields clearfix row">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <div class="form-group pmd-textfield">
                                <label>Valiuta</label>
                                <select class="select-with-search form-control pmd-select2" name="currency_id" id="currency_id">
                                    <?php    
                                        while($currency_row = mysqli_fetch_array($currency_result)) {
                                            $select = '';
                                            if ($currency_row['currency_id'] == $config_row['currency_id']) {
                                            $select = "selected";  
                                        }   
                                    ?>
                                    <option value="<?php echo $currency_row['currency_id'];?>" <?php echo $select; ?>><?php echo $currency_row['currency_code'].' - '.$currency_row['currency_name']; ?></option>
                                        <?php }?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <br>
                            <button data-target="#currency-dialog" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">PAPILDYTI</button>
                        </div>
                    
                    </div>

                <div class="pmd-card-actions">
                    <p align="right">
                    <button type="submit" class="btn pmd-ripple-effect btn-danger" name="submit">Atnaujinti</button>
                    </p>
                </div>                    

                </div>


            </div>
            </form>



            <br>

            <br>        
     </div>
            
    </div>

</div>



