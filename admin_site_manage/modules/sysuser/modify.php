<? 
	include_once("../../../core/common/globalFilter.php");
	
	if ($action == "edit") {
		try {
			
			if ($oldUserPwd == "") {
				throw new Exception("原密码不能为空！",10001);
			}
			if ($newUserPwd == "") {
				throw new Exception("新密码不能为空！",10002);
			}
			if ($confirmUserPwd == "") {
				throw new Exception("确认密码不能为空！",10003);
			} else {
				if ($newUserPwd != $confirmUserPwd) {
					throw new Exception("新密码和确认密码不一致！",10004);
				}
			}
			
			$sysUserManager = ManagerFactory::getSysUserManager();
			$row = $sysUserManager->GetSysUserByUserId($uId);
						
			if ($row->userPwd != md5($oldUserPwd)) {
				throw new Exception("原密码不正确！",10005);
			}
			if ($newUserPwd == $oldUserPwd) {
				throw new Exception("新密码不能和原密码相同！",10006);
			}
			$sysUserManager->Update(md5($newUserPwd),$remark,$row->userId);
			
			//JsUtil::alert("修改成功！");
			$_SESSION["success_msg"] = "操作成功！";
			JsUtil::gotoliwqbj("initModify.php?action=modify");
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() != "") {
				//JsUtil::Alert($e->getMessage());
        $_SESSION["err_msg"] = $e->getMessage();
			} else {
				//JsUtil::Alert("修改失败！");
        $_SESSION["err_msg"] = "操作失败！";
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>