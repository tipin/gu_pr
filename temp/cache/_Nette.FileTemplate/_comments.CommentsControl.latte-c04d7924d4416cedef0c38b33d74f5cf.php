<?php //netteCache[01]000389a:2:{s:4:"time";s:21:"0.29573800 1340702975";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:67:"C:\wamp\www\Guidebook\app\components\comments\CommentsControl.latte";i:2;i:1340234266;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\wamp\www\Guidebook\app\components\comments\CommentsControl.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 's8i0q2yor7')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<div id="comments">  
<?php $iterations = 0; foreach ($flashes as $flash): ?>    <div class="flash <?php echo htmlSpecialChars($flash->type) ?>">
        <?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?>

    </div> 
<?php $iterations++; endforeach ;$iterations = 0; foreach ($comments as $comment): ?>
    <div class="comment" id="comment-<?php echo htmlSpecialChars($comment->id) ?>">
        <?php echo Nette\Templating\Helpers::escapeHtml($comment->username, ENT_NOQUOTES) ?>

<?php if ($comment->user_id): ?>        <span> - <?php echo Nette\Templating\Helpers::escapeHtml($comment->user->email, ENT_NOQUOTES) ?>
</span><?php endif ?>
 - <?php echo Nette\Templating\Helpers::escapeHtml($template->date($comment->posted, '%H:%M %d.%m.%Y'), ENT_NOQUOTES) ?><br />
        <?php echo Nette\Templating\Helpers::escapeHtml($comment->text, ENT_NOQUOTES) ?><br /><br />
    </div>
<?php $iterations++; endforeach ?>
    
<?php $_ctrl = $_control->getComponent("addCommentForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
</div>