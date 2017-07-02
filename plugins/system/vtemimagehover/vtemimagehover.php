<?php
/**
* @Copyright Copyright (C) 2010 VTEM . All rights reserved.
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @link     	http://www.vtem.net
**/

defined('_JEXEC') or die( 'Restricted access' );
jimport('joomla.environment.response');
jimport('joomla.document.document');
jimport('joomla.plugin.helper');
jimport('joomla.plugin.plugin');
jimport('joomla.html');
jimport('joomla.application.module.helper');

class plgSystemVtemimagehover extends JPlugin {
    function plgSystemVtemimagehover(&$subject, $config) {
		parent::__construct($subject, $config);
		$this->mainframe = JFactory::getApplication();
	}

	public function onAfterDispatch() {
		if($this->mainframe->isAdmin()) {
			return;
		}
		$document = JFactory::getDocument();
        $document->addStyleSheet( JURI::root() . 'media/plg_vtemimagehover/css/style.css' );
		if($this->params->get("script") == 1){
		$document->addScript(JURI::root().'media/plg_vtemimagehover/js/jquery-1.7.2.min.js');
		}
		//$document->addScript(JURI::root().'media/plg_vtemimagehover/js/jquery.adipoli.min.js');
		//$document->addScript(JURI::root().'media/plg_vtemimagehover/js/jquery.lightbox-0.5.min.js');
	}
	
	public function onAfterRender() {
	  $body = JResponse::getBody();
	  if(!JString::strpos($body, 'vtemimagehover') || $this->mainframe->isAdmin()){
	    return;
	  }	
	  $regex = "#{vtemimagehover\s*(.*?)}#s";   
	  preg_match_all($regex, $body, $matches);
 	  if (!empty($matches[0])) {
 	    $this->_build($body, $matches);
 	    return true;
	  }
		return false;
	}

	private function _build( $body, $matches ){
	    for( $i = 0; $i < count($matches[0]); $i++ ){
			$tipParams = $matches[1][$i];
			$imagehover    = "";
			$startEffect = $this->_params( $tipParams, "startEffect", $this->params->get('startEffect', 'transparent'));
			$hoverEffect = $this->_params( $tipParams, "hoverEffect", $this->params->get('hoverEffect', 'normal'));
			$opacity = $this->_params( $tipParams, "opacity", $this->params->get('imageOpacity', 0.8));
			$duration = $this->_params( $tipParams, "duration", $this->params->get('animSpeed', 240));
			
			$float      = $this->_params( $tipParams, "float", false );
			$width = $this->_params( $tipParams, "width", false);
			$height = $this->_params( $tipParams, "height", false);
			$fillColor = $this->_params( $tipParams, "fillColor", false);
			$textColor = $this->_params( $tipParams, "textColor", false);
			$overlayText = $this->_params( $tipParams, "overlayText", false);
			$slices = $this->_params( $tipParams, "slices", false);
			$boxCols = $this->_params( $tipParams, "boxCols", false);
			$boxRows = $this->_params( $tipParams, "boxRows", false);
			$popOutShadow = $this->_params( $tipParams, "popOutShadow", false);
			
			$links      = trim(strip_tags($this->_params( $tipParams, "links", false )));
			$images      = trim(strip_tags($this->_params( $tipParams, "images", false )));
			$lightBox      = trim(strip_tags($this->_params( $tipParams, "lightBox", false )));
			$captions      = trim(strip_tags($this->_params( $tipParams, "captions", false )));
			
			if($images)
			    $images = explode(";", $images);
			
			$imagehover .='<div id="vtemimagehover'.(int)$i.'">
			<script type="text/javascript" src="'.JURI::root().'media/plg_vtemimagehover/js/jquery.adipoli.min.js"></script>
			<script type="text/javascript" src="'.JURI::root().'media/plg_vtemimagehover/js/jquery.lightbox-0.5.min.js"></script>';
			foreach($images as $key => $img) {
				  $vtlinks = explode(";", $links);
				  $vtlink = (isset($vtlinks[$key])) ? $vtlinks[$key] : '';	
				  $vtcaptions = explode(";", $captions);
				  $vtcaption = (isset($vtcaptions[$key])) ? $vtcaptions[$key] : '';	
  			      $imagehover .='<a class="vtemhover-link" href="'.trim($vtlink).'" title="'.$vtcaption.'" style="'.($float ? 'float:'.$float.';' : '').'">
						          <img class="vtemhover" src="'.trim($img).'" alt="'.$vtcaption.'" style="'.($width ? 'width:'.$width.'px;' : '').($height ? 'width:'.$height.'px;' : '').'"/>
						 </a>';
			}
			$imagehover .= '<script type="text/javascript">
						 jQuery(document).ready(function(){
							 var options = {
								    "startEffect": "'.$startEffect.'",
									"hoverEffect": "'.$hoverEffect.'",  
									"animSpeed":   '.$duration.', 
									"imageOpacity":    '.$opacity.($fillColor ? ',"fillColor": "'.$fillColor.'"' : '').($textColor ? ',"textColor": "'.$textColor.'"' : '').($overlayText ? ',"overlayText": "'.$overlayText.'"' : '').($slices ? ',"slices": "'.$slices.'"' : '').($boxCols ? ',"boxCols": "'.$boxCols.'"' : '').($boxRows ? ',"boxRows": "'.$boxRows.'"' : '').($popOutShadow ? ',"popOutShadow": "'.$popOutShadow.'"' : '').'
								 };
						     jQuery("#vtemimagehover'.(int)$i.' .vtemhover").adipoli(options);';
							 if($lightBox)
							   $imagehover .= 'jQuery("#vtemimagehover'.(int)$i.' a").lightBox();';
			$imagehover .= '});</script></div>';
						
			$body = str_replace($matches[0][$i], $imagehover, $body);
		}
		JResponse::setBody($body);
    }
	private function _params( $TipParams, $param, $default = false ){
		$regex = "/". $param ."=(\s*\[.*?\])/s";
		preg_match_all( $regex, $TipParams, $options );
		$value = !empty($options[1][0]) ? JString::trim( $options[1][0], '[]' ) : trim($default);
		return $value;
	}
}

