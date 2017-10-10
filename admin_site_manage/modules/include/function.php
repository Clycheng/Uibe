<?php

function convertIsShow($isshow) {
	if ($isshow == "1") {
		echo "显示";
	} else {
		echo "<span style='color:#0099CC'>不显示</span>";	
	}
}

function convertNoIsShow($isshow) {
	if ($isshow == "1") {
		echo "不显示";
	} else {
		echo "显示";	
	}
}

function convertRecom($recom) {
	if ($recom == "0") {
		echo "普通";
	} else {
		echo "<span style='color:red'>推荐</span>";	
	}
}

function convertPutTop($puttop) {
	if ($puttop == "0") {
		echo "普通";
	} else {
		echo "<span style='color:red'>置顶</span>";	
	}
}

function convertIsSecondShow($isSecondShow) {
	if ($isSecondShow == "0") {
		echo "普通";
	} else {
		echo "<span style='color:red'>二级页</span>";	
	}
}

function convertSetIsShow($isShow) {
	if ($isShow == "0") {
		echo "普通";
	} else {
		echo "<span style='color:red'>首页</span>";	
	}
}

function convertStyle($style) {	
	switch ($style) {
		case 0:
			echo "综合页面";
			break;
		case 1:
			echo "单页式";
			break;
		case 2:
			echo "产品列表式";
			break;
		case 3:
			echo "图片列表式";
			break;
		case 4:
			echo "新闻列表式";
			break;
		default:
			echo "未知页面";
			break;			
	}
}

function convertStatus($status) {
	if ($status == "1") {
		echo "已查看";
	} else {
		echo "<span style='color:red'>未查看</span>";	
	}
}

function convertGender($gender) {
	if ($status == "1") {
		echo "男";
	} else {
		echo "女";	
	}
}

function catLocation($url, $catId) {
	
	if ($catId != "" && $catId != 0) {
		$categorysql = "select parentId, catName from dh_category where catId = ".$catId;
		$categoryquery = mysql_query($categorysql);
		$categoryobject = mysql_fetch_object($categoryquery);
		if ($categoryobject != null) {
			$catName = $categoryobject->catName;
			$parentId = $categoryobject->parentId;
			if ($parentId != 0) {
				return parentCatLocation($url, $parentId)." > ".$catName;
			} else {
				return " > ".$catName;
			}
		} else {
			return "";
		}
	} else {
		return "";
	}
}

function parentCatLocation($url, $catId) {
	if ($catId != "" && $catId != 0) {
		$categorysql = "select catId, parentId, catName from dh_category where catId = ".$catId;
		$categoryquery = mysql_query($categorysql);
		$categoryobject= mysql_fetch_object($categoryquery);
		if($categoryobject != null) {
			if ($url != "") {
				$parentCatName = "<a href='".$url.$categoryobject->catId."'>".$categoryobject->catName."</a>";
			} else {
				$parentCatName = $categoryobject->catName;
			}
			$parentId = $categoryobject->parentId;
			if ($parentId != 0) {
				return parentCatLocation($url, $parentId)." > ".$parentCatName;
			} else {
				return " > ".$parentCatName;
			}
		} else {
			return "";
		}
	} else {
		return "";
	}
}

function channelLocation($url, $cId) {
	
	if ($cId != "" && $cId != 0) {
		$channelsql = "select parentId, name from dh_channel where cId = ".$cId;
		$channelquery = mysql_query($channelsql);
		$channelobject = mysql_fetch_object($channelquery);
		if ($channelobject != null) {
			$name = $channelobject->name;
			$parentId = $channelobject->parentId;
			if ($parentId != 0) {
				return parentChannelLocation($url, $parentId)." > ".$name;
			} else {
				return " > ".$name;
			}
		} else {
			return "";
		}
	} else {
		return "";
	}
}

function parentChannelLocation($url, $cId) {
	if ($cId != "" && $cId != 0) {
		$channelsql = "select cId, parentId, name from dh_channel where cId = ".$cId;
		$channelquery = mysql_query($channelsql);
		$channelobject= mysql_fetch_object($channelquery);
		if($channelobject != null) {
			$parentChannelName = "<a href='".$url.$channelobject->cId."'>".$channelobject->name."</a>";
			$parentId = $channelobject->parentId;
			if ($parentId != 0) {
				return parentChannelLocation($url, $parentId)." > ".$parentChannelName;
			} else {
				return " > ".$parentChannelName;
			}
		} else {
			return "";
		}
	} else {
		return "";
	}
}

function channelTree($parentId, $rights, $catrights) {
	
	if ($parentId != "") {
		$channelsql = "select cId, parentId, name,isContainCat from dh_channel where parentId = '".$parentId."' order by seqNo asc";
		$channels = mysql_query($channelsql);
		if ($channels != null) {
			$num = mysql_num_rows($channels);
			$index=0;
			while($row = mysql_fetch_array($channels)) {
				$childChannelSql = "select cId, parentId, name,isContainCat from dh_channel where parentId = '".$row["cId"]."' order by seqNo asc";
				$childChannels = mysql_query($childChannelSql);
				$childChannelNum = mysql_num_rows($childChannels);
				
					echo "\n";
					echo "{ id: '".$row["cId"]."', pId: '".$parentId."', name:\"".$row["name"]."\"";
				if ($childChannelNum > 0 or $row["isContainCat"] == "1") {
					echo ", open:true ";
				}
				if (checkAuth($rights, $row["cId"])) {
					echo ", checked:true ";
				}
					echo "}";
				
				if ($index < $num) {
					echo ",";
				}
				$index++;
				
				if ($childChannelNum > 0) {
					channelTree($row["cId"], $rights, $catrights);
				}
				
				if ($row["isContainCat"] == "1") {
					categoryTree($row["cId"],"0", $catrights);
				}
				
			}
		} else {
			echo "";
		}
	} else {
		echo "";
	}
}

function checkAuth($rights, $cId) {
	if ($rights == "") {
		return false;
	}
	$rightsArray = explode(",",$rights);
	foreach($rightsArray as $right) {
		if ($right == "") {
			continue;
		}
		if ($right == $cId) {
			return true;
		}
	}
	return false;
}

function categoryTree($catId, $parentId, $catrights) {
	
	if ($parentId != "") {
		$catsql = "select catId, parentId, catName from dh_category where parentId = '".$parentId."' order by seqNo asc";
		$cats = mysql_query($catsql);
		if ($cats != null) {
			$num = mysql_num_rows($cats);
			$index=0;
			while($row = mysql_fetch_array($cats)) {
				$childCatSql = "select catId, parentId, catName from dh_category where parentId = '".$row["catId"]."' order by seqNo asc";
				$childCats = mysql_query($childCatSql);
				$childCatNum = mysql_num_rows($childCats);
				
					echo "\n";
					echo "{ id: 'cat_".$row["catId"]."', pId: '".$catId."', name:\"".$row["catName"]."\"";
				if ($childCatNum > 0) {
					echo ", open:true ";
				}
				
				if (checkAuth($catrights, $row["catId"])) {
					echo ", checked:true ";
				}
					echo "}";
				
				if ($index < $num) {
					echo ",";
				}
				$index++;
				
				if ($childCatNum > 0) {
					categoryTree("cat_".$row["catId"],$row["catId"], $catrights);
				}
			}
		} else {
			echo "";
		}
	} else {
		echo "";
	}
}

function channelMenu($isAdmin, $parentId, $rights, $catrights) {
	
	if ($parentId != "") {
		$channelsql = "select cId, parentId, name,isContainCat, backUrl from dh_channel where parentId = '".$parentId."' order by seqNo";
		$channels = mysql_query($channelsql);
		if ($channels != null) {
			$num = mysql_num_rows($channels);
			while($row = mysql_fetch_array($channels)) {
				$childChannelSql = "select cId, parentId, name,isContainCat, backUrl from dh_channel where parentId = '".$row["cId"]."' order by seqNo";
				$childChannels = mysql_query($childChannelSql);
				$childChannelNum = mysql_num_rows($childChannels);				
				if ($isAdmin or checkAuth($rights, $row["cId"])) {
					echo "\n";
					echo "  <h1 class=\"type\"><a href=\"javascript:void(0)\">".$row["name"]."</a></h1>\n";
					echo "  <div class=\"content\">\n";
					echo "    <div>\n";
					echo "       <img src=\"./resources/images/menu_topline.gif\" width=\"188\" height=\"5\" />\n";
					echo "    </div>\n";
					if ($childChannelNum > 0) {
					
					echo "    <ul class=\"son_type\">\n";
						while($childRow = mysql_fetch_array($childChannels)) {
							if ($isAdmin or checkAuth($rights, $childRow["cId"])) {
					echo "      <li>\n";
					echo "         <a href=\"javascript:void(0);\" onclick=\"window.parent.main.location.href='".$childRow["backUrl"]."'\" target=\"main\">".$childRow["name"]."</a>\n";
					echo "      </li>\n";
							}
						}
					}
					if ($row["isContainCat"] == "1") {
						categoryMenu($isAdmin, $row["cId"],"0", $catrights);
					}
					echo "    </ul>\n";
					echo "  </div>\n";
				}
				
			}
		} else {
			echo "";
		}
	} else {
		echo "";
	}
}

function categoryMenu($isAdmin, $catId, $parentId, $catrights) {
	
	if ($parentId != "") {
		
		echo "\n";
		echo "    <div class=\"sec_menu\">\n";
	
		$catsql = "select catId, parentId, catName,backUrl from dh_category where parentId = '".$parentId."' order by seqNo asc";
		$cats = mysql_query($catsql);
		if ($cats != null) {
			$num = mysql_num_rows($cats);
			$index=0;
			while($row = mysql_fetch_array($cats)) {
				$childCatSql = "select catId, parentId, catName,backUrl from dh_category where parentId = '".$row["catId"]."' order by seqNo asc";
				$childCats = mysql_query($childCatSql);
				$childCatNum = mysql_num_rows($childCats);
				
				if ($isAdmin or checkAuth($catrights, $row["catId"])) {
				
						echo "      <div class=\"centent0\">\n";
						echo "         <div class=\"shou\">\n";
						echo "            <div class=\"shou_a\">\n";
						echo "               <img src=\"./resources/images/submenusub.gif\" width=\"11\" height=\"7\">&nbsp;\n";
						if ($childCatNum == 0) {
							echo "               <a href=\"javascript:void(0);\" onclick=\"window.parent.main.location.href='".$row["backUrl"]."?catId=".$row["catId"]."'\" target='main'>".$row["catName"]."</a>\n";
						} else {
							echo "                 ".$row["catName"]."";
						}
						echo "            </div>\n";
						
						if ($childCatNum != 0) {
						echo "            <div id=\"expand".$index."\" class=\"shou_b\" onClick='ExpandOrCollapse(\"expandTip".$index."\",\"expand".$index."\");' >+ 展开</div>\n";
						}
						
						echo "         </div>\n";
						
						echo "         <div id=\"expandTip".$index."\" style=\"display:none;background:url(resources/images/menu_bgopen.gif) repeat-y; padding-left:10px; padding-top:5px;\">";						
				if ($childCatNum > 0) {
						echo "\n";
					childCategoryMenu($isAdmin, $row["catId"],$row["catId"], $catrights,"&clubs;");
				}						
						echo "         </div>\n";						
						echo "      </div>\n";
						
				}
				$index++;
				
			}
			
			
		} else {
			echo "";
		}
		echo "    </div>\n";
	} else {
		echo "";
	}
}

function childCategoryMenu($isAdmin, $catId, $parentId, $catrights, $icon){

	$catsql = "select * from dh_category where parentId = $parentId order by seqNo asc";
	$catquery = mysql_query($catsql);
	while($row = @mysql_fetch_array($catquery)) {

		$childcatsql = "select * from dh_category where parentId = ".$row["catId"];
		$childcatquery = mysql_query($childcatsql);
		$childcatnum = mysql_num_rows($childcatquery);
		
		if ($isAdmin or checkAuth($catrights, $row["catId"])) {
			if ($childcatnum != 0) {
				echo "<div class='shou_er' onMouseOver='this.style.background='#FFFFD0';this.style.cursor='pointer''";
				echo " onMouseOut='this.style.background='ffffff''>\n";
				echo " <span style='color:#3399FF'>".$icon."</span>&nbsp;".$row["catName"]."</div>\n";
			} else {
				echo "<div class='shou_er' onMouseOver='this.style.background='#FFFFD0';this.style.cursor='pointer''";
				echo " onMouseOut='this.style.background='ffffff''>\n";
				echo "<span style='font-family:宋体; font-size:10px; font-weight:bold;color:#999;";
				echo " padding-left:5px;'>></span>\n&nbsp;<a href=\"javascript:void(0);\" onclick=\"window.parent.main.location.href='".$row["backUrl"]."?catId=".$row["catId"]."'\" target='main'>".$row["catName"]."</a>\n";
				echo "</div>";
			}
		}
		childCategoryMenu($isAdmin, $row["catId"],$row["catId"], $catrights,"&nbsp;&nbsp;".$icon);
	}
}

?>
