<?php 
/**
* @version      4.3.1 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
?>
<table width="100%" style="background: #EBF0F3;border-radius:10px;">
<tr>
 <td width="50%" valign="top" style="padding:10px;">
    <p style="margin-top:0px;">Anschrift und andere Angaben zum Unternehmen:<br>
    <br>
    <strong>MAXX<em>
    marketing GmbH</em>
    </strong>
    <br>Englschalkinger Str. 224<br>
    D-81927 München<br><br>
    Tel: +49 (0)89 - 929286-0<br>
    Fax:+49 (0)89 - 929286-75<br>
    eMail: <strong>
    <a class="link" href="mailto:info@joomshopping.com">info@joomshopping.com</a>
    </strong><br><br>
    </p>
    <p><strong>Steueridentifikationsnummer:<br></strong>
    DE221510498<br><br>
    <strong>Umsatzsteuer Nummer:<br></strong>
    143/160/40099
    <br><br>
    </p>
    <p><strong>Geschaftsfuhrer:</strong> 
    <br>Klaus Huber</p>
 </td>
 <td valign="top" style="padding:10px;">
    <div style="padding-left:5px;padding-bottom:30px;">
        <div><img src="components/com_jshopping/images/jshop_logo.jpg" /></div>
        <div style="padding-top:5px;padding-left:5px;font-size:14px;"><?php if (isset($this->data['version'])){?><b>Version <?php print $this->data['version'];}?></b></div>
		<?php if (isset($this->update->text) && $this->update->text && $this->update->link) { ?>
		<div style="padding-left:5px;padding-top:4px;">
			<a href="<?php echo $this->update->link;?>" target="_blank"><?php echo $this->update->text;?></a>
		</div>
		<?php } ?>
    </div>
    <div style="padding-bottom:5px;">
        <img src="components/com_jshopping/images/at.png" align="left" border="0" style="margin-right:10px;">
        <div><b>Web. <a href="http://www.joomshopping.com/" target="_blank" style="color:#000;">www.joomshopping.com</a></b>
        <br><b><a href="mailto:info@joomshopping.com">info@joomshopping.com</a></b></div>
        <br>
    </div>
    <div style="padding-left:4px;padding-bottom:15px;">
        <img src="components/com_jshopping/images/info.png" align="left" border="0" style="margin-right:15px;">
        <div style="padding-top:2px;"><a href="http://www.webdesigner-profi.de/joomla-webdesign/joomla-shop/forum.html" target="_blank" style="color:#000;"><b>Hilfe / Support</b></a></div>
        <br>
    </div>
    <div style="padding-left:4px;">
        <table cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top" style="padding:0px"><img src="components/com_jshopping/images/shop.png" align="left" border="0" style="margin-right:8px;"></td>
        <td style="padding:0px"><div style="padding-top:2px;">
        <?php print _JSHOP_JS_BUY_EXTENSIONS;?>
        </div>
        </td>
        </tr>
        </table>
        <br>
    </div>
 </td>
</table>