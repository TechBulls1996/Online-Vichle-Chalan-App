<?php include_once('../includes/header.php') ?>
<div><div id="popup" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container center-position ui-resizable" role="dialog" aria-labelledby="popup_title" aria-describedby="popup_content" aria-hidden="true" aria-modal="true" style="width: auto; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title"></span></div><div class="ui-dialog-content ui-widget-content" id="popup_content" style="height: auto;"><div id="j_idt41" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt42" name="j_idt42" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){mojarra.ab('j_idt42',event,'click',0,'publicsignup popup')},function(event){PrimeFaces.ab({s:&quot;j_idt42&quot;,f:&quot;master_Layout_form&quot;,onco:function(xhr,status,args){PF('dlg1').hide();;}});return false;}]);" type="submit" role="button" aria-disabled="false"><span class="ui-button-text ui-c">Ok</span></button></div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div></div> 
        <div class="container">
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12 center-position">
                        <h1 class="header-main">BORDER TAX PAYMENT</h1>
                    </div>
                </div>
                <div class="ui-grid-row">
                    
                    <div class="ui-grid-col-12"><div id="publicsignup" class="ui-panel ui-widget ui-widget-content ui-corner-all" data-widget="widget_publicsignup"><div id="publicsignup_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Select State Name for Tax Payment</span></div><div id="publicsignup_content" class="ui-panel-content ui-widget-content">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-1 resp-blank-height"></div>
                                <div class="ui-grid-col-5">
                                    <label class="field-label resp-label-section">
                                        <h3 class="top-space">Select Visiting State Name</h3>
                                    </label><div id="ib_state" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="ib_state_items" style="min-width: 164px;"><div class="ui-helper-hidden-accessible"><input id="ib_state_focus" name="ib_state_focus" type="text" autocomplete="off" aria-expanded="false" aria-required="true" aria-autocomplete="list" aria-activedescendant="ib_state_0" aria-describedby="ib_state_0" aria-disabled="false"></div><div class="ui-helper-hidden-accessible"><select id="ib_state_input" name="ib_state_input" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;ib_state&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;ib_state&quot;,u:&quot;operation_code&quot;});"><option value="-1" data-escape="true">---Select State---</option><option value="BR" data-escape="true">BIHAR</option><option value="CG" data-escape="true">CHHATTISGARH</option><option value="GJ" data-escape="true">GUJARAT</option><option value="HR" data-escape="true">HARYANA</option><option value="HP" data-escape="true">HIMACHAL PRADESH</option><option value="JK" data-escape="true">JAMMU &amp; KASHMIR</option><option value="JH" data-escape="true">JHARKHAND</option><option value="KA" data-escape="true">KARNATAKA</option><option value="KL" data-escape="true">KERALA</option><option value="MH" data-escape="true">MAHARASHTRA</option><option value="OR" data-escape="true">ODISHA</option><option value="PB" data-escape="true">PUNJAB</option><option value="RJ" data-escape="true">RAJASTHAN</option><option value="TN" data-escape="true">TAMIL NADU</option><option value="TR" data-escape="true">TRIPURA</option><option value="UP" data-escape="true">UTTAR PRADESH</option><option value="UK" data-escape="true">UTTRAKHAND</option></select>
                                
                                </div><label id="ib_state_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select State---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div>
                                </div> 
                                <div class="ui-grid-col-5">
                                    <label class="field-label resp-label-section">
                                        <h3 class="top-space">Service Name</h3>
                                    </label><div id="operation_code" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" style="width:90%!important;" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="operation_code_items"><div class="ui-helper-hidden-accessible"><input id="operation_code_focus" name="operation_code_focus" type="text" autocomplete="off" aria-expanded="false" aria-required="true" aria-autocomplete="list" aria-activedescendant="operation_code_0" aria-describedby="operation_code_0" aria-disabled="false"></div><div class="ui-helper-hidden-accessible"><select id="operation_code_input" name="operation_code_input" tabindex="-1" aria-hidden="true"><option value="-1" data-escape="true">---Select Service Name---</option></select></div><label id="operation_code_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select Service Name---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div>
                                </div> 
                            </div>
                            <div class="ui-grid-row top-space">
                                <div class="ui-grid-col-12 center-position"><button id="j_idt51" name="j_idt51" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.ab({s:&quot;j_idt51&quot;,f:&quot;master_Layout_form&quot;,onst:function(cfg){PF('masterLayoutVar').show();;},onsu:function(data,status,xhr){PF('masterLayoutVar').hide();;},pa:[{name:&quot;PAYMENT_TYPE&quot;,value:&quot;ONLINE&quot;}]});return false;" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-seek-next"></span><span class="ui-button-text ui-c">Go</span></button>
                                </div>
                            </div></div></div><br><div id="j_idt55" class="ui-panel ui-widget ui-widget-content ui-corner-all" style="font-size: 11pt;" data-widget="widget_j_idt55"><div id="j_idt55_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Follow these steps to initiate tax payment...</span></div><div id="j_idt55_content" class="ui-panel-content ui-widget-content">
                            <ol>
                                <li>  Select the state where you want to go from <font class="dialog-highlight-text">'Select State'</font> combo box.</li>
                                <li>  Select service Name from <font class="dialog-highlight-text">'Service Name'</font> combo box.</li>
                                <ol type="i">
                                        <li type="i">  Select <font class="dialog-highlight-text">'VEHICLE TAX COLLECTION (OTHER STATE)'</font> in case you do not have NCR permit.</li>
                                        <li type="i">  Select <font class="dialog-highlight-text">'VEHICLE TAX COLLECTION (NCR)'</font> in case you have NCR permit.</li>
                                    </ol>    
                                <li>  Click <font class="dialog-highlight-text">'Go'</font> button to open the vehicle details form.</li>
                                <li>  Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li>
                                <li>  Fill rest of the fields which are not filled automatically.</li>
                                <li>  In case fields are not filled automatically then enter the details manually.</li>
                                <li>  Click <font class="dialog-highlight-text">'Calculate Tax'</font> button to calculate the tax according to state notification.</li>
                                <li>  Click <font class="dialog-highlight-text">'Pay Tax'</font> button to pay the calculated tax.</li>
                                <li>  It opens the payment gateway of VAHAN.</li>
                                <li>  Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font> button.</li>
                                <li>  And then follow the screen to pay tax.</li>
                                <li>  After paying tax bank will redirect to the Checkpost application.</li>
                                <li>  In case payment is success Checkpost application will generate the success receipt.</li>
                                <li>  Print the receipt.</li>
                            </ol></div></div> 
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <?php include_once('../includes/footer.php') ?>