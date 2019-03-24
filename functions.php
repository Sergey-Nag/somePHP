<?
class DrawPage {
  
  function inEditor($arr) {
    //  print_r($arr);
    $result ='<div class="main_wrapper">';
    while ($block = $arr->fetch_assoc()) {
      $result.= '<div id="e-'.$block['block'].'" class="'.$block['classes'].'">';
      
      if ($block['html']) {
        
      } else $result.="<span class='sample-text'>Lorem ipsum.</span>";
      
      $result.='</div>';
    }
    $result.= '</div>';
    echo $result;
  }
}
// Draw page
$DrawPage = new DrawPage();