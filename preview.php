<?
ob_start();

// get selected layout
switch($_POST['layout']){
  case 'horizontal':
    require_once("Layouts/horizontal.php");
    break;

  case 'horizontal-hero':
    require_once("Layouts/horizontal-hero.php");
    break;

  case 'vertical':
    require_once("Layouts/vertical.php");
    break;
    
  case 'vertical-hero':
    require_once("Layouts/vertical-hero.php");
    break;
}


$output = ob_get_contents();

if($_GET['mode'] == 'code'){
  $output = str_replace('&', '&amp;', $output);
  $output = str_replace('<', '&lt;', $output);
}

ob_end_clean();
echo $output;
?>
