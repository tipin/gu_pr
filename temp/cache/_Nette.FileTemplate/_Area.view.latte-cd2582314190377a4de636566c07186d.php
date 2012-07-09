<?php //netteCache[01]000373a:2:{s:4:"time";s:21:"0.71064200 1341779483";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:51:"C:\wamp\www\Guidebook\app\templates\Area\view.latte";i:2;i:1341779443;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\wamp\www\Guidebook\app\templates\Area\view.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'hahipgoa66')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lb7ef2e0c1fa_js')) { function _lb7ef2e0c1fa_js($_l, $_args) { extract($_args)
?> <script type="text/javascript" src="http://api4.mapy.cz/loader.js"></script>
 <script type="text/javascript">Loader.load()</script>
 <script type="text/javascript">
  var lat = <?php echo Nette\Templating\Helpers::escapeJs($area->lat) ?>;
  var lng = <?php echo Nette\Templating\Helpers::escapeJs($area->lng) ?>;
  var area_name = <?php echo Nette\Templating\Helpers::escapeJs($area->name) ?>;
 </script>
 

<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbb38fd0dc04_content')) { function _lbb38fd0dc04_content($_l, $_args) { extract($_args)
?>  <div id="nav2">
   <ul>
    <li class="<?php if ($area->area_type=='rock'): ?>open<?php else: ?>close<?php endif ?>
"><a href="<?php echo htmlSpecialChars($_control->link("list", array('rock'))) ?>
">Skalní oblasti</a></li>
    <li class="<?php if ($area->area_type=='boulder'): ?>open<?php else: ?>close<?php endif ?>
"><a href="<?php echo htmlSpecialChars($_control->link("list", array('boulder'))) ?>
">Boulder oblasti</a></li>
    <li class="<?php if ($area->area_type=='wall'): ?>open<?php else: ?>close<?php endif ?>
"><a href="<?php echo htmlSpecialChars($_control->link("list", array('wall'))) ?>
">Umělé lezecké stěny</a></li>
    <li class="<?php if ($area->area_type=='wal'): ?>open<?php else: ?>close<?php endif ?>
"><a href="<?php echo htmlSpecialChars($_control->link("list", array('wall'))) ?>
">Zimní lezení</a></li>
   </ul>
  </div>
  <div id="nav1">
   <ul>
    <li class="<?php try { $_presenter->link("Area:view", array($area->id)); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("view", array($area->id))) ?>
">Popis</a></li>
    <li class="<?php try { $_presenter->link("Area:routes", array($area->id)); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("routes", array($area->id))) ?>
">Cesty</a></li>
    <li class="<?php try { $_presenter->link("Area:comments", array($area->id)); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("comments", array($area->id))) ?>
">Komentáře</a></li>
    <li class="<?php try { $_presenter->link("Area:list"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("list")) ?>
">Fotky</a></li>
   </ul>
  </div>
  <div id="nav0"></div>
</div>
<div id="section">
  <div class="bl" style="padding-right: 3%; float: left;">
    <h2><?php echo Nette\Templating\Helpers::escapeHtml($area->name, ENT_NOQUOTES) ?></h2>
    <p><strong>Popis | </strong><?php echo Nette\Templating\Helpers::escapeHtml($area->description, ENT_NOQUOTES) ?></p>
    <p><strong>Přístup | </strong><?php echo Nette\Templating\Helpers::escapeHtml($area->access, ENT_NOQUOTES) ?></p>
    <p><strong>Souřadnice GPS | </strong>N <?php echo Nette\Templating\Helpers::escapeHtml($area->lat, ENT_NOQUOTES) ?>
 E <?php echo Nette\Templating\Helpers::escapeHtml($area->lng, ENT_NOQUOTES) ?></p>
    <p><strong>Materiál | </strong>hornina</p>
    <p><strong>Pocet cest v oblasti | </strong><?php echo Nette\Templating\Helpers::escapeHtml($area->related('route')->count(), ENT_NOQUOTES) ?> </p>
  </div>
  <div class="bl" style="float: right;">
   <div id="maparea" style="width: 100%; height: 23em;"></div>
   <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/map_area.js"></script> 
  </div>
  <div class="articles">
  
    <h2>Články o oblasti</h2>

  </div>
</div>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['js']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 