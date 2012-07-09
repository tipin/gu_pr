<?php
include('db.incl.php');
	//začátek dokumentu
$dom =  new DOMDocument ("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
  die ('Nemohu se připojit. Zkontrolujte prosím připojení k serveru.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

// vyřešit where !! 
//if($_GET['skala']==1){$where[1]='obl_typ = "skala"';}
//if($_GET['boulder']==1){$where[2]='obl_typ = "boulder"';}
//if($_GET['stena']==1){$where[3]='obl_typ = "stena"';}
//if($_GET['led']==1){$where[4]='obl_typ = "led"';}
//if($_GET['skala']==1 && $_GET['boulder']==1){$where[2] = ' || ';}
//if($_GET['boulder']==1 && $_GET['stena']==1){$where[2] = ' || ';}
//if($_GET['stena']==1 && $_GET['led']==1){$where[2] = ' || ';}

$prazdne = 0;
switch($_GET['typ']){
  case '1111'; $where = 'obl_typ = "skala" || obl_typ = "boulder" || obl_typ = "stena" || obl_typ = "led"'; break;
  case '1110'; $where = 'obl_typ = "skala" || obl_typ = "boulder" || obl_typ = "stena"'; break;
  case '1100'; $where = 'obl_typ = "skala" || obl_typ = "boulder"'; break;
  case '1000'; $where = 'obl_typ = "skala"'; break;
  case '0000'; $prazdne = 1; break;
  case '0001'; $where = 'obl_typ = "led"'; break;
  case '0011'; $where = 'obl_typ = "stena" || obl_typ = "led"'; break;
  case '0111'; $where = 'obl_typ = "boulder" || obl_typ = "stena" || obl_typ = "led"'; break;
  case '0100'; $where = 'obl_typ = "boulder"'; break;
  case '0010'; $where = 'obl_typ = "stena"'; break;
  case '0110'; $where = 'obl_typ = "boulder" || obl_typ = "stena"'; break;
  case '1001'; $where = 'obl_typ = "skala" || obl_typ = "led"'; break;
  case '1010'; $where = 'obl_typ = "skala" || obl_typ = "stena"'; break;
  case '0101'; $where = 'obl_typ = "boulder" || obl_typ = "led"'; break;
  case '1011'; $where = 'obl_typ = "skala" || obl_typ = "stena" || obl_typ = "led"'; break;
  case '1101'; $where = 'obl_typ = "skala" || obl_typ = "boulder" || obl_typ = "led"'; break;

}

if($prazdne == 0){
  $query = 'SELECT * FROM pr_oblasti WHERE '.$where;
  $result = mysql_query($query, $db)or die(mysql_error($db));

  header('Content-type: text/xml');

  while ($row = mysql_fetch_assoc($result)){
	// vytvoření bodů
	$node = $dom->createElement("marker");
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute("name", $row['obl_jmeno']);
	$newnode->setAttribute("lat", $row['obl_lat']);
	$newnode->setAttribute("lng", $row['obl_lng']);
	$newnode->setAttribute("type", $row['obl_typ']);
	$newnode->setAttribute("popis", $row['obl_popis']);
	$newnode->setAttribute("id", $row['obl_id']);
  }
}

echo $dom->saveXML();


?>
