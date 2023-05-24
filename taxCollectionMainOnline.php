<?php
include_once('./includes/header.php');
include_once('./helpers/constant.php');
$json_states = file_get_contents('./assets/json/states.json');
$states = json_decode($json_states, true);
$states_reverse = array_flip($states);
$curState = $states_reverse[$_REQUEST['ib_state_input']];

$json_districts = file_get_contents('./assets/json/districts.json');
$districts = json_decode($json_districts, true);

?>

<script type="text/javascript">
    if (window.PrimeFaces) {
        PrimeFaces.settings.locale = 'en_US';
        PrimeFaces.settings.projectStage = 'Development';
    }

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
</script>
<form id="master_Layout_form" name="master_Layout_form" method="post" action="https://checkpost.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="selected_state" value="<?= $curState ?>" />
    <div>
        <div class="container-fluid">
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row top-space center-position contents-Space">
                    <h1 class="header-main"><label id="j_idt41" class="ui-outputlabel ui-widget header-main" style="color: #154281!important;font-weight: bold!important;">BORDER TAX PAYMENT FOR
                            ENTRY INTO</label><span class="red"> <?= $curState ?></span></h1>
                </div>
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12 center-position contents-Space">
                    </div>
                </div>
                <div class="ui-grid-row top-space">
                    <div class="ui-grid-col-1 resp-blank-height"></div>
                    <div class="ui-grid-col-10">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                        <div id="hrtaxcollection" class="ui-panel ui-widget ui-widget-content ui-corner-all bottom-space" data-widget="widget_hrtaxcollection">
                            <div id="hrtaxcollection_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Tax Payment Details</span></div>
                            <div id="hrtaxcollection_content" class="ui-panel-content ui-widget-content">
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt199" class="ui-outputlabel ui-widget field-label-mandate">Vehicle
                                                No.</label>
                                        </label><input id="j_idt201" name="vehicle_no" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" maxlength="10" onkeypress="return AlphaOnly(event, 'abcdefghijklmnopqrstuvwxyz0123456789');" onkeyup="makeCaps(this);" />
                                        <script id="j_idt201_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("InputText", "widget_j_idt201", {
                                                    id: "j_idt201",
                                                    maxlength: 10
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-6">
                                        <div class="ui-grid-row">
                                            <div class="ui-grid-col-12 top_mar1 mar-left5">
                                                <button id="j_idt203" name="j_idt203" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.ab({s:&quot;j_idt203&quot;,f:&quot;master_Layout_form&quot;,u:&quot;hrtaxcollection popup&quot;,onst:function(cfg){PF('masterLayoutVar').show();;},onsu:function(data,status,xhr){PF('masterLayoutVar').hide();;}});return false;" title="Click to get owner and vehicle details from Vahan 4." type="button">

                                                    <span class="ui-button-icon-left ui-icon ui-c ui-icon-arrowthick-1-s"></span><span class="ui-button-text ui-c">Get Details</span>

                                                </button>
                                                <script id="j_idt203_s" type="text/javascript">
                                                    $(function() {
                                                        PrimeFaces.cw("CommandButton", "widget_j_idt203", {
                                                            id: "j_idt203"
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt205" class="ui-outputlabel ui-widget field-label-mandate">Chassis
                                                No.</label>
                                        </label><input required id="j_idt207" name="chassis_no" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" aria-disabled="true" autocomplete="off" maxlength="30" onkeypress="return AlphaOnly(event, '*#.0123456789');" onkeyup="makeCaps(this);" />
                                        <script id="j_idt207_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("InputText", "widget_j_idt207", {
                                                    id: "j_idt207",
                                                    maxlength: 30
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt209" class="ui-outputlabel ui-widget field-label-mandate">Owner
                                                Name</label>
                                        </label><input required id="j_idt211" name="owner_name" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " aria-disabled="true" autocomplete="off" maxlength="50" onkeypress="return AlphaWithSpaceOnly(event, '. ');" onkeyup="makeCaps(this);" />
                                        <script id="j_idt211_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("InputText", "widget_j_idt211", {
                                                    id: "j_idt211",
                                                    maxlength: 50
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt213" class="ui-outputlabel ui-widget field-label-mandate">Mobile
                                                No.</label>
                                        </label><input required id="mobileno" name="mobileno" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" maxlength="10" placeholder="SMS about payment will be sent to this number." title="SMS about payment will be sent to this number." onkeypress="return NumericOnly(event, '');" />
                                        <script id="mobileno_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("InputText", "widget_mobileno", {
                                                    id: "mobileno",
                                                    maxlength: 10
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt216" class="ui-outputlabel ui-widget field-label-mandate">From
                                                State</label>
                                        </label>
                                        <div id="j_idt218" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false">
                                            <div class="ui-helper-hidden-accessible"><input required id="j_idt218_focus" name="j_idt218_focus" type="text" autocomplete="off" aria-expanded="false" /></div>
                                            <div class="ui-helper-hidden-accessible">
                                                <select required id="j_idt218_input" name="from_state" tabindex="-1" aria-hidden="true">
                                                    <option value="-1" data-escape="true">---Select State---
                                                    </option>

                                                    <?php
                                                    // Access the data
                                                    foreach ($states as $state => $code) {
                                                        echo '<option value="' . $code . '" data-escape="true">' . $state . '</option>';
                                                    }
                                                    ?>

                                                </select>
                                            </div><label id="j_idt218_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                            <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right">
                                                <span class="ui-icon ui-icon-triangle-1-s ui-c"></span>
                                            </div>
                                            <div id="j_idt218_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay">
                                                <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                                                    <ul id="j_idt218_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">

                                                        <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select State---" tabindex="-1" role="option">---Select State---</li>
                                                        <?php
                                                        // Access the data
                                                        foreach ($states as $state => $code) {

                                                            echo ' <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="' . $state . '" tabindex="-1" role="option">' . $state . '</li>';
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <script id="j_idt218_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("SelectOneMenu", "widget_j_idt218", {
                                                    id: "j_idt218",
                                                    appendTo: "@(body)"
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt222" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Permit Type</label>
                                        </label>
                                        <div id="j_idt224" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false">
                                            <div class="ui-helper-hidden-accessible"><input required id="j_idt224_focus" name="j_idt224_focus" type="text" autocomplete="off" aria-expanded="false" /></div>
                                            <div class="ui-helper-hidden-accessible">

                                                <select required id="j_idt224_input" name="vehicle_type" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;j_idt224&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;,u:&quot;hrtaxcollection&quot;});">
                                                    <option value="-1" data-escape="true">---Select Vehicle Type---
                                                    </option>
                                                    <?php
                                                    // Access the data
                                                    foreach ($VEHICLE_TYPE as $ind => $val) {
                                                        echo '<option value="' . $ind . '" data-escape="true">' . $val . '</option>';
                                                    }
                                                    ?>

                                                </select>
                                            </div><label id="j_idt224_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                            <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right">
                                                <span class="ui-icon ui-icon-triangle-1-s ui-c"></span>
                                            </div>
                                            <div id="j_idt224_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay">
                                                <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                                                    <ul id="j_idt224_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">
                                                        <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select Vehicle Type---" tabindex="-1" role="option">---Select Vehicle Type---</li>
                                                        <?php
                                                        // Access the data
                                                        foreach ($VEHICLE_TYPE as $ind => $val) {

                                                            echo ' <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="' . $val . '" tabindex="-1" role="option">' . $val . '</li>';
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <script id="j_idt224_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("SelectOneMenu", "widget_j_idt224", {
                                                    id: "j_idt224",
                                                    appendTo: "@(body)",
                                                    behaviors: {
                                                        change: function(ext, event) {
                                                            PrimeFaces.ab({
                                                                s: "j_idt224",
                                                                e: "change",
                                                                f: "master_Layout_form",
                                                                p: "hrtaxcollection",
                                                                u: "hrtaxcollection"
                                                            }, ext);
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt228" class="ui-outputlabel ui-widget field-label-mandate">Vehicle
                                                Class</label>
                                        </label>
                                        <div id="j_idt230" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false">
                                            <div class="ui-helper-hidden-accessible"></div>
                                            <div class="ui-helper-hidden-accessible">
                                                <select required id="j_idt230_input" name="vehicle_class" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;j_idt230&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;,u:&quot;hrtaxcollection&quot;});">
                                                    <option value="-1" data-escape="true">---Select Vehicle Class---
                                                    </option>
                                                    <?php
                                                    // Access the data
                                                    foreach ($VEHICLE_CLASS as $ind => $val) {
                                                        echo '<option value="' . $ind . '" data-escape="true">' . $val . '</option>';
                                                    }
                                                    ?>

                                                </select>
                                            </div><label id="j_idt230_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                            <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right">
                                                <span class="ui-icon ui-icon-triangle-1-s ui-c"></span>
                                            </div>
                                            <div id="j_idt230_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay">
                                                <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                                                    <ul id="j_idt230_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">
                                                        <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select Vehicle Class---" tabindex="-1" role="option">---Select Vehicle Class---</li>
                                                        <?php
                                                        // Access the data
                                                        foreach ($VEHICLE_CLASS as $ind => $val) {
                                                            echo ' <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="' . $val . '" tabindex="-1" role="option">' . $val . '</li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <script id="j_idt230_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("SelectOneMenu", "widget_j_idt230", {
                                                    id: "j_idt230",
                                                    appendTo: "@(body)",
                                                    behaviors: {
                                                        change: function(ext, event) {
                                                            PrimeFaces.ab({
                                                                s: "j_idt230",
                                                                e: "change",
                                                                f: "master_Layout_form",
                                                                p: "hrtaxcollection",
                                                                u: "hrtaxcollection"
                                                            }, ext);
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="lbl_seat_cap" class="ui-outputlabel ui-widget field-label-mandate">Seating
                                                Capacity (Excluding Driver)</label>
                                        </label><input required id="txt_seat_cap" name="seating_cap" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" maxlength="2" onkeypress="return NumericOnly(event, '');" />
                                        <script id="txt_seat_cap_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("InputText", "widget_txt_seat_cap", {
                                                    id: "txt_seat_cap",
                                                    maxlength: 2
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt236" class="ui-outputlabel ui-widget field-label-mandate">Service
                                                Type</label>
                                        </label>
                                        <div id="cmb_service_type" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false">
                                            <div class="ui-helper-hidden-accessible"><select required id="cmb_service_type_input" name="service_type" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;cmb_service_type&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;,u:&quot;hrtaxcollection&quot;});">
                                                    <option value="-1" data-escape="true">---Select Service Type---
                                                    </option>
                                                    <?php
                                                    // Access the data
                                                    foreach ($VEHICLE_SERVICE as $ind => $val) {
                                                        echo '<option value="' . $ind . '" data-escape="true">' . $val . '</option>';
                                                    }
                                                    ?>
                                                </select></div><label id="cmb_service_type_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                            <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right">
                                                <span class="ui-icon ui-icon-triangle-1-s ui-c"></span>
                                            </div>
                                            <div id="cmb_service_type_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay">
                                                <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                                                    <ul id="cmb_service_type_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">
                                                        <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select Service Type---" tabindex="-1" role="option">---Select Service Type---</li>
                                                        <?php
                                                        // Access the data
                                                        foreach ($VEHICLE_SERVICE as $ind => $val) {
                                                            echo ' <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="' . $val . '" tabindex="-1" role="option">' . $val . '</li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <script id="cmb_service_type_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("SelectOneMenu", "widget_cmb_service_type", {
                                                    id: "cmb_service_type",
                                                    appendTo: "@(body)",
                                                    behaviors: {
                                                        change: function(ext, event) {
                                                            PrimeFaces.ab({
                                                                s: "cmb_service_type",
                                                                e: "change",
                                                                f: "master_Layout_form",
                                                                p: "hrtaxcollection",
                                                                u: "hrtaxcollection"
                                                            }, ext);
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="lbl_distance" class="ui-outputlabel ui-widget">Distance(In KM)<font color=#FF0000>
                                                    *</font></label>
                                        </label><input required id="txt_distance" name="distance" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" maxlength="10" onkeypress="return NumericOnly(event, '');" />
                                        <script id="txt_distance_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("InputText", "widget_txt_distance", {
                                                    id: "txt_distance",
                                                    maxlength: 10
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt243" class="ui-outputlabel ui-widget field-label-mandate">Tax
                                                Mode</label>
                                        </label>
                                        <div id="cmb_payment_mode" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false">

                                            <div class="ui-helper-hidden-accessible"><select required id="cmb_payment_mode_input" name="tax_mode" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;cmb_payment_mode&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;,u:&quot;hrtaxcollection&quot;});">
                                                    <option value="-1" data-escape="true">---Select Payment Mode---
                                                    </option>
                                                    <?php
                                                    // Access the data
                                                    foreach ($PAYMENT_MODE as $ind => $val) {
                                                        echo '<option value="' . $ind . '" data-escape="true">' . $val . '</option>';
                                                    }
                                                    ?>
                                                </select></div><label id="cmb_payment_mode_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                            <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right">
                                                <span class="ui-icon ui-icon-triangle-1-s ui-c"></span>
                                            </div>
                                            <div id="cmb_payment_mode_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay">
                                                <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                                                    <ul id="cmb_payment_mode_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">
                                                        <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select Payment Mode---" tabindex="-1" role="option">---Select Payment Mode---</li>
                                                        <?php
                                                        // Access the data
                                                        foreach ($PAYMENT_MODE as $ind => $val) {
                                                            echo ' <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="' . $val . '" tabindex="-1" role="option">' . $val . '</li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <script id="cmb_payment_mode_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("SelectOneMenu", "widget_cmb_payment_mode", {
                                                    id: "cmb_payment_mode",
                                                    appendTo: "@(body)",
                                                    behaviors: {
                                                        change: function(ext, event) {
                                                            PrimeFaces.ab({
                                                                s: "cmb_payment_mode",
                                                                e: "change",
                                                                f: "master_Layout_form",
                                                                p: "hrtaxcollection",
                                                                u: "hrtaxcollection"
                                                            }, ext);
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt248" class="ui-outputlabel ui-widget field-label-mandate">Border/Barrier
                                                District through Entering</label>
                                        </label>
                                        <div id="j_idt250" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false">

                                            <div class="ui-helper-hidden-accessible"><select required id="j_idt250_input" name="barrier_district" tabindex="-1" aria-hidden="true">
                                                    <option value="-1" data-escape="true">---Select
                                                        District/Barrier---</option>
                                                    <?php
                                                    // Access the data
                                                    foreach ($districts[$curState] as $ind => $val) {
                                                        echo '<option value="' . $val . '" data-escape="true">' . $val . '</option>';
                                                    }
                                                    ?>

                                                </select></div><label id="j_idt250_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                            <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right">
                                                <span class="ui-icon ui-icon-triangle-1-s ui-c"></span>
                                            </div>
                                            <div id="j_idt250_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay">
                                                <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                                                    <ul id="j_idt250_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">
                                                        <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select District/Barrier---" tabindex="-1" role="option">---Select District/Barrier---</li>

                                                        <?php
                                                        // Access the data
                                                        foreach ($districts[$curState] as $ind => $val) {
                                                            echo ' <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="' . $val . '" tabindex="-1" role="option">' . $val . '</li>';
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <script id="j_idt250_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("SelectOneMenu", "widget_j_idt250", {
                                                    id: "j_idt250",
                                                    appendTo: "@(body)"
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-3">
                                        <label class="field-label resp-label-section"><label id="j_idt254" class="ui-outputlabel ui-widget field-label-mandate">Tax From
                                                Date</label>
                                        </label><span id="cal_tax_from" class="ui-calendar"><input required id="cal_tax_from_input" name="tax_from" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" autocomplete="off" placeholder="DD-MM-YYYY HH:mm" /></span>
                                        <script id="cal_tax_from_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("Calendar", "widget_cal_tax_from", {
                                                    id: "cal_tax_from",
                                                    popup: true,
                                                    locale: "en_US",
                                                    dateFormat: "dd\-mm\-yy HH:mm",
                                                    minDate: "19\-05\-2023 17:38",
                                                    timeOnly: false,
                                                    stepHour: 1,
                                                    stepMinute: 1,
                                                    stepSecond: 1,
                                                    hourMin: 0,
                                                    hourMax: 23,
                                                    minuteMin: 0,
                                                    minuteMax: 59,
                                                    secondMin: 0,
                                                    secondMax: 59,
                                                    timeInput: false,
                                                    controlType: "slider",
                                                    oneLine: false,
                                                    hour: 0,
                                                    minute: 0,
                                                    second: 0,
                                                    millisec: 0,
                                                    behaviors: {
                                                        dateSelect: function(ext, event) {
                                                            PrimeFaces.ab({
                                                                s: "cal_tax_from",
                                                                e: "dateSelect",
                                                                f: "master_Layout_form",
                                                                p: "hrtaxcollection",
                                                                u: "hrtaxcollection"
                                                            }, ext);
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-3">
                                        <label class="field-label resp-label-section"><label id="j_idt257" class="ui-outputlabel ui-widget field-label-mandate">Tax Upto
                                                Date</label>
                                        </label><span id="cal_tax_to" class="ui-calendar"><input required id="cal_tax_to_input" name="tax_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" autocomplete="off" placeholder="DD-MM-YYYY HH:mm" /></span>
                                        <script id="cal_tax_to_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("Calendar", "widget_cal_tax_to", {
                                                    id: "cal_tax_to",
                                                    popup: true,
                                                    locale: "en_US",
                                                    dateFormat: "dd\-mm\-yy HH:mm",
                                                    timeOnly: false,
                                                    stepHour: 1,
                                                    stepMinute: 1,
                                                    stepSecond: 1,
                                                    hourMin: 0,
                                                    hourMax: 23,
                                                    minuteMin: 0,
                                                    minuteMax: 59,
                                                    secondMin: 0,
                                                    secondMax: 59,
                                                    timeInput: false,
                                                    controlType: "slider",
                                                    oneLine: false,
                                                    hour: 0,
                                                    minute: 0,
                                                    second: 0,
                                                    millisec: 0,
                                                    behaviors: {
                                                        dateSelect: function(ext, event) {
                                                            PrimeFaces.ab({
                                                                s: "cal_tax_to",
                                                                e: "dateSelect",
                                                                f: "master_Layout_form",
                                                                p: "hrtaxcollection",
                                                                u: "hrtaxcollection"
                                                            }, ext);
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div><br />
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-3">
                                        <label class="field-label resp-label-section"><label id="j_idt243" class="ui-outputlabel ui-widget field-label-mandate"> Permit Type</label>
                                        </label>
                                        <div id="cmb_payment_mode2" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false">

                                            <div class="ui-helper-hidden-accessible"><select required id="cmb_payment_mode2_input" name="permit" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;cmb_payment_mode2&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;,u:&quot;hrtaxcollection&quot;});">
                                                    <option value="-1" data-escape="true">---Select Payment Mode---
                                                    </option>
                                                    <?php
                                                    // Access the data
                                                    foreach ($PERMIT_TYPE as $ind => $val) {
                                                        echo '<option value="' . $ind . '" data-escape="true">' . $val . '</option>';
                                                    }
                                                    ?>
                                                </select></div><label id="cmb_payment_mode2_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                            <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right">
                                                <span class="ui-icon ui-icon-triangle-1-s ui-c"></span>
                                            </div>
                                            <div id="cmb_payment_mode2_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay">
                                                <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                                                    <ul id="cmb_payment_mode2_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">
                                                        <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select Payment Mode---" tabindex="-1" role="option">---Select Permit Mode---</li>
                                                        <?php
                                                        // Access the data
                                                        foreach ($PERMIT_TYPE as $ind => $val) {
                                                            echo ' <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="' . $val . '" tabindex="-1" role="option">' . $val . '</li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <script id="cmb_payment_mode2_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("SelectOneMenu", "widget_cmb_payment_mode2", {
                                                    id: "cmb_payment_mode2",
                                                    appendTo: "@(body)",
                                                    behaviors: {
                                                        change: function(ext, event) {
                                                            PrimeFaces.ab({
                                                                s: "cmb_payment_mode2",
                                                                e: "change",
                                                                f: "master_Layout_form",
                                                                p: "hrtaxcollection",
                                                                u: "hrtaxcollection"
                                                            }, ext);
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-3">
                                        <label class="field-label resp-label-section"><label id="j_idt254" class="ui-outputlabel ui-widget field-label-mandate">Permit Upto</label>
                                        </label><span id="cal_tax_from2" class="ui-calendar"><input required id="cal_tax_from2_input" name="permit_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" autocomplete="off" placeholder="DD-MM-YYYY" /></span>
                                        <script id="cal_tax_from2_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("Calendar", "widget_cal_tax_from2", {
                                                    id: "cal_tax_from2",
                                                    popup: true,
                                                    locale: "en_US",
                                                    dateFormat: "dd\-mm\-yy",
                                                    minDate: "19\-05\-2023 ",
                                                    timeOnly: false,
                                                    stepHour: 1,
                                                    stepMinute: 1,
                                                    stepSecond: 1,
                                                    hourMin: 0,
                                                    hourMax: 23,
                                                    minuteMin: 0,
                                                    minuteMax: 59,
                                                    secondMin: 0,
                                                    secondMax: 59,
                                                    timeInput: false,
                                                    controlType: "slider",
                                                    oneLine: false,
                                                    hour: 0,
                                                    minute: 0,
                                                    second: 0,
                                                    millisec: 0,
                                                    behaviors: {
                                                        dateSelect: function(ext, event) {
                                                            PrimeFaces.ab({
                                                                s: "cal_tax_from2",
                                                                e: "dateSelect",
                                                                f: "master_Layout_form",
                                                                p: "hrtaxcollection",
                                                                u: "hrtaxcollection"
                                                            }, ext);
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt122" class="ui-outputlabel ui-widget">Permit No.</label>
                                        </label><input required id="j_idt124" name="permit_no" type="text" value="" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" onkeypress="return AlphaOnly(event, '*#.0123456789');" onkeyup="makeCaps(this);" role="textbox" aria-disabled="false" aria-readonly="false">
                                    </div>
                                </div><br />
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-12">
                                        <div id="taxList" class="ui-datatable ui-widget">
                                            <div class="ui-datatable-tablewrapper">
                                                <table role="grid" style="width:98%;">
                                                    <thead id="taxList_head">
                                                        <tr role="row">
                                                            <th id="taxList:j_idt260" class="ui-state-default" role="columnheader" aria-label="Sl. No." scope="col" style="width: 40px;"><span class="ui-column-title">Sl. No.</span></th>
                                                            <th id="taxList:j_idt262" class="ui-state-default" role="columnheader" aria-label="Particulars" scope="col"><span class="ui-column-title">Particulars</span></th>
                                                            <th id="taxList:j_idt264" class="ui-state-default" role="columnheader" aria-label="Tax From" scope="col"><span class="ui-column-title">Tax
                                                                    From</span></th>
                                                            <th id="taxList:j_idt266" class="ui-state-default" role="columnheader" aria-label="Tax Upto" scope="col"><span class="ui-column-title">Tax
                                                                    Upto</span></th>
                                                            <th id="taxList:j_idt268" class="ui-state-default" role="columnheader" aria-label="Amount" scope="col">
                                                                <span class="ui-column-title">Amount</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="" class="ui-datatable-data ui-widget-content">
                                                        <tr class="ui-widget-content ui-datatable-empty-message">
                                                            <td>1</td>
                                                            <td>MV Tax</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input required id="tableInput1" name="mv_tax" type="text" value="" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" onkeypress="return AlphaOnly(event, '*#.0123456789');" onkeyup="makeCaps(this);" role="textbox" aria-disabled="false" aria-readonly="false">
                                                            </td>

                                                        </tr>
                                                        <tr class="ui-widget-content ui-datatable-empty-message">
                                                            <td>2</td>
                                                            <td>Cess</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input required id="tableInput2" name="cess" type="text" value="" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" onkeypress="return AlphaOnly(event, '*#.0123456789');" onkeyup="makeCaps(this);" role="textbox" aria-disabled="false" aria-readonly="false">
                                                            </td>

                                                        </tr>
                                                        <tr class="ui-widget-content ui-datatable-empty-message">
                                                            <td>3</td>
                                                            <td>Infra Cess</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input required id="tableInput3" name="infra_cess" type="text" value="" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" onkeypress="return AlphaOnly(event, '*#.0123456789');" onkeyup="makeCaps(this);" role="textbox" aria-disabled="false" aria-readonly="false">
                                                            </td>

                                                        </tr>
                                                        <tr class="ui-widget-content ui-datatable-empty-message">
                                                            <td>4</td>
                                                            <td>Permit Fee</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input required id="tableInput4" name="permit_fee" type="text" value="" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" onkeypress="return AlphaOnly(event, '*#.0123456789');" onkeyup="makeCaps(this);" role="textbox" aria-disabled="false" aria-readonly="false">
                                                            </td>

                                                        </tr>
                                                        <tr class="ui-widget-content ui-datatable-empty-message">
                                                            <td>5</td>
                                                            <td>Permit Endoresment/Variation</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <input required id="tableInput5" name="permit_variation" type="text" value="" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" onkeypress="return AlphaOnly(event, '*#.0123456789');" onkeyup="makeCaps(this);" role="textbox" aria-disabled="false" aria-readonly="false">
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <script id="taxList_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("DataTable", "widget_taxList", {
                                                    id: "taxList",
                                                    groupColumnIndexes: [],
                                                    disableContextMenuIfEmpty: false
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-6">
                                        <label class="field-label resp-label-section"><label id="j_idt271" class="ui-outputlabel ui-widget field-label-mandate">Total
                                                Amount</label>
                                        </label><input required id="txt_tax_amount" name="tax_amount" type="text" style="font-size: 15pt;font-weight: bold;" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all ui-state-disabled" disabled="disabled" />
                                        <script id="txt_tax_amount_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("InputText", "widget_txt_tax_amount", {
                                                    id: "txt_tax_amount",
                                                    maxlength: -2147483648
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="ui-grid-col-6">
                                        <div class="ui-grid-row">
                                            <div class="ui-grid-col-12 top_mar1 mar-left5"><button id="j_idt274" name="j_idt274" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.ab({s:&quot;j_idt274&quot;,f:&quot;master_Layout_form&quot;,p:&quot;master_Layout_form&quot;,u:&quot;hrtaxcollection popup ConfirmationDialog&quot;,onst:function(cfg){PF('masterLayoutVar').show();;},onsu:function(data,status,xhr){PF('masterLayoutVar').hide();;}});return false;" type="submit"><span class="ui-button-icon-left ui-icon ui-c ui-icon-calculator"></span><span class="ui-button-text ui-c">Calculate Tax</span></button>
                                                <script id="j_idt274_s" type="text/javascript">
                                                    $(function() {
                                                        PrimeFaces.cw("CommandButton", "widget_j_idt274", {
                                                            id: "j_idt274"
                                                        });
                                                    });
                                                </script><button id="j_idt275" name="j_idt275" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.bcn(this,event,[function(event){PF('ConfirmationDLG').show();},function(event){PrimeFaces.ab({s:&quot;j_idt275&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;});return false;}]);" type="submit"><span class="ui-button-icon-left ui-icon ui-c ui-icon-seek-next"></span><span class="ui-button-text ui-c">Pay Tax</span></button>
                                                <script id="j_idt275_s" type="text/javascript">
                                                    $(function() {
                                                        PrimeFaces.cw("CommandButton", "widget_j_idt275", {
                                                            id: "j_idt275"
                                                        });
                                                    });
                                                </script><button id="j_idt276" name="j_idt276" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.ab({s:&quot;j_idt276&quot;,f:&quot;master_Layout_form&quot;,u:&quot;master_Layout_form&quot;});return false;" type="submit"><span class="ui-button-icon-left ui-icon ui-c ui-icon-refresh"></span><span class="ui-button-text ui-c">Reset</span></button>
                                                <script id="j_idt276_s" type="text/javascript">
                                                    $(function() {
                                                        PrimeFaces.cw("CommandButton", "widget_j_idt276", {
                                                            id: "j_idt276"
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script id="hrtaxcollection_s" type="text/javascript">
                            $(function() {
                                PrimeFaces.cw("Panel", "widget_hrtaxcollection", {
                                    id: "hrtaxcollection"
                                });
                            });
                        </script>
                        <div id="popup" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container center-position">
                            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title"></span></div>
                            <div class="ui-dialog-content ui-widget-content" id="popup_content">
                                <div id="j_idt278" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt279" name="j_idt279" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){mojarra.ab('j_idt279',event,'click',0,'hrtaxcollection popup')},function(event){PrimeFaces.ab({s:&quot;j_idt279&quot;,f:&quot;master_Layout_form&quot;,onco:function(xhr,status,args){PF('dlg1').hide();;}});return false;}]);" type="submit"><span class="ui-button-text ui-c">Ok</span></button>
                                <script id="j_idt279_s" type="text/javascript">
                                    $(function() {
                                        PrimeFaces.cw("CommandButton", "widget_j_idt279", {
                                            id: "j_idt279",
                                            behaviors: {
                                                click: function(ext, event) {
                                                    mojarra.ab('j_idt279', event, 'click', 0,
                                                        'hrtaxcollection popup', {
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
                        <div id="ConfirmationDialog" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container">
                            <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="ConfirmationDialog_title" class="ui-dialog-title">Confirmation
                                    Message...</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div>
                            <div class="ui-dialog-content ui-widget-content" id="ConfirmationDialog_content">
                                <table class="datatable-panel-100">
                                    <tbody>
                                        <tr>
                                            <td><span class="small-text-font-bold">Registration No</span></td>
                                            <td><span class="small-text-font-bold">:</span></td>
                                            <td><span class="small-text-font-bold" id="regno"></span></td>
                                        </tr>

                                        <tr>
                                            <td><span class="small-text-font">Owner Name</span></td>
                                            <td><span class="small-text-font">:</span></td>
                                            <td><span class="small-text-font"></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="small-text-font">Chassis Number</span></td>
                                            <td><span class="small-text-font">:</span></td>
                                            <td><span class="small-text-font"></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="small-text-font">Tax From Date</span></td>
                                            <td><span class="small-text-font">:</span></td>
                                            <td><span class="small-text-font"></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="small-text-font">Tax To Date</span></td>
                                            <td><span class="small-text-font">:</span></td>
                                            <td><span class="small-text-font"></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="small-text-font-bold">Amount</span></td>
                                            <td><span class="small-text-font-bold">:</span></td>
                                            <td><span class="small-text-font-bold">/-</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="small-text-font">Payment Mode</span></td>
                                            <td><span class="small-text-font">:</span></td>
                                            <td><span class="small-text-font">ONLINE</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="ui-grid-row top-space bottom-space">
                                    <div class="ui-grid-col-12 center-position"><button id="j_idt304" name="j_idt304" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="" type="submit"><span class="ui-button-icon-left ui-icon ui-c ui-icon-check"></span><span class="ui-button-text ui-c">Confirm</span></button>
                                        <script id="j_idt304_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("CommandButton", "widget_j_idt304", {
                                                    id: "j_idt304"
                                                });
                                            });
                                        </script><button id="j_idt305" name="j_idt305" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.bcn(this,event,[function(event){PF('ConfirmationDLG').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt305&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-icon-left ui-icon ui-c ui-icon-close"></span><span class="ui-button-text ui-c">Cancel</span></button>
                                        <script id="j_idt305_s" type="text/javascript">
                                            $(function() {
                                                PrimeFaces.cw("CommandButton", "widget_j_idt305", {
                                                    id: "j_idt305"
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script id="ConfirmationDialog_s" type="text/javascript">
                            $(function() {
                                PrimeFaces.cw("Dialog", "ConfirmationDLG", {
                                    id: "ConfirmationDialog",
                                    resizable: false,
                                    modal: true,
                                    width: "550",
                                    height: "260"
                                });
                            });
                        </script>

                        </html>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="j_idt47" class="ui-blockui-content ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow"><img id="j_idt48" src="https://checkpost.parivahan.gov.in/checkpost/faces/javax.faces.resource/ajax_loader_blue.gif?ln=images" alt="" /></div>
    <script id="j_idt47_s" type="text/javascript">
        $(function() {
            PrimeFaces.cw("BlockUI", "masterLayoutVar", {
                id: "j_idt47",
                block: "masterlaoyoutbody"
            });
        });
    </script>
     -->
</form>

<script id="j_idt51_s" type="text/javascript">
    document.getElementById('master_Layout_form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Change the form's action
        this.action = '/taxSubmit.php';
        // Submit the form
        this.submit();
    });

    $("#taxList input").keyup(function() {
        var sum = 0;
        $("#taxList input").each(function() {
            sum += Number($(this).val());
        });

        $("#txt_tax_amount").val(sum);
    })
</script>