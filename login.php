<?php
include_once('./includes/header.php');
include_once('./includes/connection.php');

// Check if the table exists
$tableName = 'users';

//$query = "DROP TABLE IF EXISTS $tableName";
//$result = mysqli_query($conn, $query);

$query = "SHOW TABLES LIKE '$tableName'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    // Table doesn't exist, create it
    $createQuery = "CREATE TABLE $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255),
        email VARCHAR(255),
        password VARCHAR(255),
        status VARCHAR(30) DEFAULT 'active',
        type VARCHAR(255) DEFAULT 'user',
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

if (isset($_POST) && isset($_POST['txtLogin'])) {
    $email = @$_POST['txtLogin'];
    $password = @$_POST['CaptchaID'];
    $query = "SELECT * FROM $tableName WHERE username = '$email' AND type='user' AND status='active' ";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        // User with the given email exists, check the password
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, user is authenticated
            $_SESSION['username'] = $row['username'];
            $_SESSION['login'] = true;
            $_SESSION['ID'] = $row['id'];
            @header("Location: /taxCollection.php");
            echo "<script> window.location.href='/taxCollection.php' </script>";
        } else {
            // Password is incorrect
            echo "Invalid password.";
        }
    } else {
        // User with the given email doesn't exist
        $login_err = "Login failed.";
        //echo "Error record: " . mysqli_error($conn);
    }
}
// Close the database connection
mysqli_close($conn);


?>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        noBack();
    });

    function noBack() {
        window.history.forward();
    }

    function changeHashOnLoad() {
        window.location.href += "#";
        setTimeout("changeHashAgain()", "50");
    }

    function changeHashAgain() {
        window.location.href += "1";
    }

    var storedHash = window.location.hash;
    window.setInterval(function() {
        if (window.location.hash != storedHash) {
            window.location.hash = storedHash;
        }
    }, 50);

    $(document).ready(function() {
        $('.no-copy-paste').on("cut copy paste", function(e) {
            e.preventDefault();
        });
    });
</script>
<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "fade",
            slideshowSpeed: 7000,
            animationSpeed: 800,
            controlNav: false,
            directionNav: false,
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
</head>

<form id="master_Layout_form" name="master_Layout_form" method="post" action="/login.php" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="master_Layout_form" value="master_Layout_form" />



    <div class="main_news_w2">
        <div class="news_w">
            <div data-direction="left" class="marquee-with-options">
                <marquee scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();" direction="left" behavior="alternate">
                    <font size="4" color="#ff0f0f">Select the service name carefully in case you select wrong service
                        and pay the fee/tax, amount will not be refunded or adjusted.</font>
                </marquee>
            </div>
        </div>
    </div>
    <div>
        <div id="popup" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container center-position">
            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title"></span></div>
            <div class="ui-dialog-content ui-widget-content" id="popup_content">
                <div id="j_idt50" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt51" name="j_idt51" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){mojarra.ab('j_idt51',event,'click',0,'loginPanel popup')},function(event){PrimeFaces.ab({s:&quot;j_idt51&quot;,f:&quot;master_Layout_form&quot;,onco:function(xhr,status,args){PF('dlg1').hide();;}});return false;}]);" type="submit"><span class="ui-button-text ui-c">Ok</span></button>
                <script id="j_idt51_s" type="text/javascript">
                    $(function() {
                        PrimeFaces.cw("CommandButton", "widget_j_idt51", {
                            id: "j_idt51",
                            behaviors: {
                                click: function(ext, event) {
                                    mojarra.ab('j_idt51', event, 'click', 0, 'loginPanel popup', {
                                        'CLIENT_BEHAVIOR_RENDERING_MODE': 'UNOBSTRUSIVE'
                                    })
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
        <script id="popup_s" type="text/javascript">
            $(function() {
                PrimeFaces.cw("Dialog", "dlg1", {
                    id: "popup",
                    draggable: false,
                    modal: true
                });
            });
        </script>
        <div id="j_idt52" class="ui-confirm-dialog ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container">
            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="j_idt52_title" class="ui-dialog-title"></span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div>
            <div class="ui-dialog-content ui-widget-content" id="j_idt52_content"><span class="ui-icon ui-confirm-dialog-severity"></span><span class="ui-confirm-dialog-message"></span>
            </div>
            <div class="ui-dialog-buttonpane ui-dialog-footer ui-widget-content ui-helper-clearfix"><button id="j_idt53" name="j_idt53" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left ui-confirmdialog-yes" type="button"><span class="ui-button-icon-left ui-icon ui-c ui-icon-check"></span><span class="ui-button-text ui-c">Yes</span></button>
                <script id="j_idt53_s" type="text/javascript">
                    $(function() {
                        PrimeFaces.cw("CommandButton", "widget_j_idt53", {
                            id: "j_idt53"
                        });
                    });
                </script><button id="j_idt55" name="j_idt55" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left ui-confirmdialog-no" type="button"><span class="ui-button-icon-left ui-icon ui-c ui-icon-close"></span><span class="ui-button-text ui-c">No</span></button>
                <script id="j_idt55_s" type="text/javascript">
                    $(function() {
                        PrimeFaces.cw("CommandButton", "widget_j_idt55", {
                            id: "j_idt55"
                        });
                    });
                </script>
            </div>
        </div>
        <script id="j_idt52_s" type="text/javascript">
            $(function() {
                PrimeFaces.cw("ConfirmDialog", "widget_j_idt52", {
                    id: "j_idt52",
                    showEffect: "fade",
                    hideEffect: "explode",
                    global: true
                });
            });
        </script>
        <div data-direction="left" class="marquee-with-fast-options">
            <div id="j_idt57" class="ui-outputpanel ui-widget">
                <div class="red h4"></div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container1">
                <div id="main">
                    <div class="ui-grid-row center-position" id="skip-main-content">
                        <div class="ui-grid-col-12"><img src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/NewImage.gif?ln=images" />
                            <font style="color:#FF0000!important;font-size:15pt!important;">Other state Temporary Permit
                                for all CHECKPOST of Tamil Nadu enabled.Kindly use the facility. Checkpost module was
                                inaugurated by Hon. Transport Minister,Kerala at Walayar Checkpost today 21 Oct,2022.
                            </font>
                        </div>
                    </div>
                    <div class="ui-grid-row center-position" id="skip-main-content">
                        <div class="ui-grid-col-12 ">
                            <h1 class="header-main ">The Solution for Vehicle Tax Collection at Checkpost</h1>
                        </div>
                    </div>
                    <!--                    &lt;p:outputPanel rendered="# {!loginBean.allowConn}"&gt;
                        &lt;div class="ui-grid-row"&gt;
                            &lt;div class="ui-grid-col-12 center-position"&gt;
                                &lt;div class="red h1 bottom-space"&gt;VAHAN Service Portal is down for Maintenance.&lt;/div&gt;
                                &lt;div class=" red h3"&gt;Please try after some time.123&lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/p:outputPanel&gt;-->
                    <div class="ui-grid-row ui-grid-responsive">
                        <div class="ui-grid-col-3">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-11">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading "><span class="glyphicon glyphicon-th-list"></span>Important information...
                                        </div>
                                        <div class="panel-body">
                                            <div class="news_h">
                                                <ul class="demo2">
                                                    <li class="news-item">Process to pay other state road tax of single
                                                        vehicle..<br /><a id="j_idt62" href="#" class="ui-commandlink ui-widget" onclick="PF('process1').show();;PrimeFaces.ab({s:&quot;j_idt62&quot;,f:&quot;master_Layout_form&quot;});return false;">Read
                                                            more...</a></li>
                                                    <li class="news-item">Process to check your pending transaction of
                                                        single vehicle..<br /><a id="j_idt65" href="#" class="ui-commandlink ui-widget" onclick="PF('process2').show();;PrimeFaces.ab({s:&quot;j_idt65&quot;,f:&quot;master_Layout_form&quot;});return false;">Read
                                                            more...</a></li>

                                                    <li class="news-item">Process to recheck the fail transaction of
                                                        single vehicle..<br /><a id="j_idt68" href="#" class="ui-commandlink ui-widget" onclick="PF('process3').show();;PrimeFaces.ab({s:&quot;j_idt68&quot;,f:&quot;master_Layout_form&quot;});return false;">Read
                                                            more...</a></li>
                                                    <li class="news-item">Process to signup for tax payment of more then
                                                        one vehicle in single transaction..<br /><a id="j_idt71" href="#" class="ui-commandlink ui-widget" onclick="PF('process4').show();;PrimeFaces.ab({s:&quot;j_idt71&quot;,f:&quot;master_Layout_form&quot;});return false;">Read
                                                            more...</a></li>
                                                    <li class="news-item">Process to pay other state road tax of more
                                                        then one vehicle..<br /><a id="j_idt74" href="#" class="ui-commandlink ui-widget" onclick="PF('process5').show();;PrimeFaces.ab({s:&quot;j_idt74&quot;,f:&quot;master_Layout_form&quot;});return false;">Read
                                                            more...</a></li>
                                                    <li class="news-item">Process to Generate Memo and pay fee of
                                                        ODC..<br /><a id="j_idt77" href="#" class="ui-commandlink ui-widget" onclick="PF('process6').show();;PrimeFaces.ab({s:&quot;j_idt77&quot;,f:&quot;master_Layout_form&quot;});return false;">Read
                                                            more...</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-grid-col-5 left-rbox scrollbar">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12">
                                    <p>
                                        <span>CHECKPOST</span>
                                        <font style="font-size: 11pt;"> portal is meant to be a common platform from
                                            where various checkpost services are provided to citizens, as and when they
                                            are developed by the department. These services are being started for online
                                            checkpost tax payment of vehicles. The owners of these vehicles can access
                                            to the portal from any internet access point, and deposit their due taxes
                                            through net banking facility. This system will save them the trouble of
                                            physically coming to the transport office, while the department will be able
                                            to collect their taxes in a cashless and seamless way.
                                            Once the user logs on to the system and provides the required information
                                            about the vehicle, the software calculates and displays the tax amount
                                            payable. If the user accepts to make the payment, the portal redirects him
                                            to selected bank or treasury site. The user then makes the payment from his
                                            bank account through secure Internet Banking. Once the transaction is
                                            complete, the software generates a detailed receipt, which can be printed by
                                            the user for his records. For checking the authenticity of receipt, the
                                            transport department officials will be able to cross-check the payment
                                            details by logging on to the portal using this web-based software. They can
                                            also view / print various reports which will be generated for officials of
                                            the transport department.</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="loginformid" class="ui-grid-col-4 ">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12  ">
                                    <div class="login-form text-center">
                                        <div class="heading-login">
                                            <h2>Authenticated Login</h2>
                                            <?php
                                            if (isset($login_err)) {
                                            ?>
                                                <p class="text-danger"><?= $login_err ?></p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span><input id="txtLogin" name="txtLogin" type="text" value="" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control no-copy-paste" autocomplete="off" maxlength="30" placeholder="User Name" />
                                                <script id="txtLogin_s" type="text/javascript">
                                                    $(function() {
                                                        PrimeFaces.cw("InputText", "widget_txtLogin", {
                                                            id: "txtLogin",
                                                            maxlength: 30
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <!--&lt;p:outputPanel id="otp_panel" rendered="# {loginBean.bool_rend_otp}"&gt;
                                            &lt;div class="form-group"&gt;
                                                &lt;div class="row"&gt;
                                                    &lt;div class="col-md-1"&gt;
                                                        &lt;span class="input-group-addon left-position"&gt;&lt;i class="glyphicon glyphicon-envelope"&gt;&lt;/i&gt;&lt;/span&gt;
                                                    &lt;/div&gt;
                                                    &lt;div class="col-md-6 left-position"&gt; 
                                                        &lt;p:password  maxlength="100" id="txtoTP" autocomplete="off" placeholder="OTP" value="# {loginBean.user_otp}" styleClass="form-control no-copy-paste" /&gt;
                                                    &lt;/div&gt;
                                                    &lt;div class="col-md-2 right-position otp-top" &gt;
                                                        &lt;p:commandButton id="txtotp" disabled="# {loginBean.bool_disable_otp_button}" icon="ui-icon-mail-open" update="otp_panel" action="# {loginBean.otp_button_actionListener}"  value="Resend OTP"/&gt;
                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;  
                                        &lt;/p:outputPanel&gt;-->
                                        <div id="captcha_panel" class="ui-outputpanel ui-widget">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-5 col-sm-12 left-position"><img id="captchaImage" src="https://checkpost.parivahan.gov.in/checkpost/DispplayCaptcha?txtp_cd=2&amp;bkgp_cd=2&amp;noise_cd=2&amp;gimp_cd=3&amp;txtp_length=5&amp;pfdrid_c=true527177114&amp;pfdrid_c=true" alt="" class=" captch-but" />
                                                    </div>
                                                    <div class="col-md-2 col-sm-12 center-position"><button id="j_idt89" name="j_idt89" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only vahan-captcha-refresh" onclick="PrimeFaces.ab({s:&quot;j_idt89&quot;,f:&quot;master_Layout_form&quot;,u:&quot;captchaImage&quot;});return false;" style="height: 30px;float: bottom;" type="submit"><span class="ui-button-icon-left ui-icon ui-c ui-icon-refresh"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                                        <script id="j_idt89_s" type="text/javascript">
                                                            $(function() {
                                                                PrimeFaces.cw("CommandButton", "widget_j_idt89", {
                                                                    id: "j_idt89"
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 left-position">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span><input id="CaptchaID" name="CaptchaID" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control no-copy-paste" autocomplete="off" maxlength="10" placeholder="Input text shown in the above image" />
                                                            <script id="CaptchaID_s" type="text/javascript">
                                                                $(function() {
                                                                    PrimeFaces.cw("InputText", "widget_CaptchaID", {
                                                                        id: "CaptchaID",
                                                                        maxlength: 10
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ui-grid-row">
                                                <div class="ui-grid-col-12 center-position"><button id="btnisValidate" name="btnisValidate" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left btn btn-primary btn-block btn-login" onclick="PrimeFaces.ab({s:&quot;btnisValidate&quot;,f:&quot;master_Layout_form&quot;,u:&quot;password_panel otp_panel popup captcha_panel&quot;,onst:function(cfg){PF('masterLayoutHomeVar').show();;},onsu:function(data,status,xhr){PF('masterLayoutHomeVar').hide();;}});return false;" type="submit" onkeypress="if (event.keyCode == 13)                                                                 this.submit();"><span class="ui-button-icon-left ui-icon ui-c ui-icon-unlocked"></span><span class="ui-button-text ui-c">Submit</span></button>
                                                    <script id="btnisValidate_s" type="text/javascript">
                                                        $(function() {
                                                            PrimeFaces.cw("CommandButton", "widget_btnisValidate", {
                                                                id: "btnisValidate"
                                                            });
                                                        });
                                                    </script><button id="btnrefresh" name="btnrefresh" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left btn btn-primary btn-block " onclick="PrimeFaces.ab({s:&quot;btnrefresh&quot;,f:&quot;master_Layout_form&quot;,u:&quot;password_panel otp_panel popup captcha_panel&quot;,onst:function(cfg){PF('masterLayoutHomeVar').show();;},onsu:function(data,status,xhr){PF('masterLayoutHomeVar').hide();;}});return false;" type="submit" onkeypress="if (event.keyCode == 13)                                                                 this.submit();"><span class="ui-button-icon-left ui-icon ui-c ui-icon-refresh"></span><span class="ui-button-text ui-c">Reset</span></button>
                                                    <script id="btnrefresh_s" type="text/javascript">
                                                        $(function() {
                                                            PrimeFaces.cw("CommandButton", "widget_btnrefresh", {
                                                                id: "btnrefresh"
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="float: left;margin-bottom: 10px;">Don't have an account ! <a id="j_idt94" href="#" class="ui-commandlink ui-widget" aria-label="Register for payment of multiple vehilces in single cart." onclick="PrimeFaces.ab({s:&quot;j_idt94&quot;,f:&quot;master_Layout_form&quot;});return false;" style="color:#007acc;text-decoration: underline;font-weight: bold;" title="Register for payment of multiple vehilces in single cart.">Sign
                                                up</a> here</div>
                                        <div style="float: right;margin-bottom: 10px;margin-right: 70px;"><a href="/checkpost/faces/admin/pages/ForgetPassword.xhtml" style="color:#007acc;text-decoration: underline;font-weight: bold;">Forget
                                                Password</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="bot-underline"></div>
                <div class="container-fluid">
                    <div class="container1">
                        <div class="row">
                            <div class="col-md-11 col-lg-11 col-sm-11 center-position ">
                                <ul class="ch-grid">
                                    <li>
                                        <div class="ch-item ch-img-1">
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-1"></div>
                                                    <div class="ch-info-back"><a href="/checkpost/faces/public/payment/TaxCollection.xhtml">
                                                            <h3>Tax Payment</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="ch-item ch-img-3">
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-3"></div>
                                                    <div class="ch-info-back"><a href="/checkpost/faces/public/reports/PaymentReceipt.xhtml">
                                                            <h3>Print Payment Receipt</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ch-item ch-img-2">
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-2"></div>
                                                    <div class="ch-info-back"><a href="/checkpost/faces/public/payment/ChecklTransactionStatus.xhtml">
                                                            <h3>Check Pending Transaction</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ch-item ch-img-4">
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-4"></div>
                                                    <div class="ch-info-back"><a href="/checkpost/faces/public/reports/CheckReceiptDetails.xhtml">
                                                            <h3>Check Receipt Details</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ch-item ch-img-5">
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-5"></div>
                                                    <div class="ch-info-back"><a href="/checkpost/faces/public/payment/ReverifyTransaction.xhtml">
                                                            <h3>Reverify Failed Transaction</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-grid-row">
            <div class="ui-grid-col-12">
                <div id="footer_view">
                    <html xmlns="http://www.w3.org/1999/xhtml">

                    <head id="j_idt115">
                        <link type="text/css" rel="stylesheet" href="/checkpost/faces/javax.faces.resource/theme.css?ln=primefaces-checkposttheme" />
                        <link type="text/css" rel="stylesheet" href="/checkpost/faces/javax.faces.resource/fa/font-awesome.css?ln=primefaces&amp;v=7.0" />
                        <script type="text/javascript">
                            if (window.PrimeFaces) {
                                PrimeFaces.settings.locale = 'en_US';
                                PrimeFaces.settings.projectStage = 'Development';
                            }
                        </script>
                    </head>

                    <body>
                        <div class="footer-news-bg top-space">
                            <div class="news_w">
                                <div data-direction="left" class="marquee-with-options">
                                    <marquee scrollamount="2" speed="10" onmouseover="this.stop();" onmouseout="this.start();" direction="left" behavior="alternate">
                                        Please pay tax in advance to avoid any last minute hassle.
                                    </marquee>
                                </div>
                            </div>
                        </div>
                        <div class="ui-grid ui-grid-responsive vahan-footer-section">
                            <div class="ui-grid-row ">
                                <div class="ui-grid-col-10 ">
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-12 center-position footer-t">
                                            Powered by National Informatics Centre. All Rights Reserved.
                                        </div>
                                    </div>
                                </div>
                                <div class="ui-grid-col-2">
                                    <div class="ui-grid-row  left-position ">
                                        <div class="ui-grid-col-12  "><img id="j_idt118" src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/nic-logo.png?ln=images" alt="Parivahan Sewa" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>

                    </html>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/checkpost/faces/javax.faces.resource/jquery.bootstrap.newsbox.min.js?ln=side-js"></script>
        <script type="text/javascript">
            $(function() {
                $(".demo2").bootstrapNews({
                    newsPerPage: 5,
                    autoplay: true,
                    pauseOnHover: true,
                    navigation: false,
                    direction: 'down',
                    newsTickerInterval: 2500,
                    onToDo: function() {
                        //console.log(this);
                    }
                });
            });
        </script>
        <div id="payment_dialog1" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;">
            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog1_title" class="ui-dialog-title">Process of paying road tax for other
                    state...</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div>
            <div class="ui-dialog-content ui-widget-content" id="payment_dialog1_content">
                <ol>
                    <li> Select the <font class="dialog-highlight-text">'Tax Payment'</font> from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.</li><br />
                    <li> Select the state where you want to go from <font class="dialog-highlight-text">'Select State'
                        </font> drop down menu.</li><br />
                    <li> Select service name from <font class="dialog-highlight-text">'Service Name'</font> drop down
                        menu.</li><br />
                    <li> Click <font class="dialog-highlight-text">'Go'</font> button to open the vehicle details form.
                    </li><br />
                    <li> Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li><br />
                    <li> Fill rest of the fields which are not filled automatically.</li><br />
                    <li> In case fields are not filled automatically then enter the details manually.</li><br />
                    <li> Click <font class="dialog-highlight-text">'Calculate Tax'</font> button to calculate the tax
                        according to state notification.</li><br />
                    <li> Click <font class="dialog-highlight-text">'Pay Tax'</font> button to pay the calculated tax.
                    </li><br />
                    <li> It opens the payment gateway of VAHAN.</li><br />
                    <li> Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font>
                        button.</li><br />
                    <li> And then follow the screen to pay tax.</li><br />
                    <li> After paying tax bank will redirect to the Checkpost application.</li><br />
                    <li> In case your transaction is Success it will show the successful receipt.</li><br />
                    <li> In case your transaction is Fail it will show the failure message. Now you can again initiate
                        the payment.</li><br />
                    <li> Print the receipt.</li>
                </ol>
                <div class="ui-grid-row top-space bottom-space">
                    <div class="ui-grid-col-12 center-position"><button id="j_idt125" name="j_idt125" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process1').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt125&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button>
                        <script id="j_idt125_s" type="text/javascript">
                            $(function() {
                                PrimeFaces.cw("CommandButton", "widget_j_idt125", {
                                    id: "j_idt125"
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <script id="payment_dialog1_s" type="text/javascript">
            $(function() {
                PrimeFaces.cw("Dialog", "process1", {
                    id: "payment_dialog1",
                    resizable: false,
                    modal: true,
                    width: "600",
                    height: "500",
                    closeOnEscape: true
                });
            });
        </script>
        <div id="payment_dialog2" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;">
            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog2_title" class="ui-dialog-title">Process to check your pending transaction of
                    single vehicle..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div>
            <div class="ui-dialog-content ui-widget-content" id="payment_dialog2_content">
                <ol>
                    <li> Select the <font class="dialog-highlight-text">'Check Pending Transaction'</font> from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.</li><br />
                    <li> It will show <font class="dialog-highlight-text">'Check Pending Transaction'</font> screen.
                    </li><br />
                    <li> Enter Vehicle No. and click <font class="dialog-highlight-text">'Get Details'</font> button to
                        fill the details.</li><br />
                    <li> Click the button available in <font class="dialog-highlight-text">'Check Status'</font> column
                        of below table.</li><br />
                    <li> It will print the receipt according to the status sent by bank.</li><br />
                    <li> In case your transaction is Success it will show the successful receipt.</li><br />
                    <li> In case your transaction is Fail it will show the failure message. Now you can again initiate
                        the payment.</li>
                </ol>
                <div class="ui-grid-row top-space bottom-space">
                    <div class="ui-grid-col-12 center-position"><button id="j_idt128" name="j_idt128" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process2').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt128&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button>
                        <script id="j_idt128_s" type="text/javascript">
                            $(function() {
                                PrimeFaces.cw("CommandButton", "widget_j_idt128", {
                                    id: "j_idt128"
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <script id="payment_dialog2_s" type="text/javascript">
            $(function() {
                PrimeFaces.cw("Dialog", "process2", {
                    id: "payment_dialog2",
                    resizable: false,
                    modal: true,
                    width: "600",
                    height: "500",
                    closeOnEscape: true
                });
            });
        </script>
        <div id="payment_dialog3" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;">
            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog3_title" class="ui-dialog-title">Process to recheck the fail transaction of single
                    vehicle..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div>
            <div class="ui-dialog-content ui-widget-content" id="payment_dialog3_content">
                <ol>
                    <li> Select the <font class="dialog-highlight-text">'Reverify Fail Transaction'</font> from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.</li><br />
                    <li> It will show <font class="dialog-highlight-text">'Reverify Fail Transaction'</font> screen.
                    </li><br />
                    <li> Choose desired state from <font class="dialog-highlight-text">'From State Name'</font> combo
                        box for which you have done the payment.</li><br />
                    <li> Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details of the
                        vehicle.</li><br />
                    <li> Choose the correct <font class="dialog-highlight-text">'Payment id'</font> click the button
                        available in <font class="dialog-highlight-text">'Reverify'</font> column of below table.</li>
                    <br />
                    <li> It will print the receipt according to the status sent by bank.</li><br />
                    <li> In case your transaction is Success it will show the successful receipt.</li><br />
                    <li> In case your transaction is Fail it will show the failure message. Now you can again initiate
                        the payment.</li>
                </ol>
                <div class="ui-grid-row top-space bottom-space">
                    <div class="ui-grid-col-12 center-position"><button id="j_idt131" name="j_idt131" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process3').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt131&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button>
                        <script id="j_idt131_s" type="text/javascript">
                            $(function() {
                                PrimeFaces.cw("CommandButton", "widget_j_idt131", {
                                    id: "j_idt131"
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <script id="payment_dialog3_s" type="text/javascript">
            $(function() {
                PrimeFaces.cw("Dialog", "process3", {
                    id: "payment_dialog3",
                    resizable: false,
                    modal: true,
                    width: "600",
                    height: "500",
                    closeOnEscape: true
                });
            });
        </script>
        <div id="payment_dialog4" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;">
            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog4_title" class="ui-dialog-title">Process to signup for tax payment of more then
                    one vehicle in single transaction..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div>
            <div class="ui-dialog-content ui-widget-content" id="payment_dialog4_content">
                <ol>
                    <li> Click link shown in login box as <font class="dialog-highlight-text">'Signup here'</font>
                    </li><br />
                    <li> It will open User Registration form to create user.</li><br />
                    <li> Select state name where you belongs to.</li><br />
                    <li> Enter desired <font class="dialog-highlight-text">'User id.'</font>
                    </li><br />
                    <li> Fill all data with correct <font class="dialog-highlight-text">'Mobile No.'</font> to get OTP,
                        without OTP you are unable to register.</li><br />
                    <li> Click on <font class="dialog-highlight-text">'Generate OTP'</font> button to get OTP on mobile.
                    </li><br />
                    <li> Enter <font class="dialog-highlight-text">'OTP'</font> and desired <font class="dialog-highlight-text">'Password'</font>.</li><br />
                    <li> Enter captcha shown on the box.</li><br />
                    <li> Click <font class="dialog-highlight-text">'Save'</font> button to create user id.</li><br />
                    <li> It will open message box that shows <font class="dialog-highlight-text">'User ID'</font>.</li>
                    <br />
                    <li> Please note down your <font class="dialog-highlight-text">'User ID'</font> to login.</li><br />
                </ol>
                <div class="ui-grid-row top-space bottom-space">
                    <div class="ui-grid-col-12 center-position"><button id="j_idt134" name="j_idt134" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process4').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt134&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button>
                        <script id="j_idt134_s" type="text/javascript">
                            $(function() {
                                PrimeFaces.cw("CommandButton", "widget_j_idt134", {
                                    id: "j_idt134"
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <script id="payment_dialog4_s" type="text/javascript">
            $(function() {
                PrimeFaces.cw("Dialog", "process4", {
                    id: "payment_dialog4",
                    resizable: false,
                    modal: true,
                    width: "600",
                    height: "500",
                    closeOnEscape: true
                });
            });
        </script>
        <div id="payment_dialog5" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;">
            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog5_title" class="ui-dialog-title">Process to pay other state road tax of more then
                    one vehicle..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div>
            <div class="ui-dialog-content ui-widget-content" id="payment_dialog5_content">
                <ol>
                    <li> Enter <font class="dialog-highlight-text">'User ID'</font> and <font class="dialog-highlight-text">'Password'</font> generated with <font class="dialog-highlight-text">'Signup here'</font> link.</li><br />
                    <li> Enter captcha as shown in the image.</li><br />
                    <li> Select the <font class="dialog-highlight-text">'Tax Payment'</font> from <font class="dialog-highlight-text">'Select Menu'</font> drop down menu.</li><br />
                    <li> Select service Name from <font class="dialog-highlight-text">'Service Name'</font> drop down
                        menu.</li><br />
                    <li> Click <font class="dialog-highlight-text">'Go'</font> button to open the vehicle details form.
                    </li><br />
                    <li> Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li><br />
                    <li> Fill rest of the fields which are not filled automatically.</li><br />
                    <li> In case fields are not filled automatically then enter the details manually.</li><br />
                    <li> Click on <font class="dialog-highlight-text">'Calculate Tax'</font> button to calculate the tax
                        according to state notification.</li><br />
                    <li> Click on <font class="dialog-highlight-text">'Add to Cart'</font> button.</li><br />
                    <li> If you want to pay tax for more than one vehicle follow the steps from 6 to 10.</li><br />
                    <li> If you have added all the vehicles(for which you want to make payment) to the cart then click
                        on <font class="dialog-highlight-text">'Pay Tax'</font> button to pay tax.</li><br />
                    <li> It opens the payment gateway of VAHAN.</li><br />
                    <li> Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font>
                        button.</li><br />
                    <li> And then follow the screen to pay tax.</li><br />
                    <li> After paying tax bank will redirect to the Checkpost application.</li><br />
                    <li> In case your transaction is Success it will show the successful receipt.</li><br />
                    <li> In case your transaction is Fail it will show the failure message. Now you can again initiate
                        the payment.</li><br />
                    <li> Print the receipt.</li>
                </ol>
                <div class="ui-grid-row top-space bottom-space">
                    <div class="ui-grid-col-12 center-position"><button id="j_idt137" name="j_idt137" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process5').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt137&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button>
                        <script id="j_idt137_s" type="text/javascript">
                            $(function() {
                                PrimeFaces.cw("CommandButton", "widget_j_idt137", {
                                    id: "j_idt137"
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <script id="payment_dialog5_s" type="text/javascript">
            $(function() {
                PrimeFaces.cw("Dialog", "process5", {
                    id: "payment_dialog5",
                    resizable: false,
                    modal: true,
                    width: "600",
                    height: "500",
                    closeOnEscape: true
                });
            });
        </script>
        <div id="payment_dialog6" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;">
            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog6_title" class="ui-dialog-title">Process to Generate Memo and pay fee of
                    ODC..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div>
            <div class="ui-dialog-content ui-widget-content" id="payment_dialog6_content">
                <ol>
                    <li>Select the <font class="dialog-highlight-text">'Tax Payment'</font> from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.</li>
                    <li>Select the state where you want to go from 'Select State' drop down menu.</li>
                    <li>Select service name from <font class="dialog-highlight-text">'Service Name'</font> as <font class="dialog-highlight-text">'ADVANCE PAYMENT OF ODC EXEMPTION FEE'</font> from drop down
                        menu.</li>
                    <li>Click <font class="dialog-highlight-text">'Go'</font> button to open the vehicle details form.
                    </li>
                    <li>Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li>
                    <!--                &lt;li&gt;Fill rest of the fields which are not filled automatically.&lt;/li&gt;-->
                    <li>In case fields are not filled automatically then enter the details manually.</li>
                    <li>In case nature of goods of your vehicle is <font class="dialog-highlight-text">'INDIVISIBLE'
                        </font> then first generate memo. And you have two options.
                        <ol>
                            <li type="A">You can pay the fee at the same time by clicking on <font class="dialog-highlight-text">'Pay Fee'</font> button.
                                <ol>
                                    <li type="i">It opens the payment gateway of <font class="dialog-highlight-text">
                                            VAHAN</font>.</li>
                                    <li type="i">Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font> button.</li>
                                    <li type="i">And then follow the screen to Pay Fee.</li>
                                    <li type="i">After paying fee bank will redirect to the Checkpost application.</li>
                                    <li type="i">In case your transaction is <font class="dialog-highlight-text">Success
                                        </font> it will show the successful receipt.</li>
                                    <li type="i">In case your transaction is <font class="dialog-highlight-text">Fail
                                        </font> it will show the failure message. Now you can again initiate the
                                        payment.</li>
                                    <li type="i">Print the Memo receipt.</li>
                                    <li type="i">Print the Fees receipt.</li>
                                </ol>
                            </li>
                            <li type="A">Or if you want to make payment later then note down your memo no and follow
                                below steps
                                <ol>
                                    <li type="i">Select the <font class="dialog-highlight-text">'Tax Payment'</font>
                                        from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.
                                    </li>
                                    <li type="i">Select the state where you want to go from <font class="dialog-highlight-text">'Select State'</font> drop down menu.</li>
                                    <li type="i">Select service name from <font class="dialog-highlight-text">'Service
                                            Name'</font> as <font class="dialog-highlight-text">'PAYMENT OF PENDING ODC
                                            EXEMPTION FEE'</font> from drop down menu.</li>
                                    <li type="i">Type the Memo no in text field.</li>
                                    <li type="i">Click <font class="dialog-highlight-text">'Get Details'</font> button
                                        to fill the details.</li>
                                    <li type="i">Click <font class="dialog-highlight-text">'Pay Fee'</font> button to
                                        pay the calculated Fee.</li>
                                    <li type="i">It opens the payment gateway of <font class="dialog-highlight-text">
                                            VAHAN</font>.</li>
                                    <li type="i">Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font> button.</li>
                                    <li type="i">And then follow the screen to Pay Fee.</li>
                                    <li type="i">After paying fee bank will redirect to the Checkpost application.</li>
                                    <li type="i">In case your transaction is <font class="dialog-highlight-text">Success
                                        </font> it will show the successful receipt.</li>
                                    <li type="i">In case your transaction is <font class="dialog-highlight-text">Fail
                                        </font> it will show the failure message. Now you can again initiate the
                                        payment.</li>
                                    <li type="i">Print the Fee receipt.</li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                </ol>
                <div class="ui-grid-row top-space bottom-space">
                    <div class="ui-grid-col-12 center-position"><button id="j_idt140" name="j_idt140" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process6').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt140&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button>
                        <script id="j_idt140_s" type="text/javascript">
                            $(function() {
                                PrimeFaces.cw("CommandButton", "widget_j_idt140", {
                                    id: "j_idt140"
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <script id="payment_dialog6_s" type="text/javascript">
            $(function() {
                PrimeFaces.cw("Dialog", "process6", {
                    id: "payment_dialog6",
                    resizable: false,
                    modal: true,
                    width: "600",
                    height: "500",
                    closeOnEscape: true
                });
            });
        </script>
    </div>
    <div id="j_idt143" class="ui-blockui-content ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow">
        <img id="j_idt144" src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/ajax_loader_blue.gif?ln=images" alt="" />
    </div>
    <script id="j_idt143_s" type="text/javascript">
        $(function() {
            PrimeFaces.cw("BlockUI", "masterLayoutVar", {
                id: "j_idt143",
                block: "master_Layout_form"
            });
        });
    </script><input type="hidden" name="javax.faces.ViewState" id="j_id1:javax.faces.ViewState:0" value="-743271855747581094:-4061995621272595198" autocomplete="off" />
</form>