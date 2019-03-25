<?
class DrawPage {
  
  function inEditor($arr) {
    //  print_r($arr);
    $result ='<div class="main_wrapper">';
    $JSON = '<script> var DATA_PAGE={';
    while ($block = $arr->fetch_assoc()) {
      
      $result.= '<div id="e-'.$block['block'].'" class="'.$block['classes'].'" data-controls="true">';
      
      if ($block['html']) {
        
      } else $result.="<span class='sample-text'>Lorem ipsum.</span>";
      
      $JSON.= $block['block'].': '.json_encode($block).',';
      $result.='</div>';
    }
    $JSON.='}</script>';
    $result.= '</div>';
    
    echo $JSON.$result;
  }
  
}
// Draw page
$DrawPage = new DrawPage();