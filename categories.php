<?
header('Content-Type: application/json');
include_once('simple_html_dom.php');

// Create DOM from URL or file
$html = file_get_html($_POST['ebayurl']);
$i = 0;
// parse DOM and get categories & urls
foreach($html->find('ul.srp-refine__category__list li a') as $element) {
  $categories[$i]['label'] = str_replace('<span>', '', str_replace('</span>', '', $element->innertext));
  $categories[$i]['href'] = $element->href;
  $i++;
}

echo json_encode($categories);
?>
