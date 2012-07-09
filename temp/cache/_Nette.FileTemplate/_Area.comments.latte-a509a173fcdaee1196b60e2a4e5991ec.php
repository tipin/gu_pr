<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.99189800 1341779448";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"C:\wamp\www\Guidebook\app\templates\Area\comments.latte";i:2;i:1341779443;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\wamp\www\Guidebook\app\templates\Area\comments.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 's558mnjr3c')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb9d5909352a_content')) { function _lb9d5909352a_content($_l, $_args) { extract($_args)
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
    <li class="<?php try { $_presenter->link("Area:list"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("list")) ?>
">Komentáře</a></li>
    <li class="<?php try { $_presenter->link("Area:list"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("list")) ?>
">Fotky</a></li>
   </ul>
  </div>
  <div id="nav0"></div>
</div>
<div id="section">

    <h2>Komentáře</h2>
    
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
?>


<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 