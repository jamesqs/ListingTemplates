<?php
header('Content-Type: application/json');
include_once('simple_html_dom.php');

//$url="https://www.ebay.co.uk";
$url="https://www.ebay.co.uk/str/sueryderpreloved";
//$url = $_POST['ebayurl'];
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_URL,$url);

$result=curl_exec($ch);

$html = str_get_html($result);

$search = 'li.str-categories__L1Category div.str-categories__single--current a';


$i = 0;
foreach($html->find($search) as $found) {
  //echo ($found->href);
  //echo ($found->plaintext);
  // Found at least one.
  $return[$i]['label'] = $found->plaintext;
  $return[$i]['href'] = $found->href;

  //$found->dump();
  $i++;
}
#die();
echo json_encode($return);
die();
?>
