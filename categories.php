<?
header('Content-Type: application/json');
include_once('simple_html_dom.php');

// Create DOM from URL or file
//$html = file_get_html($_POST['ebayurl']);

//$html = file_get_contents($_POST['ebayurl']);


$dom = str_get_html(file_get_contents($_POST['ebayurl']));
var_dump($dom);

$i = 0;
// parse DOM and get categories & urls

foreach($dom->find('ul.srp-refine__category__list li a') as $element) {
  $categories[$i]['label'] = str_replace('<span>', '', str_replace('</span>', '', $element->innertext));
  $categories[$i]['href'] = $element->href;
  $i++;
}

print_r($categories);
die('---');

foreach($html->find('ul.str-categories__list li div > button') as $element) {

  var_dump($element);
  //$categories[$i]['label'] = str_replace('<span>', '', str_replace('</span>', '', $element->innertext));
  //$categories[$i]['href'] = $element->href;
  $i++;
}
die();
echo json_encode($categories);
?>
