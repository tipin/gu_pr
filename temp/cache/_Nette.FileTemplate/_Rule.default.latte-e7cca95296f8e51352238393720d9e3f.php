<?php //netteCache[01]000376a:2:{s:4:"time";s:21:"0.36419900 1340815121";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:54:"C:\wamp\www\Guidebook\app\templates\Rule\default.latte";i:2;i:1340815109;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"eb558ae released on 2012-04-04";}}}?><?php

// source file: C:\wamp\www\Guidebook\app\templates\Rule\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'szjgd0ec8h')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb607add973c_content')) { function _lb607add973c_content($_l, $_args) { extract($_args)
?>  <div id="nav0"></div>
</div>
<div id="section">
  <div class="bl" style="padding-right: 3%; float: left;">
    <h2>Průvodce lezením v Jeseníkách a Rychlebských horách</h2>
    <p>Tento průvodce navazuje na dřívější průvodce: Horolezecké terény v okolí Jeseníku z roku 1970 sepsaným Ing. Bohumilem Hajzerou a Jiřím Jakubíčkem (nevyšlo tiskem), Cvičné skály na Moravě, vydaného nakladatelstvím Olympia Praha v roce 1988 a Jeseníky, horolezecký průvodce, sepsaný Jiřím Vogelem a vydaný v roce 1996. Je doplněn o nové terény a ostatní oblasti, které nemohly být ve výše uvedených průvodcích uvedeny. Současně jsou doplněny nové cesty a čisté přelezy v tradičních terénech. Klasifikace cest je hodnocena stupnicí UIAA a francouzskou stupnicí pro klasifikaci boulderů. U zimních cest mixovou klasifikací doplněnou o hodnocení dle Jasperovy klasifikační stupnice Emotions (E1-E6).</p>
    <p>Průvodce je pravidelně v průběhu roku doplňován a opravován. Pokud sami zjistíte nesrovnalosti, případně se vám podaří realizovat nový výstup, dejte nám prosím vědět.</p>
    <p>Jelikož požadavky a podmínky ochrany přírody se mění častěji než jsou vydávány horolezecké průvodce, uvádíme v průvodci všechny terény, na nichž se horolezectví v oblasti provozovalo. Každý horolezec je povinen seznámit se se současnými podmínkami provozování horolezectví, především v CHKOJ a na CHPV a dodržovat je.</p>
  </div>
  <div class="bl" style="float: right;">
    <p>Pravidla sportovního lezení na těchto terénech platí tak, jak byla uvedena v průvodci Olympia z roku 1988 s tím, že je větší důraz kladen na volné lezení, což ostatně vyplývá z klasifikace jednotlivých cest. Nástupy cest jsou zpravidla označeny šipkou nebo číslem.</p>
    <p>V bouldrových oblastech je zakázáno používat fixní jištění, případné použití vyjímatelných jistících prostředků je tolerováno. Pokud hákujete již volně přelezenou cestu (což je nesportovní), nepoužívejte k zajištění skoby, ale pouze vyjimatelné jistící prostředky.</p>
    <p>Největší problém oblasti je stav zajišťovacích prostředků, zejména skob. Vzhledem k tomu, že u většiny výstupů jsou původní ve stáří data prvovýstupu, lze za bezpečné považovat pouze cesty zajištěné kruhy a borháky. Apelujeme proto na všechny lezce, aby jištění věnovali mimořádnou pozornost, používali i jiné druhy zajištění a pokud je to v jejich možnostech zkorodované skoby nahradili vhodnějším zajištěním. U přejištěných oblastí již skoby nepoužívejte, opětovným zatloukáním a vytloukáním se ničí povrch skály.</p>
    <p>Dále upozorňujeme, že lezení je nebezpečný sport a autoři rovněž nezodpovídají za škody na zdraví a majetku způsobené používáním tohoto průvodce. </p>
    <p>Lukáš Abt, Ing. Bohumil Hajzera</p>
    <br />
    <a href='http://skaly.horosvaz.cz/4_ovk_index.asp?cmd=9'>Pravidla lezení v nepískovcových oblastech</a><br />
    <a href='http://skaly.horosvaz.cz/'>Skalní oblasti</a> 
  </div>
  <p>&nbsp;</p>
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