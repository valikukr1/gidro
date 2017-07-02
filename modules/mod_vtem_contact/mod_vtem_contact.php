<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document =& JFactory::getDocument();	
$document->addStyleSheet(JURI::root().'modules/mod_vtem_contact/assets/style.css');

if($params->get('enable_anti_spam') == 1){
$document->addScript(JURI::root().'modules/mod_vtem_contact/assets/captcha.js');
$vtonsubmit = 'onsubmit="return checkform(this, code)"';
$vtcaptcharhtml = '<tr><td colspan="2">' . $params->get('text_antispam') . '</td></tr>
<tr><td valign="top" width="80px">
<script type="text/javascript">
document.write("<span class=\'vt_captcha\'>"+ a + " + " + b +"</span>");
</script>
</td><td align="left">
<input type="input" name="input" class="vt_inputbox" style="width:80px;" />
</td></tr>' . "\n";
}else{
$vtonsubmit = $vtcaptcharhtml = '';
}

//Form Parameters
$recipient = $params->get('email_recipient', 'email@gmail.com');
$fromName = $params->get('from_name', 'VTEM Contact');
$fromEmail = $params->get('from_email', 'contact@gmail.com');
$width = $params->get('width', '250px');
$require_name = $params->get('require_name') ? " required" : "";
$require_mail = $params->get('require_mail') ? " required validate-email" : "";
$require_subject = $params->get('require_subject') ? " required" : "";
$require_mess = $params->get('require_mess') ? " required" : "";
$NameLabel = $params->get('name_label', 'Name:');
$EmailLabel = $params->get('email_label', 'Email:');
$SubjectLabel = $params->get('subject_label', 'Subject:');
$MessageLabel = $params->get('message_label', 'Message:');
$buttonText = $params->get('button_text', 'Send Message');
$pageText = $params->get('page_text', 'Thank you for your contact.');
$errorText = $params->get('error_text', 'Your message could not be sent. Please try again.');
$pre_text = $params->get('pre_text', '');
$mod_class_suffix = $params->get('moduleclass_sfx', '');
$url = $_SERVER['REQUEST_URI'];
$url = htmlentities($url, ENT_COMPAT, "UTF-8");

if (isset($_POST["vtem_email"])) {
    $lsUserName = $_POST["vtem_name"];
    $lsSubject = $_POST["vtem_subject"];
	$lsUserEmail = $_POST["vtem_email"];
    $lsMessage = $_POST["vtem_message"];
	$lsBody = 'The following user has entered a message:'."\n";
	$lsBody .= "Name: $lsUserName" . "\n";
	$lsBody .= "Email: $lsUserEmail" . "\n";
    $lsBody .= "Message: " . "\n";
	$lsBody .= $lsMessage . "\n\n";
	$lsBody .= "---------------------------" . "\n";
		
    $mailSender = &JFactory::getMailer();
    $mailSender->addRecipient($recipient);
    $mailSender->setSender(array($fromEmail,$fromName));
    $mailSender->addReplyTo(array( $_POST["vtem_email"], '' ));
    $mailSender->setSubject($lsSubject);
    $mailSender->setBody($lsBody);

    if ($mailSender->Send() !== true) {
      echo '<span style="color:#c00;font-weight:bold;">' . $errorText . '</span>';
      return true;
    }
    else {
      echo '<span style="font-weight:bold;">' . $pageText . '</span>';
      return true;
    }
} // end if posted
JHTML::_('behavior.formvalidation');
print '<div id="vtemcontact1" class="vtem-contact-form vtem_contact ' . $mod_class_suffix . '">
       <form name="vtemailForm" id="vtemailForm" action="' . $url . '" method="post" class="form-validate" '.$vtonsubmit.'>' . "\n" .
      '<div class="vtem_contact_intro_text">'.$pre_text.'</div>' . "\n";
print '<table border="0">';
print '<tr><td colspan="2">' . $NameLabel . '<br/><input class="vt_inputbox'.$require_name.'" style="width:'.$width.'" type="text" name="vtem_name"/></td></tr>' . "\n";
// print email input
print '<tr><td colspan="2">' . $EmailLabel . '<br/><input class="vt_inputbox'.$require_mail.'" type="text" name="vtem_email" style="width:'.$width.'"/></td></tr>' . "\n";
// print subject input
print '<tr><td colspan="2">' . $SubjectLabel . '<br/><input class="vt_inputbox'.$require_subject.'" type="text" name="vtem_subject" style="width:'.$width.'"/></td></tr>' . "\n";
// print message input
print '<tr><td valign="top" colspan="2">' . $MessageLabel . '<br/><textarea class="vt_inputbox'.$require_mess.'" name="vtem_message" cols="35" rows="5" style="width:'.$width.'"></textarea></td></tr>' . "\n";
print $vtcaptcharhtml;
// print button
print '<tr><td colspan="2"><input name="vtbutton" id="vtbutton" class="vtem_contact_button validate" type="submit" value="' . $buttonText . '"/></td></tr></table></form></div>' . "\n";
