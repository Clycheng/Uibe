<?
/*header("Content-type: text/html; charset=utf-8"); 
*//********************************** 
  * 截取字符串(UTF-8)
  *
  * @param string $str 原始字符串
  * @param $position 开始截取位置
  * @param $length 需要截取的偏移量
  * @return string 截取的字符串
  * $type=1 等于1时末尾加'...'不然不加
 *********************************/ 
 function chinesesubstr($str, $position, $length,$type=1){
  $startPos = strlen($str);
  $startByte = 0;
  $endPos = strlen($str);
  $count = 0;
  for($i=0; $i<strlen($str); $i++){
   if($count>=$position && $startPos>$i){
    $startPos = $i;
    $startByte = $count;
   }
   if(($count-$startByte) >= $length) {
    $endPos = $i;
    break;
   }    
   $value = ord($str[$i]);
   if($value > 127){
    $count++;
    if($value>=192 && $value<=223) $i++;
    elseif($value>=224 && $value<=239) $i = $i + 2;
    elseif($value>=240 && $value<=247) $i = $i + 3;
    else return self::raiseError("\"$str\" Not a UTF-8 compatible string", 0, __CLASS__, __METHOD__, __FILE__, __LINE__);
   }
   $count++;

  }
  if($type==1 && ($endPos-6)>$length){
   return substr($str, $startPos, $endPos-$startPos); 
       }else{
   return substr($str, $startPos, $endPos-$startPos);     
    }
  
 }
?>
