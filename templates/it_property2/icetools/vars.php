<?php
//  © IceTheme 2013

// No direct access.
defined('_JEXEC') or die;

$document = &JFactory::getDocument();

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add current user information
$user = JFactory::getUser();

// Add pageclass from menu item
$pageclass =  & $app->getParams('com_content');

// Add sidebar class to left 
if($this->params->get('sidebar_position') == 'left') {
$sidebar_left = 'sidebar_left';	
}

// Unset JS
unset($this->_scripts[JURI::root(true).'/media/jui/js/bootstrap.min.js']);
unset($this->_scripts[JURI::root(true).'/media/jui/js/jquery-noconflict.js']);

// Load Bootstrap JS
$document->addScript('templates/' . $this->template . '/bootstrap/js/bootstrap.min.js');

if ($this->countModules('iceslideshow')) { 
unset($this->_scripts[JURI::root(true).'/media/system/js/mootools-more.js']);
}

// Check If IceCarousel JS and if not exist add.

if ($this->countModules('icecarousel') == 0) { 
$document->addScript('templates/' . $this->template . '/js/jquery.flexslider-min.js');
$doc->addStyleSheet($this->baseurl. '/templates/' .$this->template. '/css/flexslider.css');
}


// Template Style 
if(!empty($_COOKIE['templatestyle'])) $templatestyle = $_COOKIE['templatestyle'];
else $templatestyle =  $this->params->get('TemplateStyle');

// Logo 
$logo = '<img src="'. JURI::root() . $this->params->get('logo') .'" alt="'. $sitename .'" />';

// Social - Facebook
$social_fb_user 	= $this->params->get('social_fb_user');

// Social - Twitter
$social_tw_user 	= $this->params->get('social_tw_user');

// Social - Youtube
$social_yt_user 	= $this->params->get('social_yt_user');

// Social - Google Plus
$googleplus_id 		= $this->params->get('googleplus_id');

// Social - RSS Feeed
$rss_feed_url 		= $this->params->get('rss_feed_url');


// Add JS to head
if ($this->params->get('go2top')) { 
$doc->addScriptDeclaration('
    $(document).ready(function(){ 
			
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$(\'.scrollup\').fadeIn();
				} else {
					$(\'.scrollup\').fadeOut();
				}
			}); 
			
			$(\'.scrollup\').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 600);
				return false;
			});
			
			$("[rel=\'tooltip\']").tooltip();
 
		});
');
}




// Layout Column width
if ($this->countModules('sidebar'))
{
	$content_span = "span8";
}
else
{
	$content_span = "span12";
}


// Adjusting promo width
if ($this->countModules('promo1 and promo2 and promo3 and promo4'))
{
	$promospan = "span3";
}
elseif ($this->countModules('promo1 and promo2 and promo3 or promo2 and promo3 and promo4 or promo1 and promo3 and promo4'))
{
	$promospan = "span4";
}
elseif ($this->countModules('promo1 and promo2 or promo1 and promo3 or promo1 and promo4 or promo2 and promo3 or promo2 and promo4 or promo3 and promo4'))
{
	$promospan = "span6";
}
else
{
	$promospan = "span12";
}

// Adjusting bottom width
if ($this->countModules('bottom1 and bottom2 and bottom3 and bottom4'))
{
	$bottomspan = "span3";
}
elseif ($this->countModules('bottom1 and bottom2 and bottom3 or bottom2 and bottom3 and bottom4 or bottom1 and bottom3 and bottom4 or bottom1 and bottom2 and bottom4'))
{
	$bottomspan = "span4";
}

elseif ($this->countModules('bottom1 and bottom2 or bottom1 and bottom3 or bottom1 and bottom4 or bottom2 and bottom3 or bottom2 and bottom4 or bottom3 and bottom4'))
{
	$bottomspan = "span6";
}
else
{
	$bottomspan = "span12";
}

// Adjusting banner width
if ($this->countModules('banner1 and banner2 and banner3'))
{
	$bannerspan = "span4";
}
elseif ($this->countModules('banner1 and banner2 or banner1 or banner3 or banner2 and banner3'))
{
	$bannerspan = "span6";
}
else
{
	$bannerspan = "span12";
}


// Adjusting footer width
if ($this->countModules('footer1 and footer2 and footer3 and footer4'))
{
	$footerspan = "span3";
}
elseif ($this->countModules('footer1 and footer2 and footer3 or footer2 and footer3 and footer4 or footer1 and footer3 and footer4 or footer1 and footer2 and footer4'))
{
	$footerspan = "span4";
}

elseif ($this->countModules('footer1 and footer2 or footer1 and footer3 or footer1 and footer4 or footer2 and footer3 or footer2 and footer4 or footer3 and footer4'))
{
	$footerspan = "span6";
}
else
{
	$footerspan = "span12";
}

?>