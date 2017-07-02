<?php
//  @copyright	Copyright (C) 2012 IceTheme. All Rights Reserved
//  @license	Copyrighted Commercial Software 
//  @author     IceTheme (icetheme.com)

// No direct access.
defined('_JEXEC') or die;


//////////////////////////////////////  CSS  //////////////////////////////////////

// Twitter bootstrap
$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/bootstrap/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/font-awesome/css/font-awesome.min.css');

if ($this->params->get('responsive_template')) {
	$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/bootstrap/css/bootstrap-responsive.min.css');
} 

// CSS by IceTheme for this Tempalte
$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/css/joomla.css');
$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/css/modules.css');
$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/css/general.css');
$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/css/pages.css');
$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/css/iceiproperty.css');

if ($this->params->get('responsive_template')) { 
$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/css/responsive.css');}

?>
<style type="text/css" media="screen">

/* Hide Content From HOMEPAGE */
<?php if($this->params->get('homepage_content')) {
$menu = $app->getMenu();
$lang = JFactory::getLanguage();
if ($menu->getActive() == $menu->getDefault($lang->getTag())) {  ?>
#content { display:none;}
<?php }} ?>


/* Equal Column Sidebar to left */

<?php  if($this->params->get('sidebar_position') == 'left') {  ?>

#middlecol { float:right !important;}
#middlecol:after { left:-400px !important; right:auto !important;}
#sidebar:after { left:400px !important; right:auto !important;}

@media (max-width: 1200px) {	
#middlecol:after { left:-320px !important; right:auto !important;}
#sidebar:after { left:320px !important; right:auto !important;}
}
@media (max-width: 979px) {	
#middlecol:after { left:-248px !important; right:auto !important;}
#sidebar:after { left:248px !important; right:auto !important;}
}

<?php if ($this->params->get('responsive_template') == 0) { ?>
#middlecol:after { left:-320px !important; right:auto !important;}
#sidebar:after { left:320px !important; right:auto !important;}
<?php } ?>

<?php } ?>

<?php if ($this->countModules('sidebar') == 0) { ?>	
#middlecol:after { display:none !important; }
<?php } ?>

<?php if ($this->countModules('iceslideshow') == 0) { ?>	
#header { height:142px}
@media (max-width: 979px) {
#header { height:auto}
#header .icemegamenu { margin-bottom:0}
}

<?php } ?>

<?php if (!$this->countModules('footer1 + footer2 + footer3 + footer4')) { ?>
#copyright_area { padding-top:0; border-top:none}
<?php } ?> 
 
 
/* IE10-only styles go here */  
.ie10 ul#ice-switcher {
	padding-right:20px;}  
	.ie10 ul#ice-switcher:hover {
		padding-right:35px}



/* Custom CSS code throught paramters */
<?php echo $this->params->get('custom_css_code'); ?>
</style>


<!-- Template Styles  -->
<?php  if ($this->params->get('enable_template_style') !=1) { ?>
<link id="stylesheet" rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/styles/<?php echo $templatestyle; ?>.css" />
<?php } ?>

<?php  if ($this->params->get('responsive_template')) { ?>
<!-- Resposnive Template Styles -->
<link id="stylesheet-responsive" rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/styles/<?php echo $templatestyle; ?>_responsive.css" />

<?php } ?>


<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Droid+Sans' rel='stylesheet' type='text/css'>

<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie8.css" />
<![endif]-->

<!--[if lt IE 9]>
    <script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
<![endif]-->


<!--[if !IE]><!-->
<script>  
if(Function('/*@cc_on return document.documentMode===10@*/')()){
    document.documentElement.className+=' ie10';
}
</script>
<!--<![endif]-->  

