
At 2015-11-05 17:42:53

DROP TABLE  IF EXISTS `gzb_activity_order`;
CREATE TABLE `gzb_activity_order` (
  `orderid` bigint(26) NOT NULL COMMENT '订单流水号',
	`name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `phone` varchar(50) DEFAULT NULL COMMENT '手机号码',
  `address` varchar(255) DEFAULT NULL COMMENT '收货地址',
  `goods_id` int(11) not NULL COMMENT '商品ID',
	`goods_name` varchar(255) DEFAULT NULL COMMENT '商品名',
	`godds_price` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
	`pay_type` tinyint(2) DEFAULT '0' COMMENT '支付类别 1 微信，2线下',

	`order_status` tinyint(2) DEFAULT '0' COMMENT '订单状态,0未确认，1未发货，2,已发货，3取消',
	`pay_status` tinyint(2) DEFAULT '0' COMMENT '支付状态，0未支付，1支付中，2支付成功，3支付失败',
	`note`  varchar(255) DEFAULT NULL COMMENT '备注',	
	`pay_price` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '偿还数额',
	`pay_at` timestamp NULL COMMENT '支付时间',
	`confirm_at` timestamp NULL COMMENT '确认时间',
	`cancel_at` timestamp NULL COMMENT '取消时间',

	`deliver_at` timestamp NULL COMMENT '发货时间',
	`delivery_goods_serial` varchar(255) DEFAULT NULL COMMENT '发货-商品序列',
	`delivery_id` varchar(255) DEFAULT NULL COMMENT '发货-快递单号',
	`delivery_name` varchar(255) DEFAULT NULL COMMENT '发货-快递类别',
	
	`created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT '下单时间',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='线下销存订单表';

DROP TABLE  IF EXISTS `gzb_activity_goods`;
CREATE TABLE `gzb_activity_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品ID',
	`goods_name` varchar(255) DEFAULT NULL COMMENT '商品名',
	`godds_price` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
	`goods_stock` int(11) DEFAULT 0 COMMENT '商品库存',
	`goods_status` tinyint(2) DEFAULT '1' COMMENT '商品状态,0下架，1上架',
	`created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='线下销存商品表';
