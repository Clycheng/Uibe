<?php
class PageBar{
  
  static function create($url, $p, $totalItems=0, $pageSize) {
    if ($totalItems == 0) {
      return;
    }
    $totalPages = ceil($totalItems / $pageSize);   

    echo "<span>";
    echo "共<strong>".$totalItems."</strong>条 分<strong>".$totalPages."</strong>页 当前 第".$p."页";
    if ($p <= 1) {
      echo " 首页 ";
      echo " 上一个 ";
    }else {
      echo " <a href=\"".$url."&p=1\" class=\"font_black_12\">首页</a> "; 
      echo " <a href=\"".$url."&p=".($p - 1)."\" class=\"font_black_12\">上一页</a> "; 
    }
    if($p >= $totalPages) {
      echo " 下一页 ";
      echo " 末页 ";
    } else {
      echo " <a href=\"".$url."&p=".($p + 1)."\" class=\"font_black_12\">下一页</a> ";                   
      echo " <a href=\"".$url."&p=".$totalPages."\" class=\"font_black_12\">末页</a> "; 
    }
    echo "跳转到";
    echo "<select name=\"select\" id=\"select\" onchange=\"javascript:gotoPage()\">";
    $i = 1;
    while($totalPages - $i >= 0) {
      echo "<option value=\"".$i."\"";
      if ($p == $i) {
       echo " selected='selected' "; 
      }
      echo ">".$i."</option>";
      $i++;
    }
    echo "</select>";
    echo "页";
    echo "</span>";
    
    
    echo "<script type=\"text/javascript\">";
    echo "function gotoPage() {";
    echo "window.location.href=\"".$url."&p=\" + $('#select option:selected').val();";
    echo "}";
    echo "</script>";
  }
  
  static function createStyleOne($url, $p, $totalItems=0, $pageSize) {
    
    if ($totalItems == 0) {
      return;
    }
    $totalPages = ceil($totalItems / $pageSize);   
    
    echo "\n";
    echo "<span>";
    echo "共<strong>".$totalItems."</strong>条 分<strong>".$totalPages."</strong>页 当前 第".$p."页";
    if ($p <= 1) {
      echo " 首页 ";
      echo " 上一个 ";
    }else {
      
      $newurl = self::generateLink($url, "1");
      echo " <a href=\"".$newurl."\" class=\"font_black_12\">首页</a> "; 
      $newurl = self::generateLink($url, ($p - 1));
      echo " <a href=\"".$newurl."\" class=\"font_black_12\">上一页</a> "; 
    }
    if($p >= $totalPages) {
      echo " 下一页 ";
      echo " 末页 ";
    } else {
      $newurl = self::generateLink($url, ($p + 1));
      echo " <a href=\"".$newurl."\" class=\"font_black_12\">下一页</a> "; 
      $newurl = self::generateLink($url, $totalPages);                  
      echo " <a href=\"".$newurl."\" class=\"font_black_12\">末页</a> "; 
    }
    echo "跳转到";
    echo "<select name=\"select\" id=\"select\" onchange=\"javascript:gotoPage()\">";
    $i = 1;
    while($totalPages - $i >= 0) {
      echo "<option value=\"".$i."\"";
      if ($p == $i) {
       echo " selected='selected' "; 
      }
      echo ">".$i."</option>";
      $i++;
    }
    echo "</select>";
    echo "页";
    echo "</span>";
    echo "\n";
    
    
    echo "\n";
    echo "<script type=\"text/javascript\">";
    echo "\n";
    echo "function gotoPage() {";
    echo "\n";
    echo "var p = '-' + $('#select option:selected').val();";
    echo "\n";
    echo "var url = \"".$url."\"";
    echo "\n";
    echo "url = url.replace('[page]',p)";
    echo "\n";
    echo "window.location.href=url";
    echo "\n";
    echo "}";
    echo "\n";
    echo "</script>";
    echo "\n";
  }
  
  static function createStyleTwo($url, $p, $totalItems=0, $pageSize, $showPages=3,$urlIsRewrite) {
    
    if ($totalItems == 0) {
      return;
    }
    $totalPages = ceil($totalItems / $pageSize);   
    
    echo "\n";
    if ($p <= 1) {
      echo "<a class=\"syy\">&lt;&lt;上一页</a>";
    }else {
      
      $newurl = self::generateLink($url, ($p - 1),$urlIsRewrite);
      echo " <a href=\"".$newurl."\" class=\"syy\">&lt;&lt;上一页</a> "; 
    }
    
    $start = 0;               
    if ($p - ceil($showPages / 2) > 1) {
      $start = $p - ceil($showPages / 2);
    } else {
      $start = 1;
    }               
    $end = 0;
    if ($start + $showPages < $totalPages) {
      $end = $start + $showPages;
    } else {
      $end = $totalPages;
    }               
    if ($end - $start < $showPages) {
      $start = $end - $showPages;
      if ($start < 1) {
        $start = 1;
      }
    }
      
    for ($i = $start; $i <= $end; $i++) {
      $newurl = self::generateLink($url, ($i),$urlIsRewrite);
      echo "<a href=\"".$newurl."\">";
      if ($p == $i) {
        echo " [ ".$i." ] ";
      } else {
        echo $i;
      }
      echo "</a> ";
    }
    
    if($p >= $totalPages) {
      echo "<a class=\"xyy\">下一页&gt;&gt;</a>";
    } else {
      $newurl = self::generateLink($url, ($p + 1),$urlIsRewrite);
      echo " <a href=\"".$newurl."\" class=\"xyy\">下一页&gt;&gt;</a> "; 
    }
    echo "\n";
    
  }
  
  static function generateLink($url, $p, $urlIsRewrite) {
    $newurl = "";
    if ($urlIsRewrite) {
      $newurl = str_replace("[page]", "-".$p, $url);
    } else {
      $newurl = str_replace("[page]", "&p=".$p, $url);
    }
    return $newurl;
  }
  
}
?>