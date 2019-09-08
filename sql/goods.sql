-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019-05-03 23:46:26
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `GID` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `picture` varchar(255) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `seller` varchar(255) NOT NULL,
  `SID` int(10) NOT NULL,
  `SName` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `introduce` varchar(255) NOT NULL,
  `second_picture` varchar(255) NOT NULL,
  `third_picture` varchar(255) NOT NULL,
  `kind` varchar(255) NOT NULL,
  PRIMARY KEY (`GID`),
  KEY `SID` (`SID`),
  KEY `SName` (`SName`),
  KEY `SName_2` (`SName`),
  KEY `SName_3` (`SName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=61 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`GID`, `name`, `price`, `picture`, `amount`, `seller`, `SID`, `SName`, `discount`, `introduce`, `second_picture`, `third_picture`, `kind`) VALUES
(1, '富士山苹果', 10.50, 'goods/2.png', 5, '李浩明', 4, '安源味道食品专卖店', '新鲜红富士 买5斤送5斤，净重9斤、领券立减', '苹果水果当季新鲜红富士10斤包邮应季陕西洛川萍果一整箱吃的脆甜', 'photo/1.jpg', 'photo/test.png', '食品饮料'),
(2, '徐福记巧克力球', 25.00, 'goods/3.png', 100, '李浩明', 4, '安源味道食品专卖店', '400g约31粒 500g约39粒 10KG约800粒', '丝滑牛奶巧克力碗装甜蜜糖巧休闲零食', 'goods/3.png', 'photo/test.png', '食品饮料'),
(3, '德国进口脱脂牛奶', 21.00, 'goods/6.png', 100, '李浩明', 4, '安源味道食品专卖店', '商品已包税', '【直营】德国进口脱脂纯牛奶1L*10盒/箱青少年', 'photo/1.jpg', 'photo/test.png', '食品饮料'),
(4, '粉色妖姬鸡尾酒', 57.00, 'goods/8.png', 498, '李浩明', 4, '安源味道食品专卖店', '“美食节”优惠价:￥57.00', '预调酒美国进口洋酒网红鸡尾酒一罐装', 'goods/8.png', 'photo/test.png', '酒类'),
(5, '小米手机min', 998.00, 'goods/1.png', 1000, '雷有智', 2, '雅文数码专卖店', '小米周年庆优惠活动', '【现货开售】Xiaomi/小米 Redmi 红米Note7 大屏幕智能4800万老人手机新9官方旗舰店正品5学生note7pro', 'goods/1.png', 'photo/test.png', '手机'),
(6, 'ipad', 5850.00, 'goods/5.png', 10000, '雷有智', 2, '雅文数码专卖店', '花呗12月分期付款免利息', 'Apple/苹果 iPad mini', 'goods/5.png', 'photo/test.png', '数码'),
(7, '柔道服', 100.00, 'goods/4.png', 100, '雷嘉敏', 3, '魅力惠旗舰店', '领券最高可享受7折优惠', '无懈可击！！柔道服加厚标准男女纯棉柔道服', '', '', '其他服饰'),
(8, '万宝龙尊享版女款钻表', 2900.00, 'goods/16.png', 10, '雷嘉敏', 3, '魅力惠旗舰店', '双倍积分', '万宝龙宝曦女款116501腕表，尽显女性柔美', '', '', '钟表'),
(11, '外星人游戏本', 12999.00, 'goods/11.png', 120, 'Lae.Smith', 1, '里昂家电旗舰', '狂欢节劲爆价12999元', '外星人alienware 全新ALWA51M 17.3英寸九代八核i9 RTX2080 8G独显144hz游戏笔记本电脑ALWA51M-1968戴尔', 'goods/11.png', 'photo/test.png', '电脑'),
(12, '瑞达闹钟', 56.00, 'goods/12.png', 1000, '雷有智', 2, '雅文数码专卖店', '狂欢节价56元', '静音床头 功能简约闹铃夜光小闹钟', 'goods/12.png', 'photo/test.png', '钟表'),
(13, 'Hisense/海信液晶电视机', 8999.00, 'goods/13.png', 80000, 'Lae.Smith', 1, '里昂家电旗舰', '家电促销活动优惠价￥8999', 'Hisense/海信 H50E3A 50英寸4K超清 HDR人工智能液晶平板电视机', 'photo/tv1.jpg', 'photo/tv2.jpg', '家用电器'),
(14, '佳能单反C10摄像机', 2399.00, 'goods/14.png', 50000, '雷有智', 2, '雅文数码专卖店', '狂欢节劲爆价2933元', 'Canon佳能6D机身全画幅入门级单反家用运动专业高清数码相机', 'goods/14.png', 'photo/test.png', '数码'),
(37, '电子钟表', 56.50, 'goods/12_1.png', 6, '联想', 11, '钟表世家', '满50领券立减10元', '智能音乐电子闹钟万年历客厅卧室静音台式座钟简约家用LED时钟表', 'goods/12_1.png', 'photo/test.png', '钟表'),
(43, '耐克PEGAUS 35跑鞋', 899.00, 'goods/7.png', 500, '雷嘉敏', 3, '魅力惠旗舰店', '运动节惊喜价899元', '购买可得449积分', '', '', '鞋靴'),
(44, '香奈儿香水', 299.00, 'goods/10.png', 500, '雷嘉敏', 3, '魅力惠旗舰店', '满299减20券', '正品Chanel/香奈儿香水橙色邂逅淡香水清新持久', '', '', '个护化状');

--
-- 限制导出的表
--

--
-- 限制表 `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `seller` (`SID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
