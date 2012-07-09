<?php //netteCache[01]000371a:2:{s:4:"time";s:21:"0.81571400 1341138071";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:49:"C:\wamp\www\Guidebook\app\templates\@layout.latte";i:2;i:1341138062;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\wamp\www\Guidebook\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'bxkrc9hq40')
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
<!DOCTYPE html>
<html lang="cs">
<head> 
 <meta charset="UTF-8" />
<?php if (isset($robots)): ?> <meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>
  <?php if (isset($_l->blocks["js"])): Nette\Latte\Macros\UIMacros::callBlock($_l, 'js', $template->getParameters()) ;endif ?>

  
 <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>

 <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/guidebook.css" type="text/css" />
 <link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/img/favicon.ico" />
 <title>Průvodce lezením na Jesenicku</title>
    
</head>
<body<?php try { $_presenter->link("Homepage:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
 onload="load();"<?php endif ?>>
    <div id="page">
        <div id="login">
<?php if ($user->isLoggedIn()): ?>
             <p>přihlášen: <a href="<?php echo htmlSpecialChars($_control->link("Account:")) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->username, ENT_NOQUOTES) ?>
</a></p> | <p><a href="<?php echo htmlSpecialChars($_control->link("Account:logout")) ?>
">Odhlásit se</a></p>
<?php else: ?>
             <p><a href="<?php echo htmlSpecialChars($_control->link("Account:login")) ?>
">příhlásit se</a></p>
<?php endif ?>
        </div>
        <div id="header">
<?php $iterations = 0; foreach ($flashes as $flash): ?>            <div class="flash <?php echo htmlSpecialChars($flash->type) ?>">
                <?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?>

            </div>
<?php $iterations++; endforeach ?>
            <h1><span style="font-size: 35pt">P</span>růvodce lezením na Jesenicku</h1>
        </div>
        <div id="nav">
         <div id="nav<?php try { $_presenter->link("Area:view"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
3<?php else: try { $_presenter->link("Area:list"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
2<?php else: try { $_presenter->link("Area:routes"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
3<?php else: ?>1<?php endif ;endif ;endif ?>">
          <ul>
            <li class="<?php try { $_presenter->link("Homepage:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: try { $_presenter->link("Account:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ;endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
">Mapa</a></li>
            <li class="<?php try { $_presenter->link("Rule:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("Rule:")) ?>
">Pravidla</a></li>
            <li class="<?php try { $_presenter->link("Area:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("Area:list", array('rock'))) ?>
">Lezecké oblasti</a></li>
            <li class="<?php try { $_presenter->link("Forum:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
open<?php else: ?>close<?php endif ?>"><a href="<?php echo htmlSpecialChars($_control->link("Forum:")) ?>
">Diskuze</a></li>
           </ul>
          </div>
             
        
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
        
        <div id="footer">
            <a href="http://www.javaanes.cz" onclick="window.open(this.href);return false;">&copy;&nbsp;JAVAANES</a>
        </div>
    </div>
     <div id="aside">     
   </div>  
</body>
</html>