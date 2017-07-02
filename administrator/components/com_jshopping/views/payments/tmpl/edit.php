<?php
/**
* @version      4.3.1 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
$row=$this->payment;
$params=$this->params;
$lists=$this->lists;
JHTML::_('behavior.tooltip');
?>
<div class="jshop_edit">
<form action="index.php?option=com_jshopping&controller=payments" method="post" name="adminForm" id="adminForm">
<ul class="nav nav-tabs">    
    <li class="active"><a href="#first-tab" data-toggle="tab"><?php echo _JSHOP_PAYMENT_GENERAL;?></a></li>
    <li><a href="#second-tab" data-toggle="tab"><?php echo _JSHOP_PAYMENT_CONFIG;?></a></li>
</ul>
<div id="editdata-document" class="tab-content">
<div id="first-tab" class="tab-pane active">
<div class="col100">
<fieldset class="adminform">
    <table class="admintable" width="100%" >
   <tr>
     <td class="key" width="30%">
       <?php echo _JSHOP_PUBLISH?>
     </td>
     <td>
       <input type="checkbox" name="payment_publish" value="1" <?php if ($row->payment_publish) echo 'checked="checked"'?> />
     </td>
   </tr>
   <tr>
     <td class="key">
       <?php echo _JSHOP_CODE?>
     </td>
     <td>
       <input type="text" class="inputbox" id="payment_code" name="payment_code" value="<?php echo $row->payment_code;?>" />
     </td>
   </tr>
   <?php
   foreach($this->languages as $lang){
   $field="name_".$lang->language;
   ?>
   <tr>
     <td class="key">
       <?php echo _JSHOP_TITLE; ?> <?php if ($this->multilang) print "(".$lang->lang.")";?>*
     </td>
     <td>
       <input type="text" class="inputbox" id="<?php print $field?>" name="<?php print $field?>" value="<?php echo $row->$field;?>" />
     </td>
   </tr>
   <?php }?>
   <tr>
     <td class="key">
       <?php echo _JSHOP_ALIAS;?>*
     </td>
     <td>
       <input type="text" class="inputbox" name="payment_class" value="<?php echo $row->payment_class;?>" />
       <?php echo JHTML::tooltip(_JSHOP_ALIAS_PAYMENT_INFO, _JSHOP_HINT);?>
     </td>
   </tr>
   <?php if ($this->config->tax){?>
   <tr>
     <td class="key">
       <?php echo _JSHOP_SELECT_TAX;?>*
     </td>
     <td>
       <?php echo $lists['tax'];?>
     </td>
   </tr>   
   <?php }?>
   <tr>
     <td class="key">
       <?php echo _JSHOP_PRICE;?>
     </td>
     <td>
       <input type="text" class="inputbox" name="price" value="<?php echo $row->price;?>" />
       <?php echo $lists['price_type'];?>
     </td>
   </tr>
   <tr>
     <td class="key">
       <?php echo _JSHOP_IMAGE_URL;?>
     </td>
     <td>
       <input type="text" class="inputbox" name="image" value="<?php echo $row->image;?>" />
     </td>
   </tr>
   <?php
   foreach($this->languages as $lang){
   $field="description_".$lang->language;
   ?>
   <tr>
     <td class="key">
       <?php echo _JSHOP_DESCRIPTION; ?> <?php if ($this->multilang) print "(".$lang->lang.")";?>
     </td>
     <td>
       <?php                 
         $editor=JFactory::getEditor();
         print $editor->display("description".$lang->id,  $row->$field , '100%', '350', '75', '20' ) ;
       ?>
     </td>
   </tr>
   <?php }?>
   <tr>
     <td class="key">
       <?php echo _JSHOP_SHOW_DESCR_IN_EMAIL;?>
     </td>
     <td>
       <input type="checkbox" name="show_descr_in_email" value="1" <?php if ($row->show_descr_in_email) echo 'checked="checked"'?> />
     </td>
   </tr>
   <?php $pkey="etemplatevar";if ($this->$pkey){print $this->$pkey;}?> 
 </table>
</fieldset>
</div>
<div class="clr"></div>
</div>
<div id="second-tab" class="tab-pane">
<?php
	if ($lists['html']!=""){	   	
	   	echo $lists['html'];	  	
  	}   	
?>
</div>
</div>
<input type="hidden" name="task" value="" />
<input type="hidden" name="payment_id" value="<?php echo $row->payment_id?>" />
</form>
</div>