<?php
 if($_SERVER['REQUEST_METHOD'] ==='POST'){
    /*
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://checkpost.parivahan.gov.in/checkpost/faces/public/payment/TaxCollection.xhtml',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'javax.faces.partial.ajax='.$_POST['javax_faces_partial_ajax'].'&javax.faces.source='.$_POST['javax_faces_source'].'&javax.faces.partial.execute='.$_POST['javax_faces_partial_execute'].'&javax.faces.partial.render='.$_POST['javax_faces_partial_render'].'&javax.faces.behavior.event='.$_POST['javax_faces_behavior_event'].'&javax.faces.partial.event='.$_POST['javax_faces_partial_event'].'&master_Layout_form=master_Layout_form&ib_state_focus='.$_POST['ib_state_focus'].'&ib_state_input='.$_POST['ib_state_input'].'&operation_code_focus='.$_POST['operation_code_focus'].'&operation_code_input='.$_POST['operation_code_input'].'&javax.faces.ViewState=1399913001236130417%3A6625332671049041109',
        CURLOPT_HTTPHEADER => array(
          'Accept: application/xml, text/xml, * /*; q=0.01',
          'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,mt;q=0.7,es;q=0.6,gu;q=0.5',
          'Connection: keep-alive',
          'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
          'Cookie: JSESSIONID=6C832EDD5BD773118AA71FDB59031031; SERVERID_checkpost_22=vahan_check8085; JSESSIONID=8C324C8E764B163977A4F56E0909C220',
          'Faces-Request: partial/ajax',
          'Origin: https://checkpost.parivahan.gov.in',
          'Referer: https://checkpost.parivahan.gov.in/checkpost/faces/public/payment/TaxCollection.xhtml',
          'Sec-Fetch-Dest: empty',
          'Sec-Fetch-Mode: cors',
          'Sec-Fetch-Site: same-origin',
          'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36',
          'X-Requested-With: XMLHttpRequest',
          'sec-ch-ua: "Chromium";v="112", "Google Chrome";v="112", "Not:A-Brand";v="99"',
          'sec-ch-ua-mobile: ?0',
          'sec-ch-ua-platform: "macOS"'
        ),
      ));
      
      $response = curl_exec($curl);
      
      curl_close($curl);
      echo $response;
      */
      ?>
<?xml version='1.0' encoding='UTF-8'?>
<partial-response id="j_id1"><changes><update id="operation_code"><![CDATA[<div id="operation_code" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" style="width:90%!important;" role="combobox" aria-haspopup="true" aria-expanded="false"><div class="ui-helper-hidden-accessible"><input id="operation_code_focus" name="operation_code_focus" type="text" autocomplete="off" aria-expanded="false" aria-required="true" /></div><div class="ui-helper-hidden-accessible"><select id="operation_code_input" name="operation_code_input" tabindex="-1" aria-hidden="true"><option value="-1" data-escape="true">---Select Service Name---</option><option value="5003" data-escape="true">VEHICLE TAX COLLECTION (OTHER STATE)</option></select></div><label id="operation_code_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div><div id="operation_code_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay"><div class="ui-selectonemenu-filter-container"><input class="ui-selectonemenu-filter ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" id="operation_code_filter" name="operation_code_filter" type="text" autocomplete="off"><span class="ui-icon ui-icon-search"></span></input></div><div class="ui-selectonemenu-items-wrapper" style="max-height:200px"><ul id="operation_code_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox"><li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select Service Name---" tabindex="-1" role="option">---Select Service Name---</li><li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="VEHICLE TAX COLLECTION (OTHER STATE)" tabindex="-1" role="option">VEHICLE TAX COLLECTION (OTHER STATE)</li></ul></div></div></div><script id="operation_code_s" type="text/javascript">PrimeFaces.cw("SelectOneMenu","widget_operation_code",{id:"operation_code",appendTo:"@(body)",filter:true});</script>]]></update><update id="j_id1:javax.faces.ViewState:0"><![CDATA[1926975603013536903:404977094290912058]]></update></changes></partial-response>
<?php
} else {
 include_once('./includes/header.php') ?>
 <form id="master_Layout_form" name="master_Layout_form" method="post" action="/taxCollection.php" enctype="application/x-www-form-urlencoded">

<div>
     <div id="popup" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container center-position">
         <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top">
            <span id="popup_title" class="ui-dialog-title"></span>
        </div>
        <div class="ui-dialog-content ui-widget-content" id="popup_content">
            <div id="j_idt41" class="ui-messages ui-widget" aria-live="polite"></div>
            <button id="j_idt42" name="j_idt42" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){mojarra.ab('j_idt42',event,'click',0,'publicsignup popup')},function(event){PrimeFaces.ab({s:&quot;j_idt42&quot;,f:&quot;master_Layout_form&quot;,onco:function(xhr,status,args){PF('dlg1').hide();;}});return false;}]);" type="submit"><span class="ui-button-text ui-c">Ok</span></button>

            <script id="j_idt42_s" type="text/javascript">
            $(function(){
                PrimeFaces.cw("CommandButton","widget_j_idt42",{id:"j_idt42",behaviors:{
                    click:function(ext,event) {mojarra.ab('j_idt42',event,'click',0,'publicsignup popup',{'CLIENT_BEHAVIOR_RENDERING_MODE':'UNOBSTRUSIVE'})
                }
              }
             });
            });    
           </script>
        </div>
    </div>
    <script id="popup_s" type="text/javascript">$(function(){PrimeFaces.cw("Dialog","dlg1",{id:"popup",draggable:false,modal:true});});</script> 

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
                                    </label><div id="ib_state" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false"><div class="ui-helper-hidden-accessible"><input id="ib_state_focus" name="ib_state_focus" type="text" autocomplete="off" aria-expanded="false" aria-required="true"></div><div class="ui-helper-hidden-accessible"><select id="ib_state_input" name="ib_state_input" tabindex="-1" aria-hidden="true" onchange="PrimeFaces.ab({s:&quot;ib_state&quot;,e:&quot;change&quot;,f:&quot;master_Layout_form&quot;,p:&quot;ib_state&quot;,u:&quot;operation_code&quot;});"><option value="-1" data-escape="true">---Select State---</option>
<?php
$states = file_get_contents('./assets/json/states.json');
$data = json_decode($states, true);
// Access the data
foreach ($data as $state => $code) {
echo '<option value="'.$code.'" data-escape="true">'.$state.'</option>';
}
?>
                                   
                                </select></div><label id="ib_state_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label>
                                
                                <div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div><div id="ib_state_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay"><div class="ui-selectonemenu-filter-container"><input class="ui-selectonemenu-filter ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" id="ib_state_filter" name="ib_state_filter" type="text" autocomplete="off"><span class="ui-icon ui-icon-search"></span>
                               </div>
                               <div class="ui-selectonemenu-items-wrapper" style="max-height:200px">
                               
                               <ul id="ib_state_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox">
                                  
                               <li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select State---" tabindex="-1" role="option">---Select State---</li>
<?php
$states = file_get_contents('./assets/json/states.json');
$data = json_decode($states, true);
// Access the data
foreach ($data as $state => $code) {
echo '<li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="'.$state.'" tabindex="-1" role="option">'.$state.'</li><';
}
?>
                                
                              </ul></div></div></div><script id="ib_state_s" type="text/javascript">$(function(){PrimeFaces.cw("SelectOneMenu","widget_ib_state",{id:"ib_state",appendTo:"@(body)",filter:true,behaviors:{change:function(ext,event) {PrimeFaces.ab({s:"ib_state",e:"change",f:"master_Layout_form",p:"ib_state",u:"operation_code"},ext);}}});});</script>
                                </div> 
                                <div class="ui-grid-col-5">
                                    <label class="field-label resp-label-section">
                                        <h3 class="top-space">Service Name</h3>
                                    </label><div id="operation_code" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" style="width:90%!important;" role="combobox" aria-haspopup="true" aria-expanded="false"><div class="ui-helper-hidden-accessible"><input id="operation_code_focus" name="operation_code_focus" type="text" autocomplete="off" aria-expanded="false" aria-required="true"></div><div class="ui-helper-hidden-accessible"><select id="operation_code_input" name="operation_code_input" tabindex="-1" aria-hidden="true"><option value="-1" data-escape="true">---Select Service Name---</option></select></div><label id="operation_code_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">&nbsp;</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div><div id="operation_code_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay"><div class="ui-selectonemenu-filter-container"><input class="ui-selectonemenu-filter ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" id="operation_code_filter" name="operation_code_filter" type="text" autocomplete="off"><span class="ui-icon ui-icon-search"></span></div><div class="ui-selectonemenu-items-wrapper" style="max-height:200px"><ul id="operation_code_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox"><li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="---Select Service Name---" tabindex="-1" role="option">---Select Service Name---</li></ul></div></div></div><script id="operation_code_s" type="text/javascript">$(function(){PrimeFaces.cw("SelectOneMenu","widget_operation_code",{id:"operation_code",appendTo:"@(body)",filter:true});});</script>
                                </div> 
                            </div>
                            <div class="ui-grid-row top-space">
                                <div class="ui-grid-col-12 center-position">
                                    <button id="j_idt51" name="j_idt51" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="submitForm(e)" type="submit"><span class="ui-button-icon-left ui-icon ui-c ui-icon-seek-next"></span><span class="ui-button-text ui-c">Go</span></button>
                                    
                                   
                                </div>
                            </div></div></div><script id="publicsignup_s" type="text/javascript">$(function(){PrimeFaces.cw("Panel","widget_publicsignup",{id:"publicsignup"});});</script><br><div id="j_idt55" class="ui-panel ui-widget ui-widget-content ui-corner-all" style="font-size: 11pt;" data-widget="widget_j_idt55"><div id="j_idt55_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Follow these steps to initiate tax payment...</span></div><div id="j_idt55_content" class="ui-panel-content ui-widget-content">
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
                            </ol></div></div><script id="j_idt55_s" type="text/javascript">$(function(){PrimeFaces.cw("Panel","widget_j_idt55",{id:"j_idt55"});});</script> 
                    </div>
                </div>  
            </div>
        </div>
    </div>
</form>
<script id="j_idt51_s" type="text/javascript">                                    
document.getElementById('master_Layout_form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the form from submitting normally
  
  // Change the form's action
  this.action = '/taxCollectionMainOnline.php';
  // Submit the form
  this.submit();
});                                 
</script>
<?php 
include_once('./includes/footer.php'); 
}
?> 