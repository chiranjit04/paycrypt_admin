<?php
/*recutssion*/
  $min='1';
function recur($min)
{
 
  echo $min.' ';
  if($min<10){
    $min++;
    recur($min);
  }
}
recur($min);

?>