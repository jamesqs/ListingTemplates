<?php
header('Content-Type: application/json');
include_once('simple_html_dom.php');

function scraping_generic($url, $search) {
	$return = false;

  $html = file_get_html($url);

  // get article block
  $i = 0;
  foreach($html->find($search) as $found) {
	  // Found at least one.
	  $return[$i]['label'] = $found->plaintext;
    $return[$i]['href'] = $found->href;

	  //$found->dump();
    $i++;
  }

  // clean up memory
  $html->clear();
  unset($html);
  return $return;
}

$url = $_POST['ebayurl'];
//$url = 'https://www.ebay.co.uk/sch/i.html?_dmd=2&_ssn=bhf_shops&store_cat=0&store_name=britishheartfoundationshop&_oac=1';
$string = "ul.srp-refine__category__list li a";

$response = scraping_generic($url, $string);
echo json_encode($response);
die();
?>
