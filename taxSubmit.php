<?php
require_once("includes/connection.php");
include_once('./helpers/constant.php');
if(isset($_POST)){
// Check if the table exists
$tableName = 'formData';

//$query = "DROP TABLE IF EXISTS $tableName";
//$result = mysqli_query($conn, $query);

$query = "SHOW TABLES LIKE '$tableName'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    // Table doesn't exist, create it
    $createQuery = "CREATE TABLE $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        selected_state VARCHAR(255),
        vehicle_no VARCHAR(255),
        chassis_no VARCHAR(255),
        owner_name VARCHAR(255),
        mobileno VARCHAR(255),
        from_state VARCHAR(255),
        vehicle_type INT,
        vehicle_class INT,
        seating_cap INT,
        service_type INT,
        distance INT,
        tax_mode INT,
        barrier_district VARCHAR(255),
        tax_from DATETIME,
        tax_upto DATETIME,
        permit INT,
        permit_upto DATE,
        permit_no INT,
        mv_tax INT,
        cess INT,
        infra_cess INT,
        permit_fee INT,
        permit_variation INT,
        total_tax INT,
        uid INT DEFAULT NULL,
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Execute the create query
    $createResult = mysqli_query($conn, $createQuery);

    if ($createResult) {
        echo "Table created successfully.";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
}

// Assuming you have the $post array

$post = $_POST;
$post['total_tax'] = $post['mv_tax'] + $post['cess'] + $post['infra_cess'] + $post['permit_fee'] + $post['permit_variation'];
$post['uid'] = $_SESSION['ID'];

// Prepare the columns and values arrays
$columns = array_keys($post);
$values = array_values($post);

// Prepare the placeholders for the query

$placeholders = implode("','", $values);

// Prepare the insert query
$sql = "INSERT INTO " . $tableName . " (" . implode(', ', $columns) . ") VALUES ('" . $placeholders . "')";
// Execute the query
$result = mysqli_query($conn, $sql);

if ($result) {
    //echo "Record inserted successfully.";
?>
<!DOCTYPE html>
<html lang="en">
<head id="j_idt2">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkpost ~1~85</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/images/vahan-icon.png" sizes="16x16">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/grid-css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/component.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/jquery/jquery.js?ln=primefaces&v=7.0">
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> -->
    <script src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/jquery/jquery-plugins.js?ln=primefaces&v=7.0">
    </script>
    <script src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/core.js?ln=primefaces&v=7.0">
    </script>
    <script src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/components.js?ln=primefaces&v=7.0">
    </script>
    <script src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/jsf.js?ln=javax.faces&stage=Development">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/commonvalidation.js?ln=js">
    </script>
    <script src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/login.js?ln=js"></script>
    <script>
    function textRepeat() {
        var str = document.getElementById("regn_number").value + " / " + document.getElementById("payment_date").value + ", ";
        document.getElementById("regn_date").innerHTML = str.repeat(30);
    }

    function tabPrint(){
        window.print();
    }
</script>
<style>
    @page {
        size: auto;
        margin: 2mm;
    }

    @media print {
        .watermark {
            color: #d0d0d0;
            position: absolute;
            font-size: 44px;
            z-index: -1;
            opacity: 0.5;
            filter: grayscale(1);
            margin: auto;
            display: block;
            width: 100%;
            width: 900px;
            text-align: center;
            padding-top: 80px;
        }
        .watermark img {
            height: 300px;
        }
        button{
            display: none;
        }
    }

    @media screen {
        .watermark {
            color: #d0d0d0;
            position: absolute;
            font-size: 44px;
            z-index: -1;
            opacity: 0.5;
            filter: grayscale(1);
            margin: auto;
            display: block;
            width: 100%;
            width: 900px;
            text-align: center;
            padding-top: 80px;
        }
        .watermark img {
            height: 300px;
        }
    }

    body {
    width: 900px;
    margin: auto;
    overflow: hidden;
    padding-top: 20px;
    }
    #regn_date {
        position: absolute;
        z-index: -1;
        opacity: 0.2;
        font-size: 20px;
        max-width: 860px;
        
    }

    .border-un {
        border-bottom: 1px #000 solid !important;
        border-right: none !important;
        border-left: none !important;
    }

    .ui-widget-content {
        border: none !important;
    }
</style>
</head>
<body onLoad="textRepeat()">
    <button onclick="tabPrint()">Print</button>
    <!-- ,textRepeat()     -->
    <div class="watermark">
       <img id="j_idt10" src="<?= $URL ?>/assets/img/logo/HR_logo.png" alt="">
    </div>
    <form id="formPrint" name="formPrint" method="post"
        action="https://vahan.parivahan.gov.in/checkpost/faces/public/reports/CustomerReceipt.xhtml"
        enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="formPrint" value="formPrint">

        <div class="table-responsive" style="margin-left: 30px;margin-right: 10px;margin-top: 10px;">
            <div id="j_idt16" class="ui-outputpanel ui-widget"><input id="regn_number" type="hidden" name="regn_number"
                    value="HR50 5777">
                <input id="payment_date" type="hidden" name="payment_date" value="26-MAY-2023 03:15 PM">
                <p id="regn_date"></p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tbody><tr valign="top">
                        <td width="17%"></td>
                        <td width="61%" align="center">
                            <div
                                style="font-size:18px; font-weight:bold; color:#000000;text-decoration:underline; padding-right:15px;">
                                GOVERNMENT OF HARYANA</div>
                            <div style="font-weight: bold;"><b>Department of Transport</b></div>
                            <div><b>Checkpost Tax e-Receipt</b></div>
                        </td>
                        <td width="22%" rowspan="2" align="left" style="margin-right: 50px;"><span id="j_idt19">
                                <?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="140" height="140" viewBox="0 0 140 140"><rect x="0" y="0" width="140" height="140" fill="#ffffff"/><g transform="scale(3.784)"><g transform="translate(0,0)"><path fill-rule="evenodd" d="M10 0L10 2L11 2L11 0ZM12 0L12 1L13 1L13 2L12 2L12 4L13 4L13 2L16 2L16 3L14 3L14 7L15 7L15 8L14 8L14 9L12 9L12 7L13 7L13 5L11 5L11 6L10 6L10 4L11 4L11 3L8 3L8 4L9 4L9 5L8 5L8 7L9 7L9 8L6 8L6 9L7 9L7 10L5 10L5 11L7 11L7 12L6 12L6 13L5 13L5 12L4 12L4 11L1 11L1 10L3 10L3 9L5 9L5 8L0 8L0 9L1 9L1 10L0 10L0 14L2 14L2 16L0 16L0 17L2 17L2 16L3 16L3 17L4 17L4 16L6 16L6 17L7 17L7 16L8 16L8 17L9 17L9 18L5 18L5 19L4 19L4 21L5 21L5 20L6 20L6 21L7 21L7 22L6 22L6 23L7 23L7 22L8 22L8 23L9 23L9 22L10 22L10 24L11 24L11 25L12 25L12 27L13 27L13 26L14 26L14 25L15 25L15 27L14 27L14 28L13 28L13 29L11 29L11 26L10 26L10 28L9 28L9 27L7 27L7 26L6 26L6 25L8 25L8 26L9 26L9 25L8 25L8 24L6 24L6 25L4 25L4 22L3 22L3 19L2 19L2 18L0 18L0 22L3 22L3 24L1 24L1 25L0 25L0 29L1 29L1 26L3 26L3 27L2 27L2 28L3 28L3 29L4 29L4 26L5 26L5 27L7 27L7 28L6 28L6 29L8 29L8 31L9 31L9 32L8 32L8 37L9 37L9 35L10 35L10 30L9 30L9 29L11 29L11 30L15 30L15 31L14 31L14 33L13 33L13 32L12 32L12 33L13 33L13 34L12 34L12 35L11 35L11 37L12 37L12 36L13 36L13 37L15 37L15 36L16 36L16 37L19 37L19 35L18 35L18 34L17 34L17 33L18 33L18 32L15 32L15 31L18 31L18 29L19 29L19 30L21 30L21 32L20 32L20 31L19 31L19 32L20 32L20 33L19 33L19 34L20 34L20 36L22 36L22 37L23 37L23 36L22 36L22 35L23 35L23 34L24 34L24 33L25 33L25 34L26 34L26 33L29 33L29 34L28 34L28 35L27 35L27 36L25 36L25 35L24 35L24 37L27 37L27 36L29 36L29 37L37 37L37 34L35 34L35 32L33 32L33 29L34 29L34 31L37 31L37 30L35 30L35 28L33 28L33 27L32 27L32 25L34 25L34 27L36 27L36 28L37 28L37 26L36 26L36 25L37 25L37 22L36 22L36 21L37 21L37 18L36 18L36 17L37 17L37 14L36 14L36 13L35 13L35 12L34 12L34 11L35 11L35 9L36 9L36 8L35 8L35 9L34 9L34 8L33 8L33 9L34 9L34 11L32 11L32 8L31 8L31 11L32 11L32 13L31 13L31 12L30 12L30 13L31 13L31 14L32 14L32 15L31 15L31 16L30 16L30 14L29 14L29 15L28 15L28 14L26 14L26 18L25 18L25 19L24 19L24 20L22 20L22 18L24 18L24 17L25 17L25 16L24 16L24 17L23 17L23 15L21 15L21 16L20 16L20 15L18 15L18 14L21 14L21 13L19 13L19 11L18 11L18 12L17 12L17 13L16 13L16 14L15 14L15 13L14 13L14 12L15 12L15 11L16 11L16 10L17 10L17 9L18 9L18 8L20 8L20 7L21 7L21 8L22 8L22 9L19 9L19 10L20 10L20 12L22 12L22 13L23 13L23 14L24 14L24 13L23 13L23 12L24 12L24 11L21 11L21 10L22 10L22 9L23 9L23 10L25 10L25 9L28 9L28 10L26 10L26 11L28 11L28 12L29 12L29 11L30 11L30 10L29 10L29 9L30 9L30 8L28 8L28 7L29 7L29 3L27 3L27 2L28 2L28 1L29 1L29 0L27 0L27 2L26 2L26 1L25 1L25 2L23 2L23 3L22 3L22 1L21 1L21 0L15 0L15 1L14 1L14 0ZM23 0L23 1L24 1L24 0ZM8 1L8 2L9 2L9 1ZM17 1L17 3L18 3L18 4L17 4L17 8L15 8L15 9L14 9L14 10L12 10L12 9L11 9L11 8L10 8L10 9L8 9L8 10L7 10L7 11L9 11L9 10L10 10L10 12L8 12L8 14L9 14L9 17L10 17L10 18L11 18L11 22L13 22L13 23L12 23L12 24L13 24L13 25L14 25L14 24L15 24L15 25L17 25L17 26L16 26L16 27L15 27L15 28L16 28L16 29L17 29L17 28L18 28L18 26L19 26L19 28L20 28L20 29L22 29L22 28L21 28L21 27L24 27L24 28L27 28L27 29L25 29L25 31L24 31L24 30L23 30L23 31L22 31L22 32L21 32L21 33L22 33L22 32L23 32L23 31L24 31L24 32L26 32L26 31L27 31L27 32L28 32L28 30L27 30L27 29L28 29L28 27L25 27L25 26L26 26L26 25L25 25L25 24L26 24L26 23L24 23L24 22L25 22L25 21L24 21L24 22L23 22L23 21L22 21L22 20L21 20L21 19L20 19L20 18L19 18L19 17L20 17L20 16L18 16L18 15L17 15L17 16L15 16L15 14L14 14L14 13L12 13L12 11L13 11L13 12L14 12L14 11L15 11L15 9L17 9L17 8L18 8L18 5L19 5L19 7L20 7L20 5L19 5L19 4L22 4L22 5L23 5L23 7L24 7L24 8L26 8L26 6L25 6L25 4L24 4L24 3L23 3L23 4L22 4L22 3L20 3L20 1L19 1L19 2L18 2L18 1ZM25 2L25 3L26 3L26 2ZM15 4L15 5L16 5L16 4ZM23 4L23 5L24 5L24 4ZM26 4L26 5L28 5L28 4ZM9 6L9 7L10 7L10 6ZM11 6L11 7L12 7L12 6ZM15 6L15 7L16 7L16 6ZM21 6L21 7L22 7L22 6ZM24 6L24 7L25 7L25 6ZM27 6L27 7L28 7L28 6ZM10 9L10 10L11 10L11 9ZM36 10L36 11L37 11L37 10ZM3 12L3 13L2 13L2 14L4 14L4 15L3 15L3 16L4 16L4 15L5 15L5 13L4 13L4 12ZM25 12L25 13L27 13L27 12ZM6 13L6 14L7 14L7 13ZM9 13L9 14L10 14L10 17L12 17L12 18L13 18L13 19L12 19L12 21L13 21L13 19L15 19L15 20L14 20L14 21L15 21L15 22L14 22L14 23L16 23L16 22L18 22L18 24L17 24L17 25L18 25L18 24L22 24L22 25L19 25L19 26L20 26L20 27L21 27L21 26L24 26L24 25L23 25L23 24L24 24L24 23L23 23L23 22L22 22L22 23L19 23L19 22L21 22L21 20L19 20L19 18L18 18L18 20L17 20L17 17L18 17L18 16L17 16L17 17L15 17L15 16L14 16L14 17L12 17L12 15L14 15L14 14L10 14L10 13ZM32 13L32 14L33 14L33 17L32 17L32 16L31 16L31 17L30 17L30 19L29 19L29 18L28 18L28 17L29 17L29 16L28 16L28 15L27 15L27 16L28 16L28 17L27 17L27 18L28 18L28 19L29 19L29 20L28 20L28 21L27 21L27 19L25 19L25 20L26 20L26 22L28 22L28 23L27 23L27 26L28 26L28 25L29 25L29 27L31 27L31 28L32 28L32 27L31 27L31 25L32 25L32 24L31 24L31 25L29 25L29 24L30 24L30 23L29 23L29 22L31 22L31 23L32 23L32 22L34 22L34 23L33 23L33 24L36 24L36 23L35 23L35 21L34 21L34 20L36 20L36 19L33 19L33 17L34 17L34 18L35 18L35 17L36 17L36 14L35 14L35 15L34 15L34 13ZM6 15L6 16L7 16L7 15ZM21 16L21 17L22 17L22 16ZM34 16L34 17L35 17L35 16ZM14 17L14 18L15 18L15 17ZM31 18L31 20L29 20L29 21L28 21L28 22L29 22L29 21L31 21L31 22L32 22L32 21L33 21L33 20L32 20L32 18ZM6 19L6 20L7 20L7 21L9 21L9 20L10 20L10 19L8 19L8 20L7 20L7 19ZM1 20L1 21L2 21L2 20ZM18 20L18 21L19 21L19 20ZM31 20L31 21L32 21L32 20ZM28 23L28 24L29 24L29 23ZM3 25L3 26L4 26L4 25ZM16 27L16 28L17 28L17 27ZM29 29L29 32L32 32L32 29ZM30 30L30 31L31 31L31 30ZM36 32L36 33L37 33L37 32ZM14 33L14 34L15 34L15 33ZM31 33L31 34L29 34L29 36L30 36L30 35L31 35L31 36L36 36L36 35L33 35L33 34L34 34L34 33L33 33L33 34L32 34L32 33ZM21 34L21 35L22 35L22 34ZM31 34L31 35L32 35L32 34ZM13 35L13 36L15 36L15 35ZM17 35L17 36L18 36L18 35ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM30 0L30 7L37 7L37 0ZM31 1L31 6L36 6L36 1ZM32 2L32 5L35 5L35 2ZM0 30L0 37L7 37L7 30ZM1 31L1 36L6 36L6 31ZM2 32L2 35L5 35L5 32Z" fill="#000000"/></g></g></svg>

                            </span>
                            
                        </td>
                    </tr>
                    <tr valign="top">
                        <td colspan="2">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr>
                                    <td width="17%" class="row-p"><label>Registration No.</label></td>
                                    <td width="76%" class="row-p"><span id="regn_no" style="font-weight: bold;">: HR50 5777</span> </td>
                                </tr>
                                <tr>
                                    <td width="17%" class="row-p"><label>Receipt No.</label></td>
                                    <td width="76%" class="row-p">: <span class="row-p1">HRT230526422718</span> </td>
                                </tr>
                                <tr>
                                    <td width="17%" class="row-p"><label>Payment Date</label></td>
                                    <td width="76%" class="row-p">: <span class="row-p1">26-MAY-2023 03:15 PM</span> </td>
                                </tr>
                                <tr>
                                    <td width="17%" class="row-p"><label>Owner Name</label></td>
                                    <td width="76%" class="row-p">: <span class="row-p1">SUKHVINDER</span> </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td colspan="3">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="">
                                <tbody><tr>
                                    <td width="15%" class="row-p"><label>Chassis No.</label></td>
                                    <td width="35%" class="row-p">: <span class="row-p1">154545</span> </td>
                                  <td width="15%" class="row-p"><label>Tax Mode</label></td>
                                    <td width="35%" class="row-p">: <span class="row-p1">DAYS</span></td>
                                </tr>
                                <tr>
                                    <td width="15%" class="row-p"><label>Vehilce Type</label></td>
                                    <td width="35%" class="row-p">: <span class="row-p1">CONTRACT CARRIAGE/PASSENGER   VEHICLES</span> </td>
                                  <td width="15%" class="row-p"><label>Vehicle Class</label></td>
                                    <td width="35%" class="row-p">: <span class="row-p1">MOTOR CAB</span></td>
                                </tr>
                                <tr>
                                    <td width="15%" class="row-p"><label>Mobile No.</label></td>
                                    <td width="35%" class="row-p">: <span class="row-p1">8168237259</span></td>
                                  <td width="15%" class="row-p"><label>Checkpost Name</label></td>
                                    <td width="35%" class="row-p">: <span class="row-p1">AMBALA</span> </td>
                                </tr>
                                <tr>
                                    <td width="15%" class="row-p"><label>Sleeper Cap.</label></td>
                                    <td width="35%" class="row-p">: 0 </td>
                                    
                                    <td width="15%" class="row-p"><label>
                                            Seat Cap(Ex. Driver)
                                        </label></td>
                                    <td width="35%" class="row-p">: 4
                                        . </td>
                                                                    </tr>
                                <tr>
                                    <td width="15%" class="row-p"><label>Bank Ref. No.</label></td>
                                    <td width="35%" class="row-p">: IK5333319</td>
                                  <td width="15%" class="row-p"><label>Payment Mode</label></td>
                                    <td width="35%" class="row-p">: ONLINE</td>
                                </tr>
                                <tr>
                                    <td width="15%" class="row-p"><label>Service Type</label></td>
                                    <td width="35%" class="row-p">: NOT APPLICABLE</td>
                                    <td width="15%" class="row-p"><label></label></td>
                                    <td width="35%" class="row-p"></td>
                                </tr>

                                <tr>
                                    <td width="15%" class="row-p"></td>
                                    <td width="35%" class="row-p"> </td>
                                    <td width="15%" class="row-p"></td>
                                    <td width="35%" class="row-p"></td>
                                </tr>
                                <tr>
                                    <td width="15%" class="row-p"></td>
                                    <td width="35%" class="row-p"> </td>
                                    <td width="15%" class="row-p"></td>
                                    <td width="35%" class="row-p"></td>
                                </tr>
                                <tr>
                                    <td width="15%" class="row-p"><label>Permit Type</label></td>
                                    <td width="35%" class="row-p">: <span class="row-p1"></span> </td>
                                    <td width="15%" class="row-p"></td>
                                    <td width="35%" class="row-p"></td>
                                </tr>
                                <tr>
                                    <td width="15%" class="row-p"></td>
                                    <td width="35%" class="row-p"></td>
                                    <td width="15%" class="row-p"></td>
                                    <td width="35%" class="row-p"></td>
                                </tr>

                            </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="row-p">
                            <div>
                                <div class="ui-grid-responsive" >
                                    <table width="99%" border="0" cellspacing="0" style="border-top: 1px #000 solid;border-bottom: 1px #000 solid;border-left: none; border-right: none;" cellpadding="0">
                                        <tbody><tr>
                                            <td width="64%" style="font-weight:bold;">Particular</td>
                                            <td width="12%" style="font-weight:bold;">Fees/Tax</td>
                                            <td width="12%" style="font-weight:bold;">Fine</td>
                                            <td width="12%" style="font-weight:bold;">Total</td>
                                        </tr>
                                    </tbody></table><div id="j_idt105" class="ui-datalist ui-widget">
                                        <div id="j_idt105_content" class="ui-datalist-content ui-widget-content" style="background: none !important">
                                            <ul id="j_idt105_list" class="ui-datalist-data" >
                                                <li class="ui-datalist-item">
                                        <table width="99%" border="1" cellspacing="0" style="border-top: none;border-bottom: 1px #000 solid;border-left: none; border-right: none; background:" cellpadding="0">
                                            <tbody><tr>
                                                <td width="64%">MV Tax( 26-MAY-2023 03:15 PM TO
                                                    27-MAY-2023 03:15 PM )</td>
                                              <td width="12%" style="align: right;">100</td>
                                              <td width="12%" style="align: right;">0</td>
                                                <td width="12%" style="align: right;">100</td>
                                            </tr>
                                        </tbody></table></li></ul></div></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td colspan="3"><span style="font-weight: bold;">Grand Total : </span>&#8377; 100</span>/- ( <span
                            style="text-transform:uppercase;">ONE HUNDRED 
                            ONLY</span>)
                      </td>
                    </tr>
                    <tr valign="top">
                        <td colspan="3"><span style="font-style: italic;">Note : 1) This is a computer generated printout and no signature is required.</span><br><span style="font-style: italic;">2) Incorrect  mentioning of vehicle class or seating capacity may lead to tax evasion and defaulter shall be liable for penal action.</span><br><span style="font-style: italic;">For any Payment / Refund related issues please contact to concerned Check Post Terminal.</span><span style="font-style: italic;"><br>You will also receive the payment confirmation message.</span>
                        </td>
                    </tr>
                </tbody></table>
                <div style="float: right;">
                </div>
            </div>
        </div><input type="hidden" name="javax.faces.ViewState" id="j_id1:javax.faces.ViewState:0"
            value="-3810988453043415378:-5599655139029637065" autocomplete="off">
    </form>
    <div id="textarea_simulator" style="position: absolute; top: 0px; left: 0px; visibility: hidden;"></div>
</body>
</html>
<?php
}
else {
    echo "Error inserting record: " . mysqli_error($conn);
}
// Close the database conn
mysqli_close($conn);
}else{
    echo "Please submit form carefully.";
}
?>