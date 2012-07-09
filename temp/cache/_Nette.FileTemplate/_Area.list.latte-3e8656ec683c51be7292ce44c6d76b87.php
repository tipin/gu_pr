<?php //netteCache[01]000373a:2:{s:4:"time";s:21:"0.87956000 1340821356";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:51:"C:\wamp\www\Guidebook\app\templates\Area\list.latte";i:2;i:1340821353;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\wamp\www\Guidebook\app\templates\Area\list.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'iql7lbygop')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbd699a2d1e1_content')) { function _lbd699a2d1e1_content($_l, $_args) { extract($_args)
?>  <div id="nav1">
   <ul>
    <li class="<?php try { $_presenter->link("Area:list", array('rock')); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("list", array('rock'))) ?>
">Skalní oblasti</a></li>
    <li class="<?php try { $_presenter->link("Area:list", array('boulder')); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("list", array('boulder'))) ?>
">Boulder oblasti</a></li>
    <li class="<?php try { $_presenter->link("Area:list", array('wall')); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("list", array('wall'))) ?>
">Umělé lezecké stěny</a></li>
    <li class="<?php try { $_presenter->link("Area:list", array('wal')); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("list", array('wall'))) ?>
">Zimní lezení</a></li>
   </ul>
  </div>
  <div id="nav0"></div>
</div>
<div id="section">
<h2><?php try { $_presenter->link("Area:list", array('rock')); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
Sklalní oblasti<?php else: try { $_presenter->link("Area:list", array('boulder')); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
Boulder oblasti<?php else: ?>Umělé lezecké stěny<?php endif ;endif ?></h2>
<?php if ($areas): ?>
<table id="areas">
    <tr class="thead">
        <th class="rank"><a href="http://skaly.horosvaz.cz/aktualita/hvezdicky.asp" onclick="window.open(this.href);return false;" >Rank</a></th>
        <th style="width: 30%">Název oblasti</th>
        <th style="width: 20%">Materiál</th>
        <th style="width: 20%">Počet cest</th>
        <th style="width: 30%">Popis</th>
    </tr>
<?php $iterations = 0; foreach ($areas as $area): ?>
   <tr>
        <td class="rank"><a href="Area:view $area->id"><img src="<?php echo htmlSpecialChars($basePath) ?>
/img/star_<?php echo htmlSpecialChars($area->rank) ?>.png" alt="<?php echo htmlSpecialChars($area->rank) ?> hvězdy" /></a></td>
        <td> <a href="<?php echo htmlSpecialChars($_control->link("Area:view", array($area->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($area->name, ENT_NOQUOTES) ?></a></td>
        <td> <a href="<?php echo htmlSpecialChars($_control->link("Area:view", array($area->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($area->material->name, ENT_NOQUOTES) ?></a></td>
        <td> <a href="<?php echo htmlSpecialChars($_control->link("Area:view", array($area->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($area->related('route')->count(), ENT_NOQUOTES) ?></a></td>
        <td> <a href="<?php echo htmlSpecialChars($_control->link("Area:view", array($area->id))) ?>
"><?php if ($area->winter): ?>ano<?php else: ?>ne<?php endif ?></a></td>
    </tr>
<?php $iterations++; endforeach ?>
</table>

<?php else: ?>
<p>Nemáme tu žádné oblasti, kde by sis mohl(a) zalozit.</p>
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
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 