<?php //netteCache[01]000375a:2:{s:4:"time";s:21:"0.48236900 1341779177";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:53:"C:\wamp\www\Guidebook\app\templates\Area\routes.latte";i:2;i:1341779173;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\wamp\www\Guidebook\app\templates\Area\routes.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'r7jq5jvyk5')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lb03e100418f_js')) { function _lb03e100418f_js($_l, $_args) { extract($_args)
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
if (!function_exists($_l->blocks['content'][] = '_lb4397d5565d_content')) { function _lb4397d5565d_content($_l, $_args) { extract($_args)
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

    <h2><?php echo Nette\Templating\Helpers::escapeHtml($area->name, ENT_NOQUOTES) ?></h2>

<?php if ($rocks->count() > 1): $iterations = 0; foreach ($rocks as $rock): ?>
<h3><?php echo Nette\Templating\Helpers::escapeHtml($rock->name_number, ENT_NOQUOTES) ?>
. <?php echo Nette\Templating\Helpers::escapeHtml($rock->name, ENT_NOQUOTES) ?></h3>
<?php if ($rock->description!=""): ?><p><?php echo Nette\Templating\Helpers::escapeHtml($rock->description, ENT_NOQUOTES) ?>
</p><?php endif ?>

<div class="routes">
<?php $iterations = 0; foreach ($rock->related('route')->order('order_number') as $route): ?>
    <p>
        <span class="rname"><?php echo Nette\Templating\Helpers::escapeHtml($route->name_number, ENT_NOQUOTES) ?>
. <?php echo Nette\Templating\Helpers::escapeHtml($route->name, ENT_NOQUOTES) ?> </span>
        <?php if ($route->fa_author!=""): ?><span class="rauthor">| <?php echo Nette\Templating\Helpers::escapeHtml($route->fa_author, ENT_NOQUOTES) ?>
</span><?php endif ?>

        <span class="rgrade"><?php echo Nette\Templating\Helpers::escapeHtml($route->grade_id, ENT_NOQUOTES) ?></span>
        <?php if ($route->description!=""): ?><br /><span class="rdescription"><?php echo Nette\Templating\Helpers::escapeHtml($route->description, ENT_NOQUOTES) ?>
</span><?php endif ?>

    </p>
<?php $iterations++; endforeach ?>
</div>
<?php $iterations++; endforeach ?>

<?php else: ?>
<p>Oblast zatím neobsahuje žádné cesty.</p>
<?php endif ?>

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