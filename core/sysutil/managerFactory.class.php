<?php
class ManagerFactory {
	
	private static $categoryDao;
	public static function getCategoryManager() {
		if (!is_object(self::$categoryDao)) {
			global $root;
			require_once($root."/core/dao/categoryDao.php");
			self::$categoryDao = new CategoryDao();
		}
		return self::$categoryDao;
	}
	
	private static $channelDao;
	public static function getChannelManager() {
		if (!is_object(self::$channelDao)) {
			global $root;
			require_once($root."/core/dao/channelDao.php");
			self::$channelDao = new ChannelDao();
		}
		return self::$channelDao;
	}
	
	private static $sysUserDao;
	public static function getSysUserManager() {
		if (!is_object(self::$sysUserDao)) {
			global $root;
			require_once($root."/core/dao/sysUserDao.php");
			self::$sysUserDao = new SysUserDao();
		}
		return self::$sysUserDao;
	}
	
	private static $historyDao;
	public static function getHistoryManager() {
		if (!is_object(self::$historyDao)) {
			global $root;
			require_once($root."/core/dao/historyDao.php");
			self::$historyDao = new HistoryDao();
		}
		return self::$historyDao;
	}
	
	private static $webconfigDao;
	public static function getWebConfigManager() {
		if (!is_object(self::$webconfigDao)) {
			global $root;
			require_once($root."/core/dao/webConfigDao.php");
			self::$webconfigDao = new WebConfigDao();
		}
		return self::$webconfigDao;
	}
	
	private static $slideDao;
	public static function getSlideManager() {
		if (!is_object(self::$slideDao)) {
			global $root;
			require_once($root."/core/dao/slideDao.php");
			self::$slideDao = new SlideDao();
		}
		return self::$slideDao;
	}
	
	private static $infoDao;
	public static function getInfoManager() {
		if (!is_object(self::$infoDao)) {
			global $root;
			require_once($root."/core/dao/infoDao.php");
			self::$infoDao = new InfoDao();
		}
		return self::$infoDao;
	}
	
	private static $partnerDao;
	public static function getPartnerManager() {
		if (!is_object(self::$partnerDao)) {
			global $root;
			require_once($root."/core/dao/partnerDao.php");
			self::$partnerDao = new PartnerDao();
		}
		return self::$partnerDao;
	}
	
	private static $teamDao;
	public static function getTeamManager() {
		if (!is_object(self::$teamDao)) {
			global $root;
			require_once($root."/core/dao/teamDao.php");
			self::$teamDao = new TeamDao();
		}
		return self::$teamDao;
	}
	
	private static $productDao;
	public static function getProductManager() {
		if (!is_object(self::$productDao)) {
			global $root;
			require_once($root."/core/dao/productDao.php");
			self::$productDao = new ProductDao();
		}
		return self::$productDao;
	}
	
	private static $proImgDao;
	public static function getProImgManager() {
		if (!is_object(self::$proImgDao)) {
			global $root;
			require_once($root."/core/dao/proImgDao.php");
			self::$proImgDao = new ProImgDao();
		}
		return self::$proImgDao;
	}
	
	private static $newDao;
	public static function getNewManager() {
		if (!is_object(self::$newDao)) {
			global $root;
			require_once($root."/core/dao/newDao.php");
			self::$newDao = new NewDao();
		}
		return self::$newDao;
	}
	
	private static $newExhibitionDao;
	public static function getNewExhibitionManager() {
		if (!is_object(self::$newExhibitionDao)) {
			global $root;
			require_once($root."/core/dao/newExhibitionDao.php");
			self::$newExhibitionDao = new NewExhibitionDao();
		}
		return self::$newExhibitionDao;
	}
	
	private static $feedDao;
	public static function getFeedManager() {
		if (!is_object(self::$feedDao)) {
			global $root;
			require_once($root."/core/dao/feedDao.php");
			self::$feedDao = new FeedDao();
		}
		return self::$feedDao;
	}
	
	private static $orderDao;
  public static function getOrderManager() {
    if (!is_object(self::$orderDao)) {
      global $root;
      require_once($root."/core/dao/orderDao.php");
      self::$orderDao = new OrderDao();
    }
    return self::$orderDao;
  }

  private static $jobDao;
  public static function getJobManager() {
    if (!is_object(self::$jobDao)) {
       global $root;
       require_once($root."/core/dao/jobDao.php");
       self::$jobDao = new JobDao();
    }
    return self::$jobDao;
  }

  private static $postDao;
  public static function getPostManager() {
    if (!is_object(self::$postDao)) {
       global $root;
       require_once($root."/core/dao/postDao.php");
       self::$postDao = new PostDao();
    }
    return self::$postDao;
  }

  private static $projectDao;
  public static function getProjectManager() {
    if (!is_object(self::$projectDao)) {
       global $root;
       require_once($root."/core/dao/projectDao.php");
       self::$projectDao = new ProjectDao();
    }
    return self::$projectDao;
  }

  private static $userDao;
  public static function getUserManager() {
    if (!is_object(self::$userDao)) {
       global $root;
       require_once($root."/core/dao/userDao.php");
       self::$userDao = new UserDao();
    }
    return self::$userDao;
  }

  private static $courseDao;
  public static function getCourseManager() {
    if (!is_object(self::$courseDao)) {
       global $root;
       require_once($root."/core/dao/courseDao.php");
       self::$courseDao = new CourseDao();
    }
    return self::$courseDao;
  }

  private static $dictTypeDao;
  public static function getDictTypeManager() {
    if (!is_object(self::$dictTypeDao)) {
       global $root;
       require_once($root."/core/dao/dictTypeDao.php");
       self::$dictTypeDao = new DictTypeDao();
    }
    return self::$dictTypeDao;
  }

  private static $dictEntryDao;
  public static function getDictEntryManager() {
    if (!is_object(self::$dictEntryDao)) {
       global $root;
       require_once($root."/core/dao/dictEntryDao.php");
       self::$dictEntryDao = new DictEntryDao();
    }
    return self::$dictEntryDao;
  }
}
?>