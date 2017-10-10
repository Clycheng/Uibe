<?php

class Constants {
  
  private static $highEducation = 1;
  /**
   * 最高学历
   */
  static function getHighEducation() {
    return self::$highEducation;
  }
  
  private static $jobnature = 2;
  /**
  * 工作性质
  */
  static function getJobNature() {
    return self::$jobnature;
  }
  
  private static $industry = 3;
  /**
   * 希望行业
   */
  static function getIndustry(){
    return self::$industry;
  }
  
  private static $enterpriseNature = 4;
  /**
   * 企业性质
   */
  static function getEnterpriseNature() {
    return self::$enterpriseNature;
  }
  
  private static $belongIndustry = 5;
  /**
   * 所属行业
   */
  static function getBelongIndustry(){
    return self::$belongIndustry;
  }
  
  private static $enterpriseScale = 6;
   /**
   * 企业规模
   */
  static function getEnterpriseScale(){
    return self::$enterpriseScale;
  }
  
  private static $educationRequire = 7;
   /**
   * 学历要求
   */
  static function getEducationRequire(){
    return self::$educationRequire;
  }
  
  private static $userType = 8;
   /**
   * 会员类型
   */
  static function getUserType(){
    return self::$userType;
  }
  private static $dict = array(
    1 => "最高学历",
    2 => "工作性质",
    3 => "希望行业",
    4 => "企业性质",
    5 => "所属行业",
    6 => "企业规模",
    7 => "学历要求",
    8 => "会员类型"
  );
  
  public static function getDict() {
    return self::$dict;
  }
}
?>