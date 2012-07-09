<?php //netteCache[01]000376a:2:{s:4:"time";s:21:"0.13599500 1340699886";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:54:"C:\wamp\www\Guidebook\app\templates\Area\default.latte";i:2;i:1338386162;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\wamp\www\Guidebook\app\templates\Area\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'itmutomuv0')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb248437e4ae_content')) { function _lb248437e4ae_content($_l, $_args) { extract($_args)
?><h1>Lezecké oblasti</h1>
<?php if ($areas): ?>
<table class="areas">
    <tr>
        <th>Název oblasti</th>
        <th>Hornina</th>
        <th>Zimní lezení</th>
    </tr>
<?php $iterations = 0; foreach ($areas as $area): ?>
    <tr>
        <td><a href="<?php echo htmlSpecialChars($_control->link("Area:view", array($area->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($area->name, ENT_NOQUOTES) ?></a></td>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($area->material->name, ENT_NOQUOTES) ?></td>
        <td><?php if ($area->winter): ?>ano<?php else: ?>ne<?php endif ?></td>
    </tr>
<?php $iterations++; endforeach ?>
</table>
<?php else: ?>
<p>Nemáme tu žádné oblasti, kde by sis mohl(a) zalozit.</p>
<?php endif ;
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