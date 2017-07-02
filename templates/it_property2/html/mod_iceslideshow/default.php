<?php
/**
 * IceSlideShow Extension for Joomla 1.6 By IceTheme
 * 
 * 
 * @copyright	Copyright (C) 2008 - 2011 IceTheme.com. All rights reserved.
 * @license		GNU General Public License version 2
 * 
 * @Website 	http://www.icetheme.com/Joomla-Extensions/iceslideshow.html
 * @Support 	http://www.icetheme.com/Forums/iceslideshow/
 *
 */
 

/* no direct access*/
defined('_JEXEC') or die;
?>
<div id="iceslideshow<?php echo $module->id;?>" class="iceslideshow carousel slide <?php echo $effect ;?>">
        <div class="carousel-inner">
			<?php
				foreach($list as $key=>$item){
					$activeclass = "";
					if($key == 0){
						$activeclass = "active";
					}
					?>
					<div class="item <?php echo $activeclass; ?>">
					
					<?php if ($params->get('link_titles') == 1) : ?>
						<a href="<?php echo $item->link; ?>">  	
						<?php if($item->mainImage): ?>
							<?php echo $item->mainImage; ?>
						<?php endif; ?>
						</a>
					 <?php
						else:
								 echo $item->mainImage;
						endif;
					  ?>	
						
						<?php if($params->get("display_caption", 1)): ?>	
						
							<div class="carousel-caption">
							
							  <h4>
							  <?php if ($params->get('link_titles') == 1) : ?>
								<a class="mod-iceslideshow-title" href="<?php echo $item->link; ?>">
								<?php echo $item->title; ?></a>
							  <?php
								else:
									echo $item->title;
								endif;
							  ?>
							  </h4>
                              
							<?php if ($params->get('show_description', 1)) : ?>
                              <div class="mod-description">

                                    <p><?php echo $item->displayIntrotext; ?></p>

                              </div>
                          <?php endif; ?>
                              
														  
							</div>
							
						<?php	endif; ?>
						
					  </div>
					<?php
				}
			?>
        </div><!-- .carousel-inner -->
		<?php if($params->get("display_arrows", 1)): ?>
			<!--  next and previous controls here
				  href values must reference the id for this carousel -->
             <div class="iceslideshow_arrow">
			  <a class="carousel-control left" href="#iceslideshow<?php echo $module->id;?>" data-slide="prev">&lsaquo;</a>
			  <a class="carousel-control right" href="#iceslideshow<?php echo $module->id;?>" data-slide="next">&rsaquo;</a>
              </div>
		<?php endif; ?>
</div><!-- .carousel -->
<!-- end carousel -->
