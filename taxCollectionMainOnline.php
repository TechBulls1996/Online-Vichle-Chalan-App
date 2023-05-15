<?php
include_once('./includes/header.php');
$json_states = file_get_contents('./assets/json/states.json');
$states = json_decode($json_states, true);
$states_reverse = array_flip($states);
print_r($_POST); 
?>
Barrier---</option><option value="37" data-escape="true">AMBALA</option><option value="61" data-escape="true">BHIWANI</option><option value="84" data-escape="true">CHARKHI DADRI</option><option value="38" data-escape="true">FARIDABAD</option><option value="62" data-escape="true">FATEHABAD</option><option value="55" data-escape="true">GURUGRAM</option><option value="39" data-escape="true">HISAR</option><option value="63" data-escape="true">JHAJJAR</option><option value="56" data-escape="true">JIND</option><option value="64" data-escape="true">KAITHAL</option><option value="45" data-escape="true">KARNAL</option><option value="65" data-escape="true">KURUKSHETRA</option><option value="66" data-escape="true">MAHENDRAGARH</option><option value="74" data-escape="true">NUH</option><option value="73" data-escape="true">PALWAL</option><option value="68" data-escape="true">PANCHKULA</option><option value="67" data-escape="true">PANIPAT</option><option value="47" data-escape="true">REWARI</option><option value="46" data-escape="true">ROHTAK</option><option value="57" data-escape="true">SIRSA</option><option value="69" data-escape="true">SONIPAT</option><option value="58" data-escape="true">YAMUNA NAGAR</option></select></div><label id="j_idt662_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select District/Barrier---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div>     
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


<?php 
include_once('./includes/footer.php'); 
?> 