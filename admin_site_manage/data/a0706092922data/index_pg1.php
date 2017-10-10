<?
if(!defined('VERSION')){echo "<meta http-equiv=refresh content='0;URL=index.php'>";exit;}
create("belong"," (\n  `id` int(9) NOT NULL auto_increment,\n  `uid` int(9) NOT NULL,\n  `bid` int(9) NOT NULL,\n  `pid` int(9) NOT NULL,\n  `num` int(9) NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

tableend("belong");

create("buy"," (\n  `id` int(9) NOT NULL auto_increment,\n  `uid` varchar(9) collate utf8_unicode_ci NOT NULL default '0',\n  `zhuangtai` int(11) NOT NULL default '0',\n  `nickname` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `gender` int(9) NOT NULL default '0',\n  `youbian` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `zhuzhi` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `dizhi` text collate utf8_unicode_ci NOT NULL,\n  `post_date` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `post_time` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `post` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `bank` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `shuoming` text collate utf8_unicode_ci NOT NULL,\n  `tel` varchar(20) collate utf8_unicode_ci NOT NULL,\n  `QQ` int(20) NOT NULL,\n  `email` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `state` int(2) NOT NULL default '0',\n  `btime` varchar(10) collate utf8_unicode_ci NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

tableend("buy");

create("diqu"," (\n  `id` int(11) NOT NULL auto_increment,\n  `danwei` varchar(255) NOT NULL,\n  `lianxi` varchar(255) NOT NULL,\n  `sheng` varchar(255) NOT NULL,\n  `shi` varchar(255) NOT NULL,\n  `tel` int(20) NOT NULL,\n  `shouji` int(11) NOT NULL,\n  `qq` varchar(255) NOT NULL,\n  `email` varchar(255) NOT NULL,\n  `px` int(11) NOT NULL,\n  `times` varchar(10) NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");

insert("('1','sdfsdfsd','sdfsdf','深圳','sdfsdf','0','0','dsfsdfsdf','sdfsdfds','0','1306298794'),
('2','sdfsfsd','sdfsdf','北京','sfsdf','0','11111111','sdfsdfsdfsdf','sdfsdfsdf','0','1306299284')");

tableend("diqu");

create("jiaodian"," (\n  `id` int(9) NOT NULL auto_increment,\n  `image` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,\n  `logo` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,\n  `url` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,\n  `px` int(9) NOT NULL,\n  `zhanshi` int(9) NOT NULL default '0',\n  `times` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=gbk");

insert("('1','newspic/685076.jpg','','http://','0','0','1308645582'),
('2','newspic/228073.jpg','','http://','0','0','1308645591'),
('3','newspic/463098.jpg','','http://','0','0','1308645609')");

tableend("jiaodian");

create("leave"," (\n  `id` int(9) NOT NULL auto_increment,\n  `leaveTitle` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `Company` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `Subject` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `leaveContent` text collate utf8_unicode_ci NOT NULL,\n  `siteUid` int(3) NOT NULL default '0',\n  `ip` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `leaveTime` varchar(10) collate utf8_unicode_ci NOT NULL,\n  `state` int(2) NOT NULL default '0',\n  `tel` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `QQ` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `email` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `name` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `moshi` int(9) NOT NULL default '0',\n  `px` int(9) NOT NULL default '0',\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

insert("('8','我来留个言','','','我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言','0','127.0.0.1','1292507854','1','11111111','1111111111','liwqbj@163.com','哈哈','1','0'),
('9','哈哈我再来','','','留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留','0','127.0.0.1','1292508419','0','111111','111111','liwqbj@163.com','体力上','1','0')");

tableend("leave");

create("link"," (\n  `id` int(9) NOT NULL auto_increment,\n  `fid` int(9) NOT NULL default '0',\n  `title` varchar(50) character set gbk NOT NULL,\n  `image` varchar(50) character set gbk NOT NULL,\n  `px` int(9) NOT NULL default '0',\n  `http` varchar(50) character set gbk NOT NULL,\n  `times` varchar(10) character set gbk NOT NULL,\n  `content` text character set gbk NOT NULL,\n  `xianshi` int(3) NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

insert("('2','2','百度','/newspic/450958.gif','0','http://www.baidu.com','1284086244','','0'),
('12','3','百度','/newspic/759481.gif','0','http://www.baidu.com','1284086622','','0'),
('17','2','百度','/newspic/690542.gif','0','http://www.baidu.com','1284087415','','0'),
('18','1','百度','newspic/753411.jpg','0','http://www.baidu.com','1308643384','','0'),
('19','2','百度','/newspic/734625.gif','0','http://www.baidu.com','1284089221','','0'),
('20','3','这个不是你的吗','/newspic/510092.gif','0','http://www.baidu.com','1284089305','','0'),
('21','2','百度','/newspic/891262.gif','0','http://','1284091041','','0'),
('22','1','雅虎','newspic/360513.jpg','0','http://www.yahoo.com','1308645672','','0'),
('23','1','后台添加','newspic/864703.jpg','0','http://www.baidu.com','1308646379','','0'),
('24','1','后台添加','newspic/288607.jpg','0','http://','1308646389','','0'),
('25','1','后台添加','newspic/817626.jpg','0','http://','1308646399','','0'),
('26','1','后台添加','newspic/135403.jpg','0','http://','1308646408','','0'),
('27','1','后台添加','newspic/233978.jpg','0','http://','1308646416','','0'),
('28','1','后台添加','newspic/220822.jpg','0','http://','1308646426','','0')");

tableend("link");

create("lwq_user"," (\n  `id` int(9) NOT NULL auto_increment,\n  `username` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `password` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `times` varchar(10) collate utf8_unicode_ci NOT NULL,\n  `admin` int(3) NOT NULL default '0',\n  `quanxian` varchar(50) collate utf8_unicode_ci NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

insert("('1','liwqbj','dc371841d731d500cdee08ad4b3a036b','1277696142','1','1|2|3|4|5|6|7|8|9|10|11|12'),
('6','admin','21232f297a57a5a743894a0e4a801fc3','1306332414','0','1|2|5|6|12')");

tableend("lwq_user");

create("lwq_xinxi"," (\n  `id` int(11) NOT NULL auto_increment,\n  `title` varchar(100) collate utf8_unicode_ci NOT NULL,\n  `chuanzhen` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `email` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `rexian` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `sou_name` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `tel` varchar(100) collate utf8_unicode_ci NOT NULL,\n  `lianxi` text collate utf8_unicode_ci NOT NULL,\n  `seo_title` varchar(255) collate utf8_unicode_ci NOT NULL,\n  `seo_gjci` text collate utf8_unicode_ci NOT NULL,\n  `seo_type` text collate utf8_unicode_ci NOT NULL,\n  `dibu` text collate utf8_unicode_ci NOT NULL,\n  `times` varchar(10) collate utf8_unicode_ci NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

insert("('1','北京蜜爱蜜生物科技有限公司','010-58831389','bjbj@163.com','http://bee1.taobao.com/','','010-58672503 ','<p>相关内容需要从后台添加相关内容需要从后台添加相关内容需要从后台添加相关内容需要从后台添加相关内容需要后台添加关内容需要从后台添加相关内容需要从后台添相关内容需要从后台添加。相关内容需要从后台添加相关内容需要从后台添加相关内容需要从后台添加相关内容需要从后台添加相关内容需要后台添。</p>','尚通科技','尚通科技','尚通科技','<p>&nbsp;</p>','1310022369')");

tableend("lwq_xinxi");

create("mim_face"," (\n  `id` int(11) NOT NULL auto_increment,\n  `name` varchar(255) NOT NULL,\n  `image` varchar(255) NOT NULL,\n  `px` int(11) NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");

insert("('1','[微笑]','images/1.gif','0'),
('2','[咧嘴]','images/2.gif','0'),
('3','[狂抓]','images/3.gif','0'),
('4','[藐视]','images/4.gif','0'),
('5','[大兵]','images/5.gif','0'),
('6','[奋斗]','images/6.gif','0'),
('7','[疑问]','images/7.gif','0'),
('8','[晕]','images/8.gif','0'),
('9','[偷笑]','images/9.gif','0'),
('10','[可爱]','images/10.gif','0'),
('11','[傲慢]','images/11.gif','0'),
('12','[惊恐]','images/12.gif','0')");

tableend("mim_face");

create("mim_pool"," (\n  `id` int(11) NOT NULL auto_increment,\n  `content` text NOT NULL,\n  `times` varchar(10) NOT NULL,\n  `state` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");

insert("('1','[惊恐]真是生气，想要下载的文件居然没有，晕。','1309942654','1'),
('2','什么事蜂蜜','1310032670','1'),
('3','真的假的呀','1310032713','1')");

tableend("mim_pool");

create("news"," (\n  `id` int(9) NOT NULL auto_increment,\n  `ziid` int(9) NOT NULL,\n  `img_id` int(11) NOT NULL default '0',\n  `title` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `name` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `author` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `image` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `image_rot` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `files_url` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `htmlurl` varchar(255) collate utf8_unicode_ci NOT NULL,\n  `shiping` text collate utf8_unicode_ci NOT NULL,\n  `zhicheng` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `jiage` varchar(50) collate utf8_unicode_ci NOT NULL default '0',\n  `type1` text collate utf8_unicode_ci NOT NULL,\n  `type2` text character set utf8 collate utf8_turkish_ci NOT NULL,\n  `type3` text collate utf8_unicode_ci NOT NULL,\n  `type4` text collate utf8_unicode_ci NOT NULL,\n  `type5` text collate utf8_unicode_ci NOT NULL,\n  `content` text collate utf8_unicode_ci NOT NULL,\n  `px` varchar(50) collate utf8_unicode_ci NOT NULL default '',\n  `zhiding` varchar(50) collate utf8_unicode_ci NOT NULL default '',\n  `times` varchar(10) collate utf8_unicode_ci NOT NULL,\n  `cisu` varchar(50) collate utf8_unicode_ci NOT NULL default '',\n  `tuijian` varchar(50) collate utf8_unicode_ci NOT NULL default '',\n  `zhanshi` varchar(50) collate utf8_unicode_ci NOT NULL default '',\n  `redian` varchar(50) collate utf8_unicode_ci NOT NULL default '',\n  `seo_title` varchar(255) collate utf8_unicode_ci NOT NULL,\n  `seo_gjci` varchar(255) collate utf8_unicode_ci NOT NULL,\n  `seo_type` text collate utf8_unicode_ci NOT NULL,\n  `pinpai` varchar(255) collate utf8_unicode_ci NOT NULL,\n  `hanliang` varchar(255) collate utf8_unicode_ci NOT NULL,\n  `yuanliao` varchar(255) collate utf8_unicode_ci NOT NULL,\n  `chengfen` varchar(255) collate utf8_unicode_ci NOT NULL,\n  `shiyong` varchar(255) collate utf8_unicode_ci NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

insert("('1','1','0','企业简介','','','','','','/400dianhua//index-1308724998.html','','','','','','','','','<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承&quot;美好人们的健康生活&quot;的良好愿景，致力于打造国人信赖和热爱的高端保健品和生物化妆品品牌。公司锁定国内原生态蜂蜜养殖基地，着重打造中华土蜂蜜、特种功效蜂蜜（九龙藤蜜、桉树蜜等）、蜂蜜衍生的保健品和护肤化妆品等特色产品。公司目前主要研发、生产、经营蜂蜜、蜂王浆、蜂胶、蜂花粉、蜂产品护肤品、进口蜂产品等系列产品。基于&quot;把最好的蜂产品留给国人&quot;的经营理念，公司制定的卫生指标、理化指标、感官指标都比出口欧、美、日更为严格。公司拥有数个原生态蜂蜜养殖基地，同时拥有先进的生产工艺和设备、科学规范的经营管理体制、成熟的市场典范。与此同时，成立了以&quot;蜜爱蜜&quot;为服务品牌的蜂产品专卖和健康服务咨询连锁机构。 目前是一家4皇冠淘宝卖家，7年老店。淘宝商城已经上线。淘宝蜂蜜类目排名前三。发展潜力巨大，2011是发力的一年，加入我们就等于选择了成功。公司会为每一位员工提供轻松愉悦的发工作环境和自我成长空间。</p>\r\n<p>\r\n	&quot;蜜爱蜜&quot;作为第一个入驻拍拍的农家蜂蜜直销品牌，蜂蜜自古就受到人们的青睐，进入现代社会后，蜂蜜的市场需求量更是随着人们健康观念的加强急剧上升，因此，大量流水线批量生产的工厂化加工蜂蜜走进了人们的生活。这些蜂蜜一般是提取的未天然成熟的蜂蜜，人工去除水分，浓缩而成，并且含有各种食品添加剂，营养成分在加工过程中损失大半。甚至很多低劣的蜂蜜只是用少量蜂蜜勾兑而成，其营养价值不说，可能还会有害身体健康。<br />\r\n	<br />\r\n	我们深爱着蜜蜂和养蜂人,我们希望更多的喜欢蜂蜜的人去关心和理解辛勤的蜜蜂和养蜂人!大家都象小蜜蜂一样辛勤地工作,在酿造自己的甜蜜和幸福同时,也让更多的人甜蜜和幸福! &mdash;&mdash; 这便是&quot;蜜爱蜜&quot;的品牌内涵。我们一定会本着自己的品牌精神，让各位买家口里品尝到甜蜜的同时，心里也感受到我们最甜蜜的服务～<br />\r\n	&nbsp;</p>\r\n','0','0','1310457916','0','0','0','0','企业介绍','企业介绍','企业介绍','','','','',''),
('2','1','0','品牌故事','','','newspic/239443.jpg','','','/400dianhua//index-1308725024.html','','','','<p><span style=\"color:#000000;\">&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物</span></p>','','','','','<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品牌故事</p>\r\n<p>\r\n	北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承&quot;美好人们的健康生活&quot;的良好愿景，致力于打造国人信赖和热爱的高端保健品和生物化妆品品牌。公司锁定国内原生态蜂蜜养殖基地，着重打造中华土蜂蜜、特种功效蜂蜜（九龙藤蜜、桉树蜜等）、蜂蜜衍生的保健品和护肤化妆品等特色产品。公司目前主要研发、生产、经营蜂蜜、蜂王浆、蜂胶、蜂花粉、蜂产品护肤品、进口蜂产品等系列产品。基于&quot;把最好的蜂产品留给国人&quot;的经营理念，公司制定的卫生指标、理化指标、感官指标都比出口欧、美、日更为严格。公司拥有数个原生态蜂蜜养殖基地，同时拥有先进的生产工艺和设备、科学规范的经营管理体制、成熟的市场典范。与此同时，成立了以&quot;蜜爱蜜&quot;为服务品牌的蜂产品专卖和健康服务咨询连锁机构。 目前是一家4皇冠淘宝卖家，7年老店。淘宝商城已经上线。淘宝蜂蜜类目排名前三。发展潜力巨大，2011是发力的一年，加入我们就等于选择了成功。公司会为每一位员工提供轻松愉悦的发工作环境和自我成长空间。</p>\r\n<p>\r\n	&quot;蜜爱蜜&quot;作为第一个入驻拍拍的农家蜂蜜直销品牌，蜂蜜自古就受到人们的青睐，进入现代社会后，蜂蜜的市场需求量更是随着人们健康观念的加强急剧上升，因此，大量流水线批量生产的工厂化加工蜂蜜走进了人们的生活。这些蜂蜜一般是提取的未天然成熟的蜂蜜，人工去除水分，浓缩而成，并且含有各种食品添加剂，营养成分在加工过程中损失大半。甚至很多低劣的蜂蜜只是用少量蜂蜜勾兑而成，其营养价值不说，可能还会有害身体健康。<br />\r\n	<br />\r\n	我们深爱着蜜蜂和养蜂人,我们希望更多的喜欢蜂蜜的人去关心和理解辛勤的蜜蜂和养蜂人!大家都象小蜜蜂一样辛勤地工作,在酿造自己的甜蜜和幸福同时,也让更多的人甜蜜和幸福! &mdash;&mdash; 这便是&quot;蜜爱蜜&quot;的品牌内涵。我们一定会本着自己的品牌精神，让各位买家口里品尝到甜蜜的同时，心里也感受到我们最甜蜜的服务～<br />\r\n	&nbsp;</p>\r\n','0','0','1310549896','0','1','1','0','品牌故事','品牌故事','品牌故事','','','','',''),
('3','1','0','蜜爱蜜宣言','','','newspic/155645.jpg','','','/400dianhua//index-1308725055.html','','','','<span style=\"color:#3fa701;\">&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司企业简介北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承“美好人们的健康生活”的良好愿景，致力于打造国人信赖和热爱的高端保健品生物</span>','','','','','<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蜜爱蜜</p>\r\n<p>\r\n	&nbsp;北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承&quot;美好人们的健康生活&quot;的良好愿景，致力于打造国人信赖和热爱的高端保健品和生物化妆品品牌。公司锁定国内原生态蜂蜜养殖基地，着重打造中华土蜂蜜、特种功效蜂蜜（九龙藤蜜、桉树蜜等）、蜂蜜衍生的保健品和护肤化妆品等特色产品。公司目前主要研发、生产、经营蜂蜜、蜂王浆、蜂胶、蜂花粉、蜂产品护肤品、进口蜂产品等系列产品。基于&quot;把最好的蜂产品留给国人&quot;的经营理念，公司制定的卫生指标、理化指标、感官指标都比出口欧、美、日更为严格。公司拥有数个原生态蜂蜜养殖基地，同时拥有先进的生产工艺和设备、科学规范的经营管理体制、成熟的市场典范。与此同时，成立了以&quot;蜜爱蜜&quot;为服务品牌的蜂产品专卖和健康服务咨询连锁机构。 目前是一家4皇冠淘宝卖家，7年老店。淘宝商城已经上线。淘宝蜂蜜类目排名前三。发展潜力巨大，2011是发力的一年，加入我们就等于选择了成功。公司会为每一位员工提供轻松愉悦的发工作环境和自我成长空间。</p>\r\n<p>\r\n	&quot;蜜爱蜜&quot;作为第一个入驻拍拍的农家蜂蜜直销品牌，蜂蜜自古就受到人们的青睐，进入现代社会后，蜂蜜的市场需求量更是随着人们健康观念的加强急剧上升，因此，大量流水线批量生产的工厂化加工蜂蜜走进了人们的生活。这些蜂蜜一般是提取的未天然成熟的蜂蜜，人工去除水分，浓缩而成，并且含有各种食品添加剂，营养成分在加工过程中损失大半。甚至很多低劣的蜂蜜只是用少量蜂蜜勾兑而成，其营养价值不说，可能还会有害身体健康。<br />\r\n	<br />\r\n	我们深爱着蜜蜂和养蜂人,我们希望更多的喜欢蜂蜜的人去关心和理解辛勤的蜜蜂和养蜂人!大家都象小蜜蜂一样辛勤地工作,在酿造自己的甜蜜和幸福同时,也让更多的人甜蜜和幸福! &mdash;&mdash; 这便是&quot;蜜爱蜜&quot;的品牌内涵。我们一定会本着自己的品牌精神，让各位买家口里品尝到甜蜜的同时，心里也感受到我们最甜蜜的服务～<br />\r\n	&nbsp;</p>\r\n','0','0','1310348484','0','0','1','0','蜜爱蜜宣言','蜜爱蜜宣言','蜜爱蜜宣言','','','','',''),
('4','1','0','场景展示','','','','','','/400dianhua//index-1308725091.html','','','','','','','','','<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;场景展示</p>\r\n<p>\r\n	北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承&quot;美好人们的健康生活&quot;的良好愿景，致力于打造国人信赖和热爱的高端保健品和生物化妆品品牌。公司锁定国内原生态蜂蜜养殖基地，着重打造中华土蜂蜜、特种功效蜂蜜（九龙藤蜜、桉树蜜等）、蜂蜜衍生的保健品和护肤化妆品等特色产品。公司目前主要研发、生产、经营蜂蜜、蜂王浆、蜂胶、蜂花粉、蜂产品护肤品、进口蜂产品等系列产品。基于&quot;把最好的蜂产品留给国人&quot;的经营理念，公司制定的卫生指标、理化指标、感官指标都比出口欧、美、日更为严格。公司拥有数个原生态蜂蜜养殖基地，同时拥有先进的生产工艺和设备、科学规范的经营管理体制、成熟的市场典范。与此同时，成立了以&quot;蜜爱蜜&quot;为服务品牌的蜂产品专卖和健康服务咨询连锁机构。 目前是一家4皇冠淘宝卖家，7年老店。淘宝商城已经上线。淘宝蜂蜜类目排名前三。发展潜力巨大，2011是发力的一年，加入我们就等于选择了成功。公司会为每一位员工提供轻松愉悦的发工作环境和自我成长空间。</p>\r\n<p>\r\n	&quot;蜜爱蜜&quot;作为第一个入驻拍拍的农家蜂蜜直销品牌，蜂蜜自古就受到人们的青睐，进入现代社会后，蜂蜜的市场需求量更是随着人们健康观念的加强急剧上升，因此，大量流水线批量生产的工厂化加工蜂蜜走进了人们的生活。这些蜂蜜一般是提取的未天然成熟的蜂蜜，人工去除水分，浓缩而成，并且含有各种食品添加剂，营养成分在加工过程中损失大半。甚至很多低劣的蜂蜜只是用少量蜂蜜勾兑而成，其营养价值不说，可能还会有害身体健康。<br />\r\n	<br />\r\n	我们深爱着蜜蜂和养蜂人,我们希望更多的喜欢蜂蜜的人去关心和理解辛勤的蜜蜂和养蜂人!大家都象小蜜蜂一样辛勤地工作,在酿造自己的甜蜜和幸福同时,也让更多的人甜蜜和幸福! &mdash;&mdash; 这便是&quot;蜜爱蜜&quot;的品牌内涵。我们一定会本着自己的品牌精神，让各位买家口里品尝到甜蜜的同时，心里也感受到我们最甜蜜的服务～<br />\r\n	&nbsp;</p>\r\n','0','0','1310020210','0','0','0','0','场景展示','场景展示','场景展示','','','','',''),
('5','1','0','团队生活','','','','','','/400dianhua//index-1308725119.html','','','0','','','','','','<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;北京蜜爱蜜生物科技有限公司是一家集研发、生产、销售、咨询于一体的高科技生物企业。公司秉承&quot;美好人们的健康生活&quot;的良好愿景，致力于打造国人信赖和热爱的高端保健品和生物化妆品品牌。公司锁定国内原生态蜂蜜养殖基地，着重打造中华土蜂蜜、特种功效蜂蜜（九龙藤蜜、桉树蜜等）、蜂蜜衍生的保健品和护肤化妆品等特色产品。公司目前主要研发、生产、经营蜂蜜、蜂王浆、蜂胶、蜂花粉、蜂产品护肤品、进口蜂产品等系列产品。基于&quot;把最好的蜂产品留给国人&quot;的经营理念，公司制定的卫生指标、理化指标、感官指标都比出口欧、美、日更为严格。公司拥有数个原生态蜂蜜养殖基地，同时拥有先进的生产工艺和设备、科学规范的经营管理体制、成熟的市场典范。与此同时，成立了以&quot;蜜爱蜜&quot;为服务品牌的蜂产品专卖和健康服务咨询连锁机构。 目前是一家4皇冠淘宝卖家，7年老店。淘宝商城已经上线。淘宝蜂蜜类目排名前三。发展潜力巨大，2011是发力的一年，加入我们就等于选择了成功。公司会为每一位员工提供轻松愉悦的发工作环境和自我成长空间。</p>\r\n<p>\r\n	&quot;蜜爱蜜&quot;作为第一个入驻拍拍的农家蜂蜜直销品牌，蜂蜜自古就受到人们的青睐，进入现代社会后，蜂蜜的市场需求量更是随着人们健康观念的加强急剧上升，因此，大量流水线批量生产的工厂化加工蜂蜜走进了人们的生活。这些蜂蜜一般是提取的未天然成熟的蜂蜜，人工去除水分，浓缩而成，并且含有各种食品添加剂，营养成分在加工过程中损失大半。甚至很多低劣的蜂蜜只是用少量蜂蜜勾兑而成，其营养价值不说，可能还会有害身体健康。<br />\r\n	<br />\r\n	我们深爱着蜜蜂和养蜂人,我们希望更多的喜欢蜂蜜的人去关心和理解辛勤的蜜蜂和养蜂人!大家都象小蜜蜂一样辛勤地工作,在酿造自己的甜蜜和幸福同时,也让更多的人甜蜜和幸福! &mdash;&mdash; 这便是&quot;蜜爱蜜&quot;的品牌内涵。我们一定会本着自己的品牌精神，让各位买家口里品尝到甜蜜的同时，心里也感受到我们最甜蜜的服务～<br />\r\n	&nbsp;</p>\r\n','0','0','1308725119','0','0','0','0','团队生活','团队生活','团队生活','','','','',''),
('6','3','0','         枣花蜂蜜','','','newspic/520886.jpg','','','/400dianhua//index-1308730335.html','','','','<span style=\"color:#307f00;font-size:12px;\">枣花蜂蜜是蜜蜂采集无污染的枣花花蜜酿制而成，具有气味清香的特点。好吃的不得了，好吃的不得了！</span>','','','','','<div>\r\n	<span style=\"color: #008000\"><span style=\"font-family: arial, helvetica, sans-serif\"><tt>我们的生活活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活我们的生活<span style=\"display: none\">&nbsp;</span></tt></span></span></div>\r\n','0','0','1310027952','0','0','1','1','牧蜂人蜂蜜酒——千年古韵酿琼浆','牧蜂人蜂蜜酒——千年古韵酿琼浆','牧蜂人蜂蜜酒','','','','',''),
('34','3','0','新品上市2','','','','','','/400dianhua//index-1310028054.html','','','','','','','','','','1','0','1310028054','0','','1','','','','','','','','',''),
('35','3','0','新品上市3','','','','','','/400dianhua//index-1310028098.html','','','','','','','','','','1','0','1310028098','0','','1','','','','','','','','',''),
('7','3','0','牧蜂人蜂蜜酒——千年古韵酿琼浆','','','','','','/400dianhua//index-1308730359.html','','','0','','','','','','<p>\r\n	牧蜂人蜂蜜酒&mdash;&mdash;千年古韵酿琼浆牧蜂人蜂蜜酒&mdash;&mdash;千年古韵酿琼浆牧蜂人蜂蜜酒&mdash;&mdash;千年古韵酿琼浆牧蜂人蜂蜜酒&mdash;&mdash;千年古韵酿琼浆牧蜂人蜂蜜酒&mdash;&mdash;千年古韵酿琼浆牧蜂人蜂蜜酒&mdash;&mdash;千年古韵酿琼浆<span style=\\\\\"display: none\\\\\">&nbsp;</span></p>\r\n','0','0','1308730359','0','0','1','0','牧蜂人蜂蜜酒——千年古韵酿琼浆','牧蜂人蜂蜜酒——千年古韵酿琼浆','牧蜂人蜂蜜酒——千年古韵酿琼浆','','','','',''),
('42','21','0','保健系列','','','newspic/834683.jpg','','','/400dianhua//index-1310029751.html','','','','','','','','','','','','1310029751','0','','1','','','','','','','','',''),
('43','24','0','最新推广1','','','newspic/275698.gif','','','/400dianhua//index-1310030510.html','','','','','','','','','','','','1310030531','0','1','1','','','','','','','','',''),
('44','24','0','最新推广2','','','newspic/162347.gif','','','/400dianhua//index-1310030939.html','','','','','','','','','<p>\r\n	推广2</p>\r\n','','','1310031007','0','1','1','','','','','','','','',''),
('45','18','0','资料下载2','','','','','files/801394.txt','/400dianhua//index-1310032631.html','','','','','','','','','','0','','1310032631','0','','','','','','','','','','',''),
('9','11','0','加盟须知','','','','','','/400dianhua//index-1308735222.html','','','0','','','','','','<p>\r\n	<strong>加盟须知</strong><strong>加盟须知</strong><strong>加盟须知&nbsp;</strong><strong>加盟须知</strong><strong>加盟须知</strong><strong>加盟须知</strong></p>\r\n','0','0','1308735222','0','0','0','0','加盟须知','加盟须知','加盟须知','','','','',''),
('10','11','0','加盟政策','','','','','','/400dianhua//index-1308735240.html','','','0','','','','','','<p>\r\n	<strong>加盟政策</strong><strong>加盟政策</strong><strong>加盟政策</strong><strong>加盟政策</strong><strong>加盟政策</strong><strong>加盟政策</strong><strong>加盟政策</strong></p>\r\n','0','0','1308735240','0','0','0','0','加盟政策','加盟政策','加盟政策','','','','',''),
('11','11','0','加盟流程','','','','','','/400dianhua//index-1308735255.html','','','0','','','','','','<p>\r\n	<strong>加盟流程</strong><strong>加盟流程</strong><strong>加盟流程</strong><strong>加盟流程</strong><strong>加盟流程</strong></p>\r\n','0','0','1308735255','0','0','0','0','加盟流程','加盟流程','加盟流程','','','','',''),
('12','11','0','专卖形象','','','','','','/400dianhua//index-1308735274.html','','','0','','','','','','<p>\r\n	<strong>专卖形象</strong><strong>专卖形象</strong><strong>专卖形象&nbsp;</strong><strong>专卖形象</strong><strong>专卖形象</strong></p>\r\n','0','0','1308735274','0','0','0','0','专卖形象','专卖形象','专卖形象','','','','',''),
('13','11','0','营销网络','','','','','','/400dianhua//index-1308735287.html','','','','','','','','','<p>\r\n	<strong>营销网络</strong><strong>营销网络</strong><strong>营销网络&nbsp;</strong><strong>营销网络</strong><strong>营销网络</strong><strong>营销网络</strong></p>\r\n<p>\r\n	<strong><img alt=\"\" src=\"/ckfinder/userfiles/images/201107/1310357701.jpg\" style=\"width: 647px; height: 569px\" /></strong></p>\r\n','0','0','1310357726','0','0','0','0','营销网络','营销网络','营销网络','','','','',''),
('14','15','0','关于我们','','','','','','/400dianhua//index-1308807740.html','','','0','','','','','','<p>\r\n	关于我们关于我们关于我们<span style=\\\\\"display: none\\\\\">&nbsp;</span>关于我们</p>\r\n','0','0','1308807740','0','0','0','0','关于我们','关于我们','关于我们','','','','',''),
('15','15','0','联系我们','','','','','','/400dianhua//index-1308807755.html','','','0','','','','','','<p>\r\n	联系我们联系我们联系我们</p>\r\n','0','0','1308807755','0','0','0','0','联系我们','联系我们','联系我们','','','','',''),
('41','20','0','蜂多宝系列','','','newspic/317254.jpg','','','/400dianhua//index-1310029585.html','','','','','','','','','','','','1310029585','0','','1','','','','','','','','',''),
('17','0','8','','','','newspic/817709.jpg','','','','','','0','','','','','','','0','0','1308810965','0','0','0','0','','','','','','','',''),
('18','0','8','','','','newspic/568457.jpg','','','','','','0','','','','','','','0','0','1308810978','0','0','0','0','','','','','','','',''),
('19','0','8','','','','newspic/650881.jpg','','','','','','0','','','','','','','0','0','1308810991','0','0','0','0','','','','','','','',''),
('21','18','0','资料下载1','','','','','files/825207.doc','/400dianhua//index-1309932241.html','','','','','','','','','','0','0','1310032235','0','0','0','0','','','','','','','',''),
('22','1','0','联系我们','','','','','','/400dianhua//index-1310019283.html','','','','','','','','','<p>\r\n	联系我们联系我们联系我们<span style=\"display: none\">&nbsp;</span>联系我们<span style=\"display: none\">&nbsp;</span>联系我们联系我们</p>\r\n','0','','1310019283','0','','','','联系我们','联系我们','联系我们','','','','',''),
('23','4','0','企业动态1','','','','','','/400dianhua//index-1310020332.html','','','','','','','','','<p>\r\n	企业动态1</p>\r\n','0','1','1310020391','0','','1','','','','','','','','',''),
('24','4','0','企业动态2','','','','','','/400dianhua//index-1310020483.html','','','','','','','','','<p>\r\n	企业动态2</p>\r\n','1','0','1310020578','0','','1','','','','','','','','',''),
('25','5','0','行业新闻1','','','','','','/400dianhua//index-1310020710.html','','','0','','','','','','<p>\r\n	行业新闻1</p>\r\n','1','','1310020710','0','','1','','','','','','','','',''),
('26','5','0','行业新闻2','','','','','','/400dianhua//index-1310020765.html','','','0','','','','','','<p>\r\n	行业新闻2</p>\r\n','1','','1310020765','0','','1','','','','','','','','',''),
('28','22','0','后台添加推广信息','','','newspic/793209.jpg','','','/400dianhua//index-1310021467.html','','','','','','','','','<p>\r\n	后台添加推广信息后台添加推广信息后台添加推广信息后台添加推广信息后台添加推广信息</p>\r\n','0','','1310021468','0','1','1','','后台添加推广信息','后台添加推广信息','后台添加推广信息','','','','',''),
('29','22','0','后台添加推广信息','','','newspic/865939.jpg','','','/400dianhua//index-1310022434.html','','','','','','','','','<p>\r\n	后台添加推广信息后台添加推广信息后台添加推广信息<span style=\"display: none\">&nbsp;</span>后台添加推广信息后台添加推广信息</p>\r\n','0','','1310022434','0','1','1','','后台添加推广信息','后台添加推广信息','后台添加推广信息','','','','',''),
('30','22','0','后台添加推广信息','','','newspic/676699.jpg','','','/400dianhua//index-1310022451.html','','','','','','','','','<p>\r\n	后台添加推广信息后台添加推广信息后台添加推广信息<span style=\"display: none\">&nbsp;</span>后台添加推广信息后台添加推广信息<span style=\"display: none\">&nbsp;</span>后台添加推广信息</p>\r\n','0','','1310022451','0','1','1','','后台添加推广信息','后台添加推广信息','后台添加推广信息','','','','',''),
('39','9','0','蜂王浆系列','','','newspic/838583.jpg','','','/400dianhua//index-1310029375.html','','','','','','','','','','','','1310029375','0','','1','','','','','','','','',''),
('40','10','0','蜂胶系列','','','newspic/755444.jpg','','','/400dianhua//index-1310029476.html','','','','','','','','','','','','1310029476','0','','1','','','','','','','','',''),
('38','8','0','蜂花粉','','','newspic/742178.jpg','','','/400dianhua//index-1310029097.html','','','','','','','','','','','','1310029097','0','','1','','','','','','','','',''),
('32','7','0','测试产品信息','','','newspic/536157.jpg','','','/400dianhua//index-1310022613.html','','','','','','','','','<p>\r\n	测试产品信息测试产品信息<span style=\"display: none\">&nbsp;</span>测试产品信息测试产品信息</p>\r\n','0','','1310022613','0','1','1','1','测试产品信息','测试产品信息','测试产品信息','','','','',''),
('46','3','0','新品上市11','','','','','','/400dianhua//index-1310348961.html','','','','','','','','','','1','1','1310348961','0','1','1','','','','','','','','',''),
('47','26','0','礼盒系列','','','newspic/701309.jpg','','','/400dianhua//index-1310349438.html','','','','','','','','','','','','1310349438','0','','1','','','','','','','','',''),
('48','27','0','日化系列','','','newspic/974621.jpg','','','/400dianhua//index-1310349556.html','','','','','','','','','','','','1310349556','0','','1','','','','','','','','',''),
('49','3','0','新品上市111','','','','','','/400dianhua//index-1310433446.html','','','','','','','','','','1','1','1310433446','0','','1','','','','','','','','',''),
('36','3','0','新品上市4','','','','','','/400dianhua//index-1310028149.html','','','','','','','','','','1','1','1310028149','0','1','1','','','','','','','','',''),
('37','3','0','新品上市5','','','','','','/400dianhua//index-1310028231.html','','','','','','','','','','1','1','1310028231','0','','1','','','','','','','','',''),
('50','3','0','新品上市1111','','','','','','/400dianhua//index-1310457024.html','','','','','','','','','','1','1','1310457024','0','','1','','','','','','','','',''),
('51','4','0','企业动态11','','','','','','/400dianhua//index-1310457079.html','','','','','','','','','','1','1','1310457079','0','','1','','','','','','','','','')");

tableend("news");

create("news_zilei"," (\n  `id` int(9) NOT NULL auto_increment,\n  `fuid` int(9) NOT NULL,\n  `zititle` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `ziname` varchar(100) collate utf8_unicode_ci NOT NULL,\n  `yzititle` varchar(255) collate utf8_unicode_ci NOT NULL,\n  `times` varchar(10) collate utf8_unicode_ci NOT NULL,\n  `zileipx` varchar(50) collate utf8_unicode_ci NOT NULL default '0',\n  `ziimage` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `type` text collate utf8_unicode_ci NOT NULL,\n  `tuijian` varchar(50) collate utf8_unicode_ci NOT NULL default '0',\n  `gid` int(3) NOT NULL default '0',\n  `xiangmu` varchar(255) collate utf8_unicode_ci NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

insert("('1','0','关于蜜爱蜜','关于密爱密','','1310021425','0','','','1','0','s_1,s_6,s_9,s_10,s_11,s_12,s_13,s_14'),
('2','0','密爱密资讯','密爱密资讯','','1308728552','0','','','0','1',''),
('3','2','新品上市','新品上市','','1308728583','0','','','0','0','s_1,s_2,s_6,s_9,s_10,s_11,s_12,s_13,s_14'),
('4','2','企业动态','企业动态','','1308728600','0','','','0','0','s_1,s_4,s_8,s_12,s_13,s_14'),
('5','2','行业新闻','行业新闻','','1308728655','0','','','0','0','s_1,s_2,s_3,s_4,s_5,s_6,s_7,s_8,s_9,s_10,s_11,s_12,s_13,s_14,s_15,s_16'),
('6','0','产品展示','产品展示','','1308732365','0','','','0','1',''),
('7','6','          蜂 蜜 系 列','枣花蜂蜜','','1310021720','0','','','1','0','s_1,s_2,s_6,s_9,s_10,s_11,s_12,s_14'),
('8','6','蜂花粉系列','尚品荆花蜂蜜','','1310021196','0','','','1','0','s_1,s_6,s_14'),
('9','6','蜂王浆系列','蜂蜜系类','','1310021210','0','','','1','0','s_1,s_4,s_6,s_14'),
('10','6','蜂 胶 系 列','蜂胶系列','','1310021500','0','','','1','0','s_1,s_6,s_13,s_14'),
('11','0','加盟密爱密','加盟密爱密','','1308735186','0','','','0','0','s_1,s_9,s_10,s_11,s_12,s_14'),
('12','0','蜂产品天地','蜂产品天地','','1308735724','0','','','0','1',''),
('13','12','蜂产品知识','峰产品知识','','1310022941','0','','','0','0',''),
('14','12','蜂产品保健','蜂产品保健','','1308736174','0','','','0','0',''),
('15','0','单条信息','单条信息','','1308807713','0','','','0','0','s_1,s_9,s_10,s_11,s_14'),
('17','0','相约蜜爱蜜','相约蜜爱蜜','','1309931904','0','','','0','1',''),
('18','17','资料下载','资料下载','','1309931917','0','','','0','0','s_1,s_8,s_12'),
('19','0','最新推广','最新推广','','1310021358','0','','','0','1','s_1,s_6,s_9,s_10,s_11,s_12,s_14'),
('20','6','蜂多宝系列','','','1310021312','0','','','0','0','s_1,s_2,s_6,s_13,s_14'),
('21','6','保 健 系 列','','','1310021521','0','','','0','0','s_1,s_6,s_13,s_14'),
('24','19','关注推广','','','1310031635','0','','','0','0','s_1,s_6,s_13,s_14'),
('26','6','礼 盒 系 列','','','1310349320','0','','','0','0','s_1,s_2,s_6,s_14'),
('27','6','日 化 系 列','','','1310349339','0','','','0','0','s_1,s_6,s_14')");

tableend("news_zilei");

create("pollitem"," (\n  `id` int(9) NOT NULL auto_increment,\n  `tid` int(9) NOT NULL,\n  `pollitem` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `poll` int(9) NOT NULL default '0',\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

tableend("pollitem");

create("polltitle"," (\n  `id` int(9) NOT NULL auto_increment,\n  `title` varchar(50) collate utf8_unicode_ci default NULL,\n  `pollType` int(2) NOT NULL,\n  `show` int(2) NOT NULL default '0',\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

tableend("polltitle");

create("replay"," (\n  `id` int(9) NOT NULL auto_increment,\n  `leaveId` int(9) NOT NULL default '0',\n  `replayContent` text collate utf8_unicode_ci NOT NULL,\n  `replayTime` varchar(10) collate utf8_unicode_ci NOT NULL,\n  `username` varchar(50) collate utf8_unicode_ci NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

insert("('48','8','我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留','1292508309','liwqbj'),
('49','8','我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留','1292508341','liwqbj'),
('50','8','我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留个言我来留','1292508346','liwqbj')");

tableend("replay");

create("user"," (\n  `uid` int(9) NOT NULL auto_increment,\n  `username` varchar(50) collate utf8_unicode_ci default NULL,\n  `password` varchar(50) collate utf8_unicode_ci default NULL,\n  `nickname` varchar(50) collate utf8_unicode_ci default NULL,\n  `age` int(3) default NULL,\n  `gender` int(2) default NULL,\n  `birthday` date default NULL,\n  `face` varchar(50) collate utf8_unicode_ci default NULL,\n  `email` varchar(50) collate utf8_unicode_ci default NULL,\n  `tel` varchar(20) collate utf8_unicode_ci default NULL,\n  `youbian` varchar(50) collate utf8_unicode_ci default NULL,\n  `state` int(2) default '0',\n  `QQ` varchar(50) collate utf8_unicode_ci default NULL,\n  `scx` varchar(50) collate utf8_unicode_ci default NULL,\n  `dizhi` varchar(50) collate utf8_unicode_ci default NULL,\n  `aihao` int(3) default '0',\n  `jifen` int(9) NOT NULL default '0',\n  `image` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `times` varchar(10) collate utf8_unicode_ci default NULL,\n  PRIMARY KEY  (`uid`)\n) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

tableend("user");

create("weijingtai"," (\n  `id` int(11) NOT NULL auto_increment,\n  `shou` int(11) NOT NULL default '0',\n  `gongsi` int(11) NOT NULL default '0',\n  `kaihu` int(11) NOT NULL default '0',\n  `fuwu` int(11) NOT NULL default '0',\n  `zounian` int(11) NOT NULL default '0',\n  `shuiwu` int(11) NOT NULL default '0',\n  `renzhen` int(11) NOT NULL default '0',\n  `zhuanli` int(11) NOT NULL default '0',\n  `liuxue` int(11) NOT NULL default '0',\n  `qita` int(11) NOT NULL default '0',\n  `xinwen` int(11) NOT NULL default '0',\n  `huoban` int(11) NOT NULL default '0',\n  `dantiao` int(11) NOT NULL default '0',\n  `lian` int(11) NOT NULL default '0',\n  `shangbiao` int(11) NOT NULL default '0',\n  `zhenzhi` int(11) NOT NULL default '0',\n  PRIMARY KEY  (`id`)\n) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

insert("('1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')");

tableend("weijingtai");

create("zxxd"," (\n  `id` int(11) NOT NULL auto_increment,\n  `names` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `Company` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `tel` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `add` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `email` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `website` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `checkbox` text collate utf8_unicode_ci NOT NULL,\n  `sl` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `fuxian` text collate utf8_unicode_ci NOT NULL,\n  `file` varchar(50) collate utf8_unicode_ci NOT NULL,\n  `MailContent` text collate utf8_unicode_ci NOT NULL,\n  `times` varchar(10) collate utf8_unicode_ci NOT NULL,\n  PRIMARY KEY  (`id`)\n) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

insert("('3','1111111','1111111111111','11111111111','11111111111','11111111111','111111111','翻译&nbsp;&nbsp;|&nbsp;&nbsp;校对&nbsp;&nbsp;|&nbsp;&nbsp;翻译+编辑+校对&nbsp;&nbsp;|&nbsp;&nbsp;网站本地化&nbsp;&nbsp;|&nbsp;&nbsp;软件本地化&nbsp;&nbsp;|&nbsp;&nbsp;口译&nbsp;&nbsp;|&nbsp;&nbsp;口译&nbsp;&nbsp;|&nbsp;&nbsp;口译','日语','英语&nbsp;&nbsp;|&nbsp;&nbsp;阿拉伯语&nbsp;&nbsp;|&nbsp;&nbsp;白俄罗斯语&nbsp;&nbsp;|&nbsp;&nbsp;保加利亚语&nbsp;&nbsp;|&nbsp;&nbsp;冰岛语&nbsp;&nbsp;|&nbsp;&nbsp;冰岛语&nbsp;&nbsp;|&nbsp;&nbsp;德语&nbsp;&nbsp;|&nbsp;&nbsp;俄语&nbsp;&nbsp;|&nbsp;&nbsp;法语&nbsp;&nbsp;|&nbsp;&nbsp;菲律宾语&nbsp;&nbsp;|&nbsp;&nbsp;芬兰语&nbsp;&nbsp;|&nbsp;&nbsp;格鲁吉亚语','/files/796505.doc','啊是大大的','1287589234')");

tableend("zxxd");

echo '<center><BR><BR><BR><BR>完成。所有数据都已经导入数据库中。</center>	<br><br><font color=red><b>AD位 PHP主力技术论坛：<a href=\'http://www.phpso.com\' target=\'_blank\'>PHPSO.COM</a></b> </font><br>
	<B>	<font color=red>QQ群：6116767</font></B>'; exit; ?>