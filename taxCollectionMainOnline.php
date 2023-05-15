<?php
include_once('./includes/header.php');

$json_states = file_get_contents('./assets/json/states.json');
$states = json_decode($json_states, true);
$states_reverse = array_flip($states);
print_r($_POST); 
?>

<div>
        <div class="container-fluid">
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row top-space center-position contents-Space">
                    <h1 class="header-main"><label id="j_idt41" class="ui-outputlabel ui-widget header-main" style="color: #154281!important;font-weight: bold!important;">BORDER TAX PAYMENT FOR ENTRY INTO</label><span class="red"> <?= @$states_reverse[$_POST['ib_state_input']] ?></span></h1>
                </div>
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12 center-position contents-Space">
                    </div>
                </div>
                <div class="ui-grid-row top-space">
                    <div class="ui-grid-col-1 resp-blank-height"></div>
                    <div class="ui-grid-col-10"><div id="hrtaxcollection" class="ui-panel ui-widget ui-widget-content ui-corner-all bottom-space" data-widget="widget_hrtaxcollection"><div id="hrtaxcollection_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Tax Payment Details</span></div><div id="hrtaxcollection_content" class="ui-panel-content ui-widget-content">
        <div class="ui-grid-row">
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt611" class="ui-outputlabel ui-widget field-label-mandate">Vehicle No.</label>
                </label><input id="j_idt613" name="j_idt613" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" maxlength="10" onkeypress="return AlphaOnly(event, 'abcdefghijklmnopqrstuvwxyz0123456789');" onkeyup="makeCaps(this);" role="textbox" aria-disabled="false" aria-readonly="false">
            </div>
            <div class="ui-grid-col-6">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12 top_mar1 mar-left5"><button id="j_idt615" name="j_idt615" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.ab({s:&quot;j_idt615&quot;,f:&quot;master_Layout_form&quot;,u:&quot;hrtaxcollection popup&quot;,onst:function(cfg){PF('masterLayoutVar').show();;},onsu:function(data,status,xhr){PF('masterLayoutVar').hide();;}});return false;" title="Click to get owner and vehicle details from Vahan 4." type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-arrowthick-1-s"></span><span class="ui-button-text ui-c">Get Details</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-grid-row">
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt617" class="ui-outputlabel ui-widget field-label-mandate">Chassis No.</label>
                </label><input id="j_idt619" name="j_idt619" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all ui-state" aria-disabled="false" autocomplete="off" maxlength="30" onkeypress="return AlphaOnly(event, '*#.0123456789');" onkeyup="makeCaps(this);" role="textbox" aria-readonly="false">
            </div>   
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt621" class="ui-outputlabel ui-widget field-label-mandate">Owner Name</label>
                </label><input id="j_idt623" name="j_idt623" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all ui-state" aria-disabled="false" autocomplete="off" maxlength="50" onkeypress="return AlphaWithSpaceOnly(event, '. ');" onkeyup="makeCaps(this);" role="textbox" aria-readonly="false">
            </div>
        </div>
        <div class="ui-grid-row">
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt625" class="ui-outputlabel ui-widget field-label-mandate">Mobile No.</label>
                </label>
                
                <input id="mobileno" name="mobileno" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" maxlength="10" placeholder="SMS about payment will be sent to this number." title="SMS about payment will be sent to this number." onkeypress="return NumericOnly(event, '');" role="textbox" aria-disabled="false" aria-readonly="false">
            </div>  
            <div class="ui-grid-col-6">
                                 <label class="field-label resp-label-section">
                                    <label id="j_idt628" class="ui-outputlabel ui-widget field-label-mandate">From State</label>
                                 </label>   
                                <div id="ib_state" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false">
                                    <div class="ui-helper-hidden-accessible">
                                        <input id="ib_state_focus" name="ib_state_focus" type="text" autocomplete="off" aria-expanded="false" aria-required="true">
                                    </div>
                                <div class="ui-helper-hidden-accessible">
                                <select id="ib_state_input" name="ib_state_input" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;ib_state&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;ib_state&quot;,u:&quot;operation_code&quot;});"><option value="-1" data-escape="true">---Select State---</option>
                                    <?php
                                    $states = file_get_contents('./assets/json/states.json');
                                    $data = json_decode($states, true);
                                    // Access the data
                                    foreach ($data as $state => $code) {
                                    echo '<option value="'.$code.'" data-escape="true">'.$state.'</option>';
                                    }
                                    ?>
                                   
                                </select>
                               </div><label id="ib_state_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                
                                <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right">
                                    <span class="ui-icon ui-icon-triangle-1-s ui-c"></span>
                                </div>
                                <div id="ib_state_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay"><div class="ui-selectonemenu-filter-container">
                                    <input class="ui-selectonemenu-filter ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" id="ib_state_filter" name="ib_state_filter" type="text" autocomplete="off"><span class="ui-icon ui-icon-search"></span>
                               </div>
                               <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                               
                               <ul id="ib_state_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">
                                  
                               <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select State---" tabindex="-1" role="option">---Select State---</li>
                                <?php
                                // Access the data
                                foreach ($data as $state => $code) {
                                echo '<li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="'.$state.'" tabindex="-1" role="option">'.$state.'</li>';
                                }
                                ?>
                                
                              </ul>
                             </div></div></div><script id="ib_state_s" type="text/javascript">$(function(){PrimeFaces.cw("SelectOneMenu","widget_ib_state",{id:"ib_state",appendTo:"@(body)",filter:true,behaviors:{change:function(ext,event) {PrimeFaces.ab({s:"ib_state",e:"change",f:"master_Layout_form",p:"ib_state",u:"operation_code"},ext);}}});});</script>
                        </div>  
            
        </div>
        <div class="ui-grid-row">
        <div class="ui-grid-col-6">
            <label class="field-label resp-label-section">
                <label id="j_idt634" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Permit Type</label>
                </label> 
                                <div id="ib_state" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false">
                                    <div class="ui-helper-hidden-accessible">
                                        <input id="ib_state_focus" name="ib_state_focus" type="text" autocomplete="off" aria-expanded="false" aria-required="true">
                                    </div>
                                <div class="ui-helper-hidden-accessible">
                                <select id="ib_state_input" name="ib_state_input" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;ib_state&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;ib_state&quot;,u:&quot;operation_code&quot;});"><option value="-1" data-escape="true">---Select State---</option>
                                    <?php
                                    
                                    // Access the data
                                    foreach ($VEHICLE_TYPE as $key => $val) {
                                    echo '<option value="'.$val.'" data-escape="true">'.$val.'</option>';
                                    }
                                    ?>
                                   
                                </select>
                               </div><label id="ib_state_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                
                                <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right">
                                    <span class="ui-icon ui-icon-triangle-1-s ui-c"></span>
                                </div>
                                <div id="ib_state_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay"><div class="ui-selectonemenu-filter-container">
                                    <input class="ui-selectonemenu-filter ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" id="ib_state_filter" name="ib_state_filter" type="text" autocomplete="off"><span class="ui-icon ui-icon-search"></span>
                               </div>
                               <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                               
                               <ul id="ib_state_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">
                                  
                               <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select State---" tabindex="-1" role="option">---Select State---</li>
                                <?php
                                // Access the data
                                foreach ($VEHICLE_TYPE as $key => $val) {
                                echo '<li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="'.$val.'" tabindex="-1" role="option">'.$val.'</li>';
                                }
                                ?>
                                
                              </ul>
                             </div></div></div><script id="ib_state_s" type="text/javascript">$(function(){PrimeFaces.cw("SelectOneMenu","widget_ib_state",{id:"ib_state",appendTo:"@(body)",filter:true,behaviors:{change:function(ext,event) {PrimeFaces.ab({s:"ib_state",e:"change",f:"master_Layout_form",p:"ib_state",u:"operation_code"},ext);}}});});</script>
                        </div>
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt634" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Permit Type</label>
                </label><div id="j_idt636" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="j_idt636_items" style="min-width: 338px;"><div class="ui-helper-hidden-accessible"><input id="j_idt636_focus" name="j_idt636_focus" type="text" autocomplete="off" aria-expanded="false" aria-autocomplete="list" aria-activedescendant="j_idt636_0" aria-describedby="j_idt636_0" aria-disabled="false"></div><div class="ui-helper-hidden-accessible"><select id="j_idt636_input" name="j_idt636_input" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;j_idt636&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;,u:&quot;hrtaxcollection&quot;});"><option value="-1" data-escape="true">---Select Vehicle Type---</option><option value="1" data-escape="true">CONTRACT CARRIAGE/PASSENGER VEHICLES</option><option value="2" data-escape="true">PRIVATE SERVICE VEHICLE</option><option value="3" data-escape="true">GOODS VEHICLE</option><option value="4" data-escape="true">STAGE CARRIAGE</option><option value="9" data-escape="true">CONSTRUCTION EQUIPMENT VEHICLE</option></select></div><label id="j_idt636_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select Vehicle Type---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div>     
            </div>
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt640" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Class</label>
                </label><div id="j_idt642" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="j_idt642_items" style="min-width: 175px;"><div class="ui-helper-hidden-accessible"><input id="j_idt642_focus" name="j_idt642_focus" type="text" autocomplete="off" aria-expanded="false" aria-autocomplete="list" aria-activedescendant="j_idt642_0" aria-describedby="j_idt642_0" aria-disabled="false"></div><div class="ui-helper-hidden-accessible"><select id="j_idt642_input" name="j_idt642_input" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;j_idt642&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;,u:&quot;hrtaxcollection&quot;});"><option value="-1" data-escape="true">---Select Vehicle Class---</option></select></div><label id="j_idt642_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select Vehicle Class---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div> 
            </div> 
        </div>
        <div class="ui-grid-row">
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="lbl_seat_cap" class="ui-outputlabel ui-widget field-label-mandate">Seating Capacity (Excluding Driver)</label>
                </label><input id="txt_seat_cap" name="txt_seat_cap" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" maxlength="2" onkeypress="return NumericOnly(event, '');" role="textbox" aria-disabled="false" aria-readonly="false">
            </div> 
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt648" class="ui-outputlabel ui-widget field-label-mandate">Service Type</label>
                </label><div id="cmb_service_type" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="cmb_service_type_items" style="min-width: 172px;"><div class="ui-helper-hidden-accessible"><input id="cmb_service_type_focus" name="cmb_service_type_focus" type="text" autocomplete="off" aria-expanded="false" aria-autocomplete="list" aria-activedescendant="cmb_service_type_0" aria-describedby="cmb_service_type_0" aria-disabled="false"></div><div class="ui-helper-hidden-accessible"><select id="cmb_service_type_input" name="cmb_service_type_input" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;cmb_service_type&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;,u:&quot;hrtaxcollection&quot;});"><option value="-1" data-escape="true">---Select Service Type---</option></select></div><label id="cmb_service_type_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select Service Type---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div>     
            </div>
        </div>
        <div class="ui-grid-row">
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="lbl_distance" class="ui-outputlabel ui-widget">Distance(In KM)<font color="#FF0000"> *</font></label>
                </label><input id="txt_distance" name="txt_distance" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" autocomplete="off" maxlength="10" onkeypress="return NumericOnly(event, '');" role="textbox" aria-disabled="false" aria-readonly="false">
            </div> 
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt655" class="ui-outputlabel ui-widget field-label-mandate">Tax Mode</label>
                </label><div id="cmb_payment_mode" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="cmb_payment_mode_items" style="min-width: 185px;"><div class="ui-helper-hidden-accessible"><input id="cmb_payment_mode_focus" name="cmb_payment_mode_focus" type="text" autocomplete="off" aria-expanded="false" aria-autocomplete="list" aria-activedescendant="cmb_payment_mode_0" aria-describedby="cmb_payment_mode_0" aria-disabled="false"></div><div class="ui-helper-hidden-accessible"><select id="cmb_payment_mode_input" name="cmb_payment_mode_input" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;cmb_payment_mode&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;,u:&quot;hrtaxcollection&quot;});"><option value="-1" data-escape="true">---Select Payment Mode---</option></select></div><label id="cmb_payment_mode_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select Payment Mode---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div>     
            </div>
        </div>
        <div class="ui-grid-row">
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt660" class="ui-outputlabel ui-widget field-label-mandate">Border/Barrier District through Entering</label>
                </label><div id="j_idt662" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="j_idt662_items" style="min-width: 179.5px;"><div class="ui-helper-hidden-accessible"><input id="j_idt662_focus" name="j_idt662_focus" type="text" autocomplete="off" aria-expanded="false" aria-autocomplete="list" aria-activedescendant="j_idt662_0" aria-describedby="j_idt662_0" aria-disabled="false"></div><div class="ui-helper-hidden-accessible"><select id="j_idt662_input" name="j_idt662_input" tabindex="-1" aria-hidden="true"><option value="-1" data-escape="true">---Select District/Barrier---</option><option value="37" data-escape="true">AMBALA</option><option value="61" data-escape="true">BHIWANI</option><option value="84" data-escape="true">CHARKHI DADRI</option><option value="38" data-escape="true">FARIDABAD</option><option value="62" data-escape="true">FATEHABAD</option><option value="55" data-escape="true">GURUGRAM</option><option value="39" data-escape="true">HISAR</option><option value="63" data-escape="true">JHAJJAR</option><option value="56" data-escape="true">JIND</option><option value="64" data-escape="true">KAITHAL</option><option value="45" data-escape="true">KARNAL</option><option value="65" data-escape="true">KURUKSHETRA</option><option value="66" data-escape="true">MAHENDRAGARH</option><option value="74" data-escape="true">NUH</option><option value="73" data-escape="true">PALWAL</option><option value="68" data-escape="true">PANCHKULA</option><option value="67" data-escape="true">PANIPAT</option><option value="47" data-escape="true">REWARI</option><option value="46" data-escape="true">ROHTAK</option><option value="57" data-escape="true">SIRSA</option><option value="69" data-escape="true">SONIPAT</option><option value="58" data-escape="true">YAMUNA NAGAR</option></select></div><label id="j_idt662_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select District/Barrier---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div>     
            </div>
            <div class="ui-grid-col-3">
                <label class="field-label resp-label-section"><label id="j_idt666" class="ui-outputlabel ui-widget field-label-mandate">Tax From Date</label>
                </label><span id="cal_tax_from" class="ui-calendar"><input id="cal_tax_from_input" name="cal_tax_from_input" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all hasDatepicker" autocomplete="off" placeholder="DD-MM-YYYY HH:mm" role="textbox" aria-disabled="false" aria-readonly="false"></span>
            </div>   
            <div class="ui-grid-col-3">
                <label class="field-label resp-label-section"><label id="j_idt669" class="ui-outputlabel ui-widget field-label-mandate">Tax Upto Date</label>
                </label><span id="cal_tax_to" class="ui-calendar"><input id="cal_tax_to_input" name="cal_tax_to_input" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all hasDatepicker" autocomplete="off" placeholder="DD-MM-YYYY HH:mm" role="textbox" aria-disabled="false" aria-readonly="false"></span>
            </div>
        </div><br>
        <div class="ui-grid-row">
            <div class="ui-grid-col-12"><div id="taxList" class="ui-datatable ui-widget"><div class="ui-datatable-tablewrapper"><table role="grid"><thead id="taxList_head"><tr role="row"><th id="taxList:j_idt672" class="ui-state-default" role="columnheader" aria-label="Sl. No." scope="col" style="width: 40px;"><span class="ui-column-title">Sl. No.</span></th><th id="taxList:j_idt674" class="ui-state-default" role="columnheader" aria-label="Particulars" scope="col"><span class="ui-column-title">Particulars</span></th><th id="taxList:j_idt676" class="ui-state-default" role="columnheader" aria-label="Tax From" scope="col"><span class="ui-column-title">Tax From</span></th><th id="taxList:j_idt678" class="ui-state-default" role="columnheader" aria-label="Tax Upto" scope="col"><span class="ui-column-title">Tax Upto</span></th><th id="taxList:j_idt680" class="ui-state-default" role="columnheader" aria-label="Amount" scope="col"><span class="ui-column-title">Amount</span></th></tr></thead><tbody id="taxList_data" class="ui-datatable-data ui-widget-content"><tr class="ui-widget-content ui-datatable-empty-message"><td colspan="5">No records found.</td></tr></tbody></table></div></div>
            </div>
        </div>
        <div class="ui-grid-row">
            <div class="ui-grid-col-6">
                <label class="field-label resp-label-section"><label id="j_idt683" class="ui-outputlabel ui-widget field-label-mandate">Total Amount</label>
                </label><input id="txt_tax_amount" name="txt_tax_amount" type="text" style="font-size: 15pt;font-weight: bold;" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all ui-state-disabled" disabled="disabled" aria-disabled="true" role="textbox" aria-readonly="false">
            </div>   
            <div class="ui-grid-col-6">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12 top_mar1 mar-left5"><button id="j_idt686" name="j_idt686" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.ab({s:&quot;j_idt686&quot;,f:&quot;master_Layout_form&quot;,p:&quot;master_Layout_form&quot;,u:&quot;hrtaxcollection popup ConfirmationDialog&quot;,onst:function(cfg){PF('masterLayoutVar').show();;},onsu:function(data,status,xhr){PF('masterLayoutVar').hide();;}});return false;" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-calculator"></span><span class="ui-button-text ui-c">Calculate Tax</span></button><button id="j_idt687" name="j_idt687" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.bcn(this,event,[function(event){PF('ConfirmationDLG').show();},function(event){PrimeFaces.ab({s:&quot;j_idt687&quot;,f:&quot;master_Layout_form&quot;,p:&quot;hrtaxcollection&quot;});return false;}]);" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-seek-next"></span><span class="ui-button-text ui-c">Pay Tax</span></button><button id="j_idt688" name="j_idt688" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.ab({s:&quot;j_idt688&quot;,f:&quot;master_Layout_form&quot;,u:&quot;master_Layout_form&quot;});return false;" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-refresh"></span><span class="ui-button-text ui-c">Reset</span></button>
                    </div>
                </div>
            </div>
        </div></div></div><div id="popup" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container center-position ui-resizable" role="dialog" aria-labelledby="popup_title" aria-describedby="popup_content" aria-hidden="true" aria-modal="true" style="width: auto; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title"></span></div><div class="ui-dialog-content ui-widget-content" id="popup_content" style="height: auto;"><div id="j_idt690" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt691" name="j_idt691" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){mojarra.ab('j_idt691',event,'click',0,'hrtaxcollection popup')},function(event){PrimeFaces.ab({s:&quot;j_idt691&quot;,f:&quot;master_Layout_form&quot;,onco:function(xhr,status,args){PF('dlg1').hide();;}});return false;}]);" type="submit" role="button" aria-disabled="false"><span class="ui-button-text ui-c">Ok</span></button></div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div></div><div id="ConfirmationDialog" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container ui-draggable" role="dialog" aria-labelledby="ConfirmationDialog_title" aria-describedby="ConfirmationDialog_content" aria-hidden="true" aria-modal="true" style="width: 550px; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top ui-draggable-handle"><span id="ConfirmationDialog_title" class="ui-dialog-title">Confirmation Message...</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close" role="button"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" id="ConfirmationDialog_content" style="height: 260px;"><table class="datatable-panel-100">
<tbody>
<tr>
<td><span class="small-text-font-bold">Registration No</span></td>
<td><span class="small-text-font-bold">:</span></td>
<td><span class="small-text-font-bold"></span></td>
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
            <div class="ui-grid-col-12 center-position"><button id="j_idt716" name="j_idt716" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-check"></span><span class="ui-button-text ui-c">Confirm</span></button><button id="j_idt717" name="j_idt717" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.bcn(this,event,[function(event){PF('ConfirmationDLG').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt717&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-close"></span><span class="ui-button-text ui-c">Cancel</span></button>
            </div>
        </div>
    </div>
   </div>

                    </div>
                </div>
            </div>
        </div>
</div>
<!-- select data -->


<?php 
include_once('./includes/footer.php'); 
?> 