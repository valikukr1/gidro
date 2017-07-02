<?php
// © IceTheme 2013
// GNU General Public License


defined('_JEXEC') or die;

// A code to show the offline.php page for the demo
if (JRequest::getCmd("tmpl", "index") == "offline") {
    if (is_file(JPATH_ROOT . "/templates/" . $this->template . "/offline.php")) {
        require_once(JPATH_ROOT . "/templates/" . $this->template . "/offline.php");
    } else {
        if (is_file(JPATH_ROOT . "/templates/system/offline.php")) {
            require_once(JPATH_ROOT . "/templates/system/offline.php");
        }
    }
} else {
  
// Include Variables
include_once(JPATH_ROOT . "/templates/" . $this->template . '/icetools/vars.php');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<?php if ($this->params->get('responsive_template')) { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php } ?>
  
<jdoc:include type="head" />

  <?php
    // Include CSS and JS variables 
    include_once(JPATH_ROOT . "/templates/" . $this->template . '/icetools/css.php');
    ?>

</head>

<body class="<?php echo $pageclass->get('pageclass_sfx'); ?>">


<?php if ($this->params->get('styleswitcher')) { ?>
<ul id="ice-switcher">  
    <li class= "style1"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style1"><span>Style 1</span></a></li>  
    <li class= "style2"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style2"><span>Style 2</span></a></li> 
    <li class= "style3"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style3"><span>Style 3</span></a></li> 
    <li class= "style4"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style4"><span>Style 4</span></a></li> 
    <li class= "style5"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style5"><span>Style 5</span></a></li>  
    <li class= "style6"><a href="templates/<?php echo $this->template;?>/css/styles/style-switcher.php?templatestyle=style6"><span>Style 6</span></a></li>  
</ul> 
<?php } ?>


 
<!-- top bar --> 
<div id="topbar" class="clearfix">

    <div class="container">
        
            <?php if ($this->countModules('statistics')) { ?>
            <!-- statistics --> 
            <div id="statistics">  
                 <jdoc:include type="modules" name="statistics" />
            </div><!-- statistics --> 
            <?php } ?> 
            
                       
            <?php if 
            ($this->params->get('social_icon_fb') or  
            $this->params->get('social_icon_tw') or
            $this->params->get('googleplus') or
            $this->params->get('rss_feed') or
            $this->params->get('social_icon_yt')) 
            { ?>
            <div id="social_icons">
                <ul>
                    <?php if($this->params->get('social_icon_fb')) { ?>
                    <li class="social_facebook">
                    <a target="_blank" rel="tooltip" data-placement="bottom" title="" data-original-title="<?php echo JText::_('SOCIAL_FACEBOOK_TITLE'); ?>" href="http://www.facebook.com/<?php echo $social_fb_user; ?>"><span>Facebook</span></a>      
                    </li>        
                    <?php } ?>  
                    
                    <?php if($this->params->get('social_icon_tw')) { ?>
                    <li class="social_twitter">
                    <a target="_blank" rel="tooltip" data-placement="bottom" title="" data-original-title="<?php echo JText::_('SOCIAL_TWITTER_TITLE'); ?>" href="http://www.twitter.com/<?php echo $social_tw_user; ?>" ><span>Twitter</span></a>
                    </li>
                    <?php } ?>
                
                    <?php if($this->params->get('rss_feed')) { ?>
                    <li class="social_rss_feed">
                    <a target="_blank" rel="tooltip" data-placement="bottom" title="" data-original-title="<?php echo JText::_('SOCIAL_RSS_TITLE'); ?>" href="<?php echo $rss_feed_url; ?>"><span>RSS Feed</span></a>
                    </li>        
                    <?php } ?>
                </ul>
                
            </div>
            <?php } ?>
            
            <?php if ($this->countModules('topmenu')) { ?>
            <!-- topmenu --> 
            <div id="topmenu">
                <jdoc:include type="modules" name="topmenu" />
            </div><!-- /topmenu --> 
            <?php } ?>
            
            <?php if ($this->countModules('language')) { ?>
            <!-- language --> 
            <div id="language">  
                 <jdoc:include type="modules" name="language" />
            </div><!-- language --> 
            <?php } ?> 
                        
    </div>
    
</div><!-- /top bar --> 


<!-- header -->
<header id="header">

    <div class="container">

        <div id="logo">  
        <p><a href="<?php echo $this->baseurl ?>"><?php echo $logo; ?></a></p>  
        </div>
      
        <jdoc:include type="modules" name="mainmenu" />
        
    </div>

</header><!-- /header -->   


<!-- slideshow -->
<?php if ($this->countModules('iceslideshow')) { ?>
<div id="iceslideshow">
   
  <div class="container">
  
    <jdoc:include type="modules" name="iceslideshow" />
  
  </div>
   
</div>
<?php } ?>
<!-- /slideshow -->


<!-- iproperty search -->
<?php if ($this->countModules('ip_search')) { ?>
<div id="ip_search">

  <div class="container">
  
       <jdoc:include type="modules" name="ip_search" style="block"/>
       
  </div>
  
</div>
<?php } ?>
<!-- /iproperty search -->



    
<!-- promo --> 
<?php if ($this->countModules('promo1 + promo2 + promo3 + promo4')) { ?>
<section id="promo">

    <div class="container">
    
        <div class="row">
        
            <?php if ($this->countModules('promo1')) { ?>
            <div class="<?php echo $promospan;?> promo">  
                <jdoc:include type="modules" name="promo1" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('promo2')) { ?>
            <div class="<?php echo $promospan;?> promo">  
                <jdoc:include type="modules" name="promo2" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('promo3')) { ?>
            <div class="<?php echo $promospan;?> promo">  
                <jdoc:include type="modules" name="promo3" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('promo4')) { ?>
            <div class="<?php echo $promospan;?> promo">  
                <jdoc:include type="modules" name="promo4" style="block" />
            </div> 
            <?php } ?>
        
        </div>      
         
    </div> 
    
</section>
 <?php } ?>
<!-- /promo --> 


<!-- content -->
<section id="content">
    
    <div class="container">
    
        <div class="row">
        
            <!-- Middle Col -->
            <div id="middlecol" class="<?php echo $content_span;?>">
            
                <div class="inside">
                
                <?php if ($this->countModules('breadcrumbs')) { ?>
                   <!-- breadcrumbs -->
                <div id="breadcrumbs" class="clearfix">
                    <jdoc:include type="modules" name="breadcrumbs" />
                </div><!-- /breadcrumbs -->
                <?php } ?>            
                
                <jdoc:include type="message" />
                <jdoc:include type="component" />
                
                </div>
            
            </div><!-- / Middle Col  -->
            
            
            <?php if ($this->countModules('sidebar')) { ?>      
            <!-- sidebar -->
            <aside id="sidebar" class="span4 <?php if($this->params->get('sidebar_position') == 'left') {  echo $sidebar_left; } ?>" >
                <div class="inside">
                
                    <jdoc:include type="modules" name="sidebar" style="sidebar" />
                
                </div>
            
            </aside>
            <!-- /sidebar -->
           <?php } ?>
            
        </div>
    
    </div>

</section><!-- /content -->


<!-- bottom --> 
<?php if ($this->countModules('bottom1 + bottom2 + bottom3 + bottom4 + icecarousel')) { ?>
<section id="bottom">

    <div class="container">
      
        <?php if ($this->countModules('icecarousel')) { ?>
        <div id="icecarousel"> 
            <jdoc:include type="modules" name="icecarousel" style="slider" />
        </div>   
        <?php } ?>
    
      <?php if ($this->countModules('bottom1 + bottom2 + bottom3 + bottom4')) { ?>
        <div class="row">
        
            <?php if ($this->countModules('bottom1')) { ?>
            <div class="<?php echo $bottomspan;?>">  
                <jdoc:include type="modules" name="bottom1" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('bottom2')) { ?>
            <div class="<?php echo $bottomspan;?>">  
                <jdoc:include type="modules" name="bottom2" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('bottom3')) { ?>
            <div class="<?php echo $bottomspan;?>">  
                <jdoc:include type="modules" name="bottom3" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('bottom4')) { ?>
            <div class="<?php echo $bottomspan;?>">  
                <jdoc:include type="modules" name="bottom4" style="block" />
            </div> 
            <?php } ?>
            
        </div>  
        <?php } ?> 
    
    </div>
  
</section><!-- /bottom --> 
<?php } ?>


<!-- banner --> 
<?php if ($this->countModules('banner1 + banner2 + banner3')) { ?>
<section id="banner">

    <div class="container">
    
        <div class="row">
        
            <?php if ($this->countModules('banner1')) { ?>
            <div class="<?php echo $bannerspan;?> banner">  
                <jdoc:include type="modules" name="banner1" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('banner2')) { ?>
            <div class="<?php echo $bannerspan;?> banner">  
                <jdoc:include type="modules" name="banner2" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('banner3')) { ?>
            <div class="<?php echo $bannerspan;?> banner">  
                <jdoc:include type="modules" name="banner3" />
            </div> 
            <?php } ?>
        
        </div>      
         
    </div> 
    
</section>
 <?php } ?>
<!-- /banner --> 

    
<!-- Message -->
<?php if ($this->countModules('message')) { ?>
<section id="message">

    <div class="message_wraper">
    
        <div class="container">
        
            <jdoc:include type="modules" name="message" />
            
        </div>
     
    </div>
        
</section><!-- /message --> 
<?php } ?>
    
        
    
<!-- footer --> 

<footer id="footer">

    <div class="container">
      
        <?php if ($this->countModules('footer1 + footer2 + footer3 + footer4')) { ?>
        <div class="row">
        
            <?php if ($this->countModules('footer1')) { ?>
            <div class="<?php echo $footerspan;?>">  
            <jdoc:include type="modules" name="footer1" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('footer2')) { ?>
            <div class="<?php echo $footerspan;?>">  
            <jdoc:include type="modules" name="footer2" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('footer3')) { ?>
            <div class="<?php echo $footerspan;?>">  
            <jdoc:include type="modules" name="footer3" style="block" />
            </div> 
            <?php } ?>
            
            <?php if ($this->countModules('footer4')) { ?>
            <div class="<?php echo $footerspan;?>">  
            <jdoc:include type="modules" name="footer4" style="block" />
            </div> 
            <?php } ?>
        
        </div> 
        <?php } ?> 
                
        <!-- copyright -->
  
     
        <div id="copyright_area" class="clearfix">  
           
        
            <?php if ($this->countModules('copyrightmenu')) { ?>
            <div id="copyrightmenu">
            <jdoc:include type="modules" name="copyrightmenu" />
            </div>
            <?php } ?> 
          
          
          
          
           
            
            <p id="copyright">
            &copy; <?php echo date('Y');?> <?php echo $sitename; ?>
             
             <a href="http://repair.lviv.ua/">Просування та підтримка сайту</a> 
            </p>
                      
          
         
          
            <?php if($this->params->get('icelogo')) { ?>
            <p id="icelogo">
            <a href="http://www.icetheme.com" target="_blank" title="We would like to inform that this website is designed by IceTheme.com with the latest standards provied by the World Wide Web Consortium (W3C)"></a></p>
            <?php } ?> 
          
          
          
                
            <?php if ($this->params->get('go2top')) { ?>
            <a href="#" class="scrollup" style="display: inline; "><?php echo JText::_('TPL_TPL_FIELD_SCROLL'); ?></a>
            <?php } ?>
        
          
          
        </div><!-- copyright -->  
        
    
    </div>
   
</footer><!-- /footer --> 

 
  
  

  
  
  
  
    
<?php if ($this->params->get('styleswitcher')) { ?> 
<script type="text/javascript">  
jQuery.fn.styleSwitcher = function(){
  $(this).click(function(){
    loadStyleSheet(this);
    return false;
  });
  function loadStyleSheet(obj) {
    $('body').append('<div id="overlay" />');
    $('body').css({height:'100%'});
    $('#overlay')
      .fadeIn(500,function(){
        /* change the default style */
        $.get( obj.href+'&js',function(data){
          $('#stylesheet').attr('href','<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/styles/' + data + '.css');
          cssDummy.check(function(){
            $('#overlay').fadeOut(1000,function(){
              $(this).remove();
            });  
          });
        });
        /* change the responsive style */
        $.get( obj.href+'&js',function(data){
          $('#stylesheet-responsive').attr('href','<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/styles/' + data + '_responsive.css');
          
          cssDummy.check(function(){
            $('#overlay').fadeOut(1000,function(){
              $(this).remove();
            });  
          });
        });
      });
  }
  var cssDummy = {
    init: function(){
      $('<div id="dummy-element" style="display:none" />').appendTo('body');
    },
    check: function(callback) {
      if ($('#dummy-element').width()==2) callback();
      else setTimeout(function(){cssDummy.check(callback)}, 200);
    }
  }
  cssDummy.init();
}
  $('.ice-template-style a').styleSwitcher(); 
  $('#ice-switcher a').styleSwitcher(); 
</script>  
<?php } ?>

<?php if ($this->params->get('google_analytics')) { ?>
<!-- Google Analytics -->  
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', '<?php echo $this->params->get('analytics_code');; ?>']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58747509-1', 'auto');
  ga('send', 'pageview');

</script>
  
<!-- Google Analytics -->  
<?php } ?>
  

  

  
  
  <div align="center">
<table width="25%">
  <tr>
    
    
    
        <td>

      <!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t14.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet-->
<script type='text/javascript'><!--
var st24Date=(new Date()).getTime();
var st24Src='http://ua5.hit.stat24.com/_'+st24Date;
st24Src+='/script.js?id=';
st24Src+='zNg1jXySedTA7Xim4ckWeWaELVAN26bC.ZXPtIS.E4D.c7/l=11';
var st24Tg='<'+'scr'+'ipt type="text/javascript" src="';
document.writeln(st24Tg+st24Src+'"></'+'scr'+'ipt>');
//--></script>


      
</td>
    
    
    
  <td>



      <!-- begin of Top100 code -->

<script id="top100Counter" type="text/javascript" src="http://counter.rambler.ru/top100.jcn?3079971"></script>
<noscript>
<a href="http://top100.rambler.ru/navi/3079971/">
<img src="http://counter.rambler.ru/top100.cnt?3079971" alt="Rambler's Top100" border="0" />
</a>

</noscript>
<!-- end of Top100 code -->
  


    
        </td>
    
    
     <td>



  <!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ua/stat/?id=28005045&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/28005045/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: дані за сьогодні  (перегляди, візити та унікальні відвідувачі)" onclick="try{Ya.Metrika.informer({i:this,id:28005045,lang:'ua'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter28005045 = new Ya.Metrika({id:28005045,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/28005045" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  


    
        </td>


</tr>
</table>
  
</div>
  
  
  

</body>
</html>
<?php } ?>
