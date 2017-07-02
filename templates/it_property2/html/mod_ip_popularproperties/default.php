<?php
/**
 * @version 3.0 2013-04-05
 * @package Joomla
 * @subpackage Iproperty
 * @copyright (C) 2013 the Thinkery
 * @license see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

// Initialize variables
$usethumb           = $params->get('usethumb', 1);
$iplayout           = $params->get('iplayout', 'rows');
$rowspan            = ($iplayout == 'rows') ? 12 : (12 / $params->get('columns', '12'));
$moduleclass_sfx    = ($params->get('moduleclass_sfx')) ? ' '.htmlspecialchars($params->get('moduleclass_sfx')) : '';
?>

<div id="ip_carousel<?php echo $module->id;?>" class="ip_carousel">

    <div class="slides">
        
        <?php
        $colcount = 0;
        foreach($items as $item)
        {
            ?>
        <div class="ip-recentproperties-holder">
        
                <div class="ip-mod-thumb ip-recentproperties-thumb-holder">
                    <?php echo ipropertyHTML::getThumbnail($item->id, $item->proplink, $item->street_address, '', 'class="ip-recentproperties-thumb thumbnail"', '', $usethumb); ?>
                    <?php if($params->get('show_banners', 1)) echo $item->banner; ?>
                </div>
                
         
                <div class="ip-mod-desc ip-recentproperties-desc-holder span9">
                <a href="<?php echo $item->proplink; ?>" class="ip-mod-title">
                    <?php echo $item->street_address; ?>
                </a>
                <em>
                    <?php
                    if($item->city) echo $item->city;
                    if($item->locstate) echo ', '.ipropertyHTML::getStateName($item->locstate);
                    if($item->province) echo ', '.$item->province;
                    ?>
                </em>
                
                <?php if($item->short_description && $params->get('show_desc', 1)): ?>
                <p><?php echo ipropertyHTML::snippet($item->short_description, $params->get('preview_count', 200)) ?></p>
                <?php endif; ?>
                <div class="ip-mod-price"><?php echo $item->formattedprice; ?></div>
                
              </div>
            
        </div>
        <?php
        $colcount++;}
    ?>
    
    </div>
    
</div>


<script type="text/javascript">
// Can also be used with $(document).ready()

(function($) {
	$(window).load(function(){
		$('#ip_carousel<?php echo $module->id;?>').flexslider({
		selector: ".slides > div", 
		animation: "slide",
		direction: "horizontal",
		itemWidth:0,
		animationspeed:500,  
		itemMargin:0,
		minItems:1,
		maxItems:0,
		directionNav: false,
		move: 0,    
		slideshow: false,
		
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
   })(jQuery);

</script>