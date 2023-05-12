<?php
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkpost ~1~85</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/layout.css">
</head>
<body>
    
<div class="container-fluid topbar-menu">
                <div class="mar-bot">
                    <div>
                        <div class="row">
                            <div class="col-md-6 left-position">
                                <div class="marquee marquee-top mar-common-f">
                                    <div>
                                        <span>Please pay tax in advance to avoid any last minute hassle.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 right-position top-pad-top">
                                <ul class="top-menu ">
                                    <li>
                                        <a href="https://checkpost.parivahan.gov.in/checkpost/" title="Home">
                                            <span class="glyphicon glyphicon-home"></span> Home 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#skip-main-content" title="skip-main-content">
                                            <span class="glyphicon glyphicon-arrow-down"></span> Skip main content
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#navbar" title="Skip to navigation">
                                            <span class="glyphicon glyphicon-arrow-down"></span> Skip navigation
                                        </a>
                                    </li>
                                    <li><a href="#" title="A+">A<sup>+</sup></a></li>
                                    <li><a href="#" title="A">A</a></li>
                                    <li><a href="#" title="A-">A<sup>-</sup></a></li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default navigation-background hide-header" role="navigation">
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-2 left_logo">
                            <a class="top-space inline-section"><img id="j_idt14" src="/checkpost/faces/javax.faces.resource/checkpost-logo.png?ln=images" alt="Check Post Logo">
                            </a>
                        </div>
                        <div class="ui-grid-col-8">
                            <div class="heading_w center-position top-space"><img id="j_idt16" src="/checkpost/faces/javax.faces.resource/emblem-logo.png?ln=images" class="emblem-logo" alt="State Emblem of India">
                                <div class="font-bold text-welcome-heading welcome-heading-size text-uppercase">ministry of road transport and highways</div>
                                <div class="font-bold text-welcome-heading welcome-sub-heading-size">Government of India</div>
                            </div>
                        </div>
                        <div class="ui-grid-col-2 right_logo">
                            <a class="top-space inline-section"><img id="j_idt18" src="/checkpost/faces/javax.faces.resource/e-vahan-logo.png?ln=images" alt="e-Vahan Logo">
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <nav class=" navbar-default navigation-background" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navigation-background-nav" id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="/checkpost/faces/login.xhtml"> <span class="glyphicon glyphicon-home"></span> Home </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" rendered=""><span class="glyphicon glyphicon-user"></span> Border Tax Payment<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/checkpost/faces/public/payment/TaxCollection.xhtml"><span class="glyphicon glyphicon-arrow-right"></span> Tax Payment </a>
                                </li>
                                <li><a href="/checkpost/faces/public/payment/ChecklTransactionStatus.xhtml"><span class="glyphicon glyphicon-arrow-right"></span> Check Pending Transaction</a>
                                </li>
                                <li><a href="/checkpost/faces/public/payment/ReverifyTransaction.xhtml"><span class="glyphicon glyphicon-arrow-right"></span> Reverify Failed Transaction </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" rendered=""><span class="glyphicon glyphicon-print"></span> Reports<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/checkpost/faces/public/reports/PaymentReceipt.xhtml"><span class="glyphicon glyphicon-arrow-right"></span> Print Payment Receipt</a>
                                </li>
                                <li><a href="/checkpost/faces/public/reports/PermitReceiptPrinting.xhtml"><span class="glyphicon glyphicon-arrow-right"></span> Print Permit Receipt</a>
                                </li>
                                <li><a href="/checkpost/faces/public/reports/CheckReceiptDetails.xhtml"><span class="glyphicon glyphicon-arrow-right"></span> Check Receipt Details</a>
                                </li>
                            </ul>
                        </li>
                        <!--                        &lt;li&gt;
                                                    &lt;h:link value="" title="" outcome="/public/usermanuals/UserManuals.xhtml"&gt; &lt;span class="glyphicon glyphicon-eye-open"&gt;&lt;/span&gt; User Manuals&lt;/h:link&gt;
                                                &lt;/li&gt;-->
                        <!--                        &lt;li&gt;
                                                    &lt;h:link value="" title="" outcome="/public/contactus/Contactus.xhtml"&gt; &lt;span class="glyphicon glyphicon-phone-alt"&gt;&lt;/span&gt; Contact Us &lt;/h:link&gt;
                                                &lt;/li&gt;-->
                    </ul>
                </div>
            </nav>
            <div class="main_news_w">
                <div class="news_w">
                    <div data-direction="left" class="marquee-with-options">
                        <marquee scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();" direction="left" behavior="alternate">
                            Verify the validity of the receipt by sending sms <font color="#ff83dc">VAHAN &lt;STATE CODE&gt; CP &lt;VEHICLE NO&gt; </font> to 7738299899 (e.g. <font color="#ff83dc">VAHAN XX CP XXXXXXXXXX</font>)
                        </marquee>
                    </div>
                </div>
            </div>
