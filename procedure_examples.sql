/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : gzb_ol_0824

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2016-01-30 14:12:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Procedure structure for clearVersionThreeOrder
-- ----------------------------
DROP PROCEDURE IF EXISTS `clearVersionThreeOrder`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `clearVersionThreeOrder`(
	IN _in_phone VARCHAR(20)
)
BEGIN
	DECLARE _uid BIGINT ;
	DECLARE _orderid VARCHAR(40);
	DECLARE _done TINYINT ;
	DECLARE _cursor CURSOR FOR SELECT orderid FROM gzb_order_main WHERE uid = _uid AND order_version = 3;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET _done = 1 ;
	SELECT uid INTO _uid FROM gzb_user_account WHERE phone = _in_phone;
	SET _done = 0 ;
	OPEN _cursor ;
	_cursor_loop:LOOP
		IF _done = 1 THEN
			LEAVE _cursor_loop;
		ELSE
			FETCH _cursor INTO _orderid;
			START TRANSACTION;
			DELETE FROM gzb_order_main WHERE orderid = _orderid;
			DELETE FROM gzb_order_periods WHERE orderid = _orderid;
			DELETE FROM gzb_order_pay WHERE orderid = _orderid;
			DELETE FROM gzb_order_pay_task WHERE orderid = _orderid;
			DELETE FROM gzb_order_suborder WHERE uid = _uid;
			DELETE FROM gzb_user_credit_account WHERE uid = _uid;
			COMMIT;
		END IF;
	END LOOP;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for create_blue
-- ----------------------------
DROP PROCEDURE IF EXISTS `create_blue`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_blue`(
	IN _in_phone varchar(20)
)
BEGIN
	DECLARE _uid VARCHAR(20);
	DECLARE _code VARCHAR(20);
	SET _uid = NULL;
	SELECT uid into _uid  FROM gzb_user_account WHERE phone = _in_phone;
	
	IF _uid IS NULL THEN 
		START TRANSACTION ;
		INSERT INTO gzb_user_account(`phone`,`password`,`salt`,`created_at`)
			VALUES(_in_phone,'35c2cb8001987f43564a4a480751bd98','RAXqq2DE',now());
		SELECT uid into _uid  FROM gzb_user_account WHERE phone = _in_phone;
		
		INSERT INTO `gzb_user_redpacket_account` (`uid`, `user_type`,  `phone`,  `status`, `created_at`) 
			VALUES (_uid, '1', _in_phone, 2, now());
		SELECT my_code INTO _code FROM gzb_user_redpacket_code WHERE uid is NULL limit 1;
		UPDATE gzb_user_redpacket_code SET uid = _uid WHERE my_code = _code AND uid IS NULL;
		UPDATE gzb_user_account SET phone = CONCAT('9',SUBSTR(phone,2))  WHERE uid = _uid;
		SELECT _code;
		COMMIT;
	ELSE
		SELECT 'Registered';
	END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for delete_account
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_account`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_account`(IN in_phone VARCHAR(20))
BEGIN   
DECLARE uuid INT(11);   
SELECT uid INTO uuid FROM gzb_user_account WHERE phone = in_phone LIMIT 1;
IF uuid is not NULL THEN
	DELETE FROM gzb_user_account WHERE uid = uuid;
	DELETE FROM gzb_user_redpacket_account WHERE uid = uuid;
	DELETE FROM gzb_user_redpacket WHERE uid = uuid;
	UPDATE gzb_user_redpacket_code SET uid = null,from_code=NULL,from_uid = null WHERE uid = uuid;
ELSE
	SELECT 'UID Not Found';
END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for info_selector
-- ----------------------------
DROP PROCEDURE IF EXISTS `info_selector`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `info_selector`(IN in_uid VARCHAR(20))
BEGIN   
	DECLARE uuid INT(11);   
  DECLARE in_phone VARCHAR(20);  
	DECLARE umy_code VARCHAR(20);   
	DECLARE is_cheat VARCHAR(20);
	DECLARE is_black VARCHAR(20);
  DECLARE is_from_black VARCHAR(20);
	DECLARE is_from_cheat VARCHAR(20);
	DECLARE ufrom_code VARCHAR(20);
	DECLARE ufrom_uid INT(11);
	DECLARE ufrom_phone VARCHAR(20);
  DECLARE uuser_type VARCHAR(20);
  DECLARE upromotion_type VARCHAR(20);
	SELECT uid ,phone INTO uuid,in_phone FROM gzb_user_account WHERE uid = in_uid LIMIT 1;
	IF uuid is not NULL THEN
		#user cheat
		SELECT phone INTO is_cheat FROM gzb_user_cheat WHERE phone = in_phone;
		IF is_cheat IS NOT NULL THEN
			SET is_cheat = 'YES';
		ELSE
			SET is_cheat = 'NO';
		END IF;
	  SELECT user_type INTO uuser_type FROM gzb_user_redpacket_account WHERE uid = uuid;
		IF uuser_type = 1 THEN
			SET uuser_type = 'blue';
		ELSE
			SET uuser_type = 'normal';
		END IF;

		SELECT my_code,from_code,from_uid,type INTO umy_code,ufrom_code,ufrom_uid,upromotion_type  FROM gzb_user_redpacket_code WHERE uid = uuid;
		SELECT credit_status INTO is_black FROM gzb_user_info WHERE uid = uuid;
		#from user cheat
		IF ufrom_code IS NOT NULL THEN
			SELECT phone INTO ufrom_phone FROM gzb_user_account WHERE  uid = ufrom_uid;
			SELECT phone INTO is_from_cheat FROM gzb_user_cheat WHERE phone = ufrom_phone;
			SELECT credit_status INTO is_from_black FROM gzb_user_info WHERE uid = ufrom_uid;
			IF is_from_cheat IS NOT NULL THEN
				SET is_from_cheat = 'YES';
			ELSE
				SET is_from_cheat = 'NO';
			END IF;
		
			IF is_from_black = 3 THEN
				SET is_from_black = 'YES';
			ELSE
				SET is_from_black = 'NO';
			END IF;
		END IF;
		IF is_black = 3 THEN
			SET is_black = 'YES';
		ELSE
			SET is_black = 'NO';
		END IF;

		SELECT 	in_phone  ,
						uuid      ,
						uuser_type,
						upromotion_type,
						umy_code,
						is_cheat,
						is_black   ,
						ufrom_phone,
						ufrom_uid,
						ufrom_code,
						is_from_cheat,
						is_from_black;
	ELSE
		SELECT 'UID Not Found';
	END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for payway_holding_select
-- ----------------------------
DROP PROCEDURE IF EXISTS `payway_holding_select`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `payway_holding_select`(
	IN _in_phone VARCHAR(20)
)
BEGIN
	DECLARE _uid BIGINT ;
	SET _uid = 0;
	SELECT uid INTO _uid FROM gzb_user_account WHERE phone = '18566350820';
	IF _uid = 0 THEN
		SELECT * FROM gzb_user_payway_holding_task WHERE uid = _uid;
		SELECT * FROM gzb_order_pay WHERE uid = _uid;
	ELSE 
		SELECT 'Account ';
	END IF;
	
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for reset_order_date
-- ----------------------------
DROP PROCEDURE IF EXISTS `reset_order_date`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `reset_order_date`(IN in_orderid VARCHAR(30),IN in_days INT(11))
BEGIN  
	START TRANSACTION ;
	CALL set_table_date('gzb_order_main','pay_at','orderid',in_orderid,in_days);
	CALL set_table_date('gzb_order_main','created_at','orderid',in_orderid,in_days);
	CALL set_table_date('gzb_order_main','updated_at','orderid',in_orderid,in_days);

	CALL set_table_date('gzb_order_pay','created_at','orderid',in_orderid,in_days);
	CALL set_table_date('gzb_order_pay','pay_at','orderid',in_orderid,in_days);
	CALL set_table_date('gzb_order_pay','payment_at','orderid',in_orderid,in_days);
	CALL set_table_date('gzb_order_pay','updated_at','orderid',in_orderid,in_days);

	CALL set_table_date('gzb_order_periods','created_at','orderid',in_orderid,in_days);
	CALL set_table_date('gzb_order_periods','updated_at','orderid',in_orderid,in_days);

	CALL set_table_date('gzb_order_pay_task','created_at','orderid',in_orderid,in_days);
	CALL set_table_date('gzb_order_pay_task','updated_at','orderid',in_orderid,in_days);
	CALL set_table_date('gzb_order_task','created_at','orderid',in_orderid,in_days);
	CALL set_table_date('gzb_order_task','updated_at','orderid',in_orderid,in_days);
	UPDATE gzb_order_pay SET dalay_price = 0 WHERE orderid = in_orderid AND pay_at >= now();
	COMMIT;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for select_info
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_info`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_info`(
	IN in_data_type VARCHAR(20),
	IN in_data VARCHAR(20)
)
BEGIN   
	DECLARE uuid INT(11);   
	IF in_data_type = 'uid' THEN 
			set uuid = in_data;
	ELSEIF in_data_type = 'phone' THEN 
			SELECT uid INTO uuid FROM gzb_user_account WHERE phone = in_data LIMIT 1;
	ELSEIF in_data_type = 'code' THEN 
			SELECT uid INTO uuid FROM gzb_user_redpacket_code WHERE my_code = in_data LIMIT 1;
	ELSE
			SELECT 'in_data_type Not Validate';
  END IF;
	
	IF uuid is not NULL THEN
		CALL info_selector(uuid);
	ELSE
		SELECT 'UID Not Found';
	END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for select_info_by_code
-- ----------------------------
DROP PROCEDURE IF EXISTS `select_info_by_code`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_info_by_code`(IN umy_code VARCHAR(20))
BEGIN   
	DECLARE uuid INT(11);  
  DECLARE in_phone VARCHAR(20);   
	DECLARE is_cheat VARCHAR(20);
	DECLARE is_black VARCHAR(20);
  DECLARE is_from_black VARCHAR(20);
	DECLARE is_from_cheat VARCHAR(20);
	DECLARE ufrom_code VARCHAR(20);
	DECLARE ufrom_uid INT(11);
	DECLARE ufrom_phone VARCHAR(20);

	select uid into uuid FROM gzb_user_redpacket_code WHERE my_code = umy_code;
	IF uuid is not NULL THEN
		SELECT phone INTO in_phone FROM gzb_user_account WHERE uid = uuid;
		SELECT phone INTO is_cheat FROM gzb_user_cheat WHERE phone = in_phone;
		IF is_cheat IS NOT NULL THEN
			SET is_cheat = 'YES';
		ELSE
			SET is_cheat = 'NO';
		END IF;
		SELECT my_code,from_code,from_uid INTO umy_code,ufrom_code,ufrom_uid  FROM gzb_user_redpacket_code WHERE uid = uuid;
		SELECT credit_status INTO is_black FROM gzb_user_info WHERE uid = uuid;
		#from user cheat
		IF ufrom_code IS NOT NULL THEN
			SELECT phone INTO ufrom_phone FROM gzb_user_account WHERE  uid = ufrom_uid;
			SELECT phone INTO is_from_cheat FROM gzb_user_cheat WHERE phone = ufrom_phone;
			SELECT credit_status INTO is_from_black FROM gzb_user_info WHERE uid = ufrom_uid;
			IF is_from_cheat IS NOT NULL THEN
				SET is_from_cheat = 'YES';
			ELSE
				SET is_from_cheat = 'NO';
			END IF;
		
			IF is_from_black = 3 THEN
				SET is_from_black = 'YES';
			ELSE
				SET is_from_black = 'NO';
			END IF;
		END IF;
		IF is_black = 3 THEN
			SET is_black = 'YES';
		ELSE
			SET is_black = 'NO';
		END IF;

		SELECT 	in_phone  ,
						uuid      ,
						umy_code,
						is_cheat,
						is_black   ,
						ufrom_phone,
						ufrom_uid,
						ufrom_code,
						is_from_cheat,
						is_from_black;
	ELSE
		SELECT 'UID Not Found';
	END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for set_table_date
-- ----------------------------
DROP PROCEDURE IF EXISTS `set_table_date`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `set_table_date`(
	IN in_table_name VARCHAR(30),
	IN in_col_name VARCHAR(30),
	IN in_select_col VARCHAR(30),
  IN in_select_val VARCHAR(30),
	IN in_days int(11)
)
BEGIN   
	DECLARE forward_seconds INT(11);  
	DECLARE exec_sql VARCHAR(500);   
	DECLARE has_updated_at VARCHAR(50);
	DECLARE updated_at_val VARCHAR(50);
	SET forward_seconds = 86400 * in_days;
	SELECT COLUMN_NAME INTO has_updated_at FROM INFORMATION_SCHEMA.COLUMNS  WHERE   table_schema = DATABASE() AND TABLE_NAME = in_table_name AND COLUMN_NAME = 'updated_at';
	IF has_updated_at = 'updated_at' AND in_col_name != 'updated_at' THEN
		SET @update_sql =  CONCAT('UPDATE ',in_table_name,' SET updated_at = updated_at,',in_col_name,' = FROM_UNIXTIME(UNIX_TIMESTAMP(',in_col_name,') + ',forward_seconds,')',' WHERE ',in_select_col,' = "',in_select_val,'"');
	ELSE 
		SET @update_sql =  CONCAT('UPDATE ',in_table_name,' SET ',in_col_name,' = FROM_UNIXTIME(UNIX_TIMESTAMP(',in_col_name,') + ',forward_seconds,')',' WHERE ',in_select_col,' = "',in_select_val,'"');
	END IF;
	prepare stmt from @update_sql; 
	EXECUTE stmt;     
	deallocate prepare stmt;   
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for test
-- ----------------------------
DROP PROCEDURE IF EXISTS `test`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `test`()
BEGIN
	CALL __tmp_process('CREATE');

	CALL __tmp_process('INIT');

	CALL user_info_selector(139334);
	CALL __tmp_table_select_first('__tmp_select_02','_key_1');

	CALL user_redpacket_selector(139334);
	CALL __tmp_table_select_first('__tmp_select_02','_key_2');

	CALL __tmp_process('SELECT');

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for text
-- ----------------------------
DROP PROCEDURE IF EXISTS `text`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `text`()
BEGIN
	CALL __tmp_process('CREATE');

	CALL __tmp_process('INIT');

	CALL user_info_selector(139334);
	CALL __tmp_table_select_first('__tmp_select_02','_key_1');

	CALL user_redpacket_selector(139334);
	CALL __tmp_table_select_first('__tmp_select_02','_key_2');

	CALL __tmp_process('SELECT');

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for user_info_selector
-- ----------------------------
DROP PROCEDURE IF EXISTS `user_info_selector`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `user_info_selector`(
	IN _in_uid int 
)
BEGIN 
	DECLARE _phone VARCHAR(50);
	DECLARE _region VARCHAR(50)  character set 'utf8';
	DECLARE _register_at VARCHAR(50);
	DECLARE _name VARCHAR(50)  character set 'utf8';
	DECLARE _qq VARCHAR(50);
	DECLARE _company VARCHAR(50)  character set 'utf8';
	DECLARE _identity VARCHAR(50);
	DECLARE _created_at VARCHAR(50);
	DECLARE _audit_status VARCHAR(50);
	DECLARE _credit_status VARCHAR(50);
	DECLARE _fraudmetrix_status VARCHAR(50);
	DECLARE _area_id VARCHAR(50);
	DECLARE _address VARCHAR(50)  character set 'utf8';
	DECLARE _card VARCHAR(50);
	DECLARE _payname VARCHAR(50)  character set 'utf8';
				

	SELECT phone , CONCAT(province,' ',city,' ',areacode) region,created_at as register_at 
		INTO  _phone , _region,_register_at 
			FROM gzb_user_account WHERE uid = _in_uid;
	SELECT `name`,qq,company,identity,created_at,audit_status,credit_status,fraudmetrix_status 
		INTO _name,_qq,_company,_identity,_created_at,_audit_status,_credit_status,_fraudmetrix_status 
			FROM gzb_user_info WHERE uid = _in_uid;
	SELECT area_id,address 
		INTO _area_id,_address 
			FROM gzb_user_address WHERE type= 1 AND uid = _in_uid;
	SELECT card ,payname 
		INTO _card ,_payname 
			FROM gzb_user_payway WHERE uid = _in_uid;

	DROP TABLE IF EXISTS `__tmp_select_02`;
	CREATE TABLE `__tmp_select_02` CHARACTER SET utf8 
	AS
	SELECT 
		_phone,
		_region ,
		_register_at ,
		_name ,
		_qq ,
		_company ,
		_identity,
		_created_at ,
		_audit_status ,
		_credit_status ,
		_fraudmetrix_status ,
		_area_id ,
		_address ,
		_card ,
		_payname ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for user_redpacket_selector
-- ----------------------------
DROP PROCEDURE IF EXISTS `user_redpacket_selector`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `user_redpacket_selector`(
	IN _in_uid int 
)
BEGIN 

	DECLARE _uid VARCHAR(50);
	DECLARE _user_type VARCHAR(50);
	DECLARE _blue_area VARCHAR(50)character set 'utf8';
	DECLARE _beblue_at VARCHAR(50);
	DECLARE _phone VARCHAR(50);
	DECLARE _name VARCHAR(50) character set 'utf8';
	DECLARE _identity VARCHAR(50);
	DECLARE _type VARCHAR(50);
	DECLARE _card VARCHAR(50);
	DECLARE _payname VARCHAR(50) character set 'utf8';
	DECLARE _status VARCHAR(50);
	DECLARE _credit_status VARCHAR(50);

	DECLARE _redpacket_amt_tot DECIMAL(9,4); #总金额
	DECLARE _redpacket_amt_valid DECIMAL(9,4);#有效金额
	DECLARE _redpacket_amt_withdrawing DECIMAL(9,4);#提现中金额
	DECLARE _redpacket_amt_withdrawed DECIMAL(9,4);#已提现金额
	DECLARE _redpacket_amt_expire DECIMAL(9,4);#过期金额

	SELECT `uid`,`user_type`,`blue_area`,`beblue_at`,`phone`,`name`,`identity`,`type`,`card`,`payname`,`status`,`credit_status` 
		INTO _uid,_user_type,_blue_area,_beblue_at,_phone,_name,_identity,_type,_card,_payname,_status,_credit_status
			FROM gzb_user_redpacket_account WHERE uid = _in_uid;
	SELECT SUM(amount)/100 INTO _redpacket_amt_tot FROM gzb_user_redpacket WHERE uid = _in_uid;
	SELECT SUM(amount)/100 INTO _redpacket_amt_valid FROM gzb_user_redpacket WHERE uid = _in_uid AND `status` = 0 AND expire_at > now();
	SELECT SUM(amount)/100 INTO _redpacket_amt_withdrawed FROM gzb_user_redpacket WHERE uid = _in_uid AND `status` = 2;
	SELECT SUM(amount)/100 INTO _redpacket_amt_withdrawing FROM gzb_user_redpacket WHERE uid = _in_uid AND `status` = 1;
	SELECT SUM(amount)/100 INTO _redpacket_amt_expire FROM gzb_user_redpacket WHERE uid = _in_uid AND `status` = 0 AND expire_at < now();
	SELECT c.uid,a.phone,c.my_code FROM gzb_user_redpacket_code c JOIN gzb_user_account a on a.uid= c.uid  WHERE from_uid = _in_uid;

	DROP TABLE IF EXISTS `__tmp_select_02`;
	CREATE TABLE `__tmp_select_02` CHARACTER SET utf8 
	AS
	SELECT 
		_uid,
		_user_type,
		_blue_area,
		_beblue_at,
		_phone,
		_name,
		_identity,
		_type,
		_card,
		_payname,
		_status,
		_credit_status,
		_redpacket_amt_tot,
		_redpacket_amt_valid,
		_redpacket_amt_withdrawing,
		_redpacket_amt_withdrawed,
		_redpacket_amt_expire;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for __repayment
-- ----------------------------
DROP PROCEDURE IF EXISTS `__repayment`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `__repayment`()
BEGIN 
	DECLARE _uid VARCHAR(50);
	DECLARE _area_id VARCHAR(50);
	DECLARE _company VARCHAR(50) character set 'utf8';
	DECLARE _orderid VARCHAR(50);
	DECLARE _name VARCHAR(50) character set 'utf8';
	DECLARE _identity VARCHAR(50);
	DECLARE _phone VARCHAR(50);
	DECLARE _playingTime VARCHAR(50);
	DECLARE _price VARCHAR(50);
	DECLARE _periods VARCHAR(50);
	DECLARE _payday VARCHAR(50);
	DECLARE _periods_price VARCHAR(50);
	DECLARE _shouldPayDay VARCHAR(50);
	DECLARE _tot_price VARCHAR(50);
	DECLARE _orderPayId VARCHAR(50);
	DECLARE _status VARCHAR(50);
	DECLARE _pay_price DECIMAL(9,2) ;
	DECLARE _early_price DECIMAL(9,2) ;
	DECLARE _dalay_price DECIMAL(9,2) ;
	DECLARE _realPayDay VARCHAR(50);
	DECLARE _payType VARCHAR(50);
	DECLARE _numericalorder VARCHAR(50);
	DECLARE _realMoney DECIMAL(9,2) ;
	DECLARE _deduction DECIMAL(9,2) ;
	DECLARE _payDifference DECIMAL(9,2) ;
	
	DECLARE _payTypeName VARCHAR(50) character set 'utf8';
	DECLARE _nowMonthNeedPay DECIMAL(9,2) ;
	DECLARE _overstay VARCHAR(50);
	DECLARE _difference DECIMAL(9,2) ;
	DECLARE _realPrincipalInterest DECIMAL(9,2) ;


	DECLARE fetchSeqOk BOOLEAN ;
	DECLARE _CURSOR CURSOR FOR 
			select `gzb_user_account`.`uid`
			, `gzb_user_address`.`area_id`
			, `gzb_user_info`.`company`
			, `gzb_order_main`.`orderid`
			, `gzb_user_info`.`name`
			, `gzb_user_info`.`identity`
			, `gzb_user_account`.`phone`
			, `gzb_order_main`.`pay_at` as `playingTime`
			, `gzb_order_periods`.`price`
			, `gzb_order_periods`.`periods`
			, `gzb_order_periods`.`payday`
			, `gzb_order_periods`.`periods_price`
			, `gzb_order_pay`.`pay_at` as `shouldPayDay`
			, `gzb_order_periods`.`tot_price`
			, `gzb_order_pay`.`id` as `orderPayId`
			, `gzb_order_pay`.`status`
			, `gzb_order_pay`.`pay_price`
			, `gzb_order_pay`.`early_price`
			, `gzb_order_pay`.`dalay_price`
			, `gzb_order_pay`.`payment_at` as `realPayDay`
			, `gzb_order_pay_task`.`pay_type` as `payType`
			, `gzb_order_pay_task`.`id` as `numericalorder`
			, `gzb_order_pay_task`.`pay_price` as `realMoney`
			, `gzb_order_pay_task`.`deduction_price` as `deduction`
			, `gzb_order_pay_task`.`difference` as `payDifference`
			from `gzb_order_pay` 
			inner join `gzb_user_account` on `gzb_user_account`.`uid` = `gzb_order_pay`.`uid` 
			inner join `gzb_order_main` on `gzb_order_main`.`orderid` = `gzb_order_pay`.`orderid` 
			inner join `gzb_order_periods` on `gzb_order_periods`.`orderid` = `gzb_order_main`.`orderid` 
			inner join `gzb_user_info` on `gzb_order_pay`.`uid` = `gzb_user_info`.`uid` 
			inner join `gzb_user_address` on `gzb_user_address`.`uid` = `gzb_user_info`.`uid` 
			left join `gzb_order_pay_task` on `gzb_order_pay_task`.`id` = `gzb_order_pay`.`pay_task_id` 
			where `gzb_user_address`.`type` = '1' 
			and `gzb_user_account`.`uid` not in 
			('1', '12', '28', '34', '85', '106', '170', '5468',
			'5478', '5795', '8482', '8525', '103887', '117273',
			'118124', '27653', '1133', '13', '108661', '130699', '168904'
			, '142667') 
			order by `gzb_order_main`.`orderid` asc , `gzb_order_pay`.`id` asc;

	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fetchSeqOk = true;#结束标识
	SET fetchSeqOk = FALSE;

	SET @ct = 0;
	OPEN _CURSOR;
	_CUR_LOOP:LOOP
		FETCH _CURSOR INTO 
			_uid,_area_id,_company,_orderid,_name,
			_identity,_phone,_playingTime,_price,_periods,
			_payday,_periods_price,_shouldPayDay,_tot_price,_orderPayId,
			_status,_pay_price,_early_price,_dalay_price,_realPayDay,
			_payType,_numericalorder,_realMoney,_deduction,_payDifference;
		IF fetchSeqOk = 1 THEN
			LEAVE _CUR_LOOP;
		ELSE
			IF _numericalorder = 0 THEN 
				SET _numericalorder = NULL;
			END IF;
			
			IF _status = 0 THEN
				SET _payTypeName = 'adsdsa';
			ELSE
				IF _payType = 0 THEN 
					SET _payTypeName = '支付宝';
				ELSEIF _payType = 1 THEN 
					SET _payTypeName = '一键支付';
				ELSEIF _payType = 2 THEN 
					SET _payTypeName = '代扣';
				ELSEIF _payType = 3 THEN 
					SET _payTypeName = '线下还款';
				ELSE
					SET _payTypeName = '未知';
				END IF;
			END IF;
			IF _status = 0 THEN 
				SET _nowMonthNeedPay = _early_price;
			ELSE	
				SET _nowMonthNeedPay = _pay_price;
			END IF;
			SET _periods_price = _pay_price;
			
			SET _overstay = 0 ;
			IF  _shouldPayDay < NOW() THEN
				IF _status = 0 THEN	
					SET _overstay = TO_DAYS(NOW()) - TO_DAYS(_shouldPayDay);
				ELSE
					SET _overstay = TO_DAYS(_realPayDay) - TO_DAYS(_shouldPayDay);
					IF _overstay < 0 THEN 
						SET _overstay = 0;
					END IF;
				END IF;
			END IF;
			
			SET _difference = _periods_price - _nowMonthNeedPay ;

			SET _realPrincipalInterest = 0;
			BEGIN
				declare done int;  
				declare __status int;
				declare __pay_price DECIMAL(9,2) ;
				declare __early_price DECIMAL(9,2) ;
				declare __deduction_price DECIMAL(9,2) ;
				declare cur_test CURSOR for 
					select 
						`gzb_order_pay`.`status`,
						`gzb_order_pay`.pay_price,
						`gzb_order_pay`.early_price,
						`gzb_order_pay_task`.`deduction_price` 
					from `gzb_order_pay` 
					left join `gzb_order_pay_task` on `gzb_order_pay_task`.`id` = `gzb_order_pay`.`pay_task_id` 
					where `gzb_order_pay`.`orderid` = _orderid 
					order by `gzb_order_pay`.`id` asc;
        declare continue handler FOR SQLSTATE '02000' SET done = 1;  
				OPEN cur_test;
				_cur_loop1:LOOP
					FETCH cur_test INTO __status,__pay_price,__early_price,__deduction_price;
					IF done = 1 THEN
						LEAVE _cur_loop1;
					ELSE
							IF __status = 2 THEN	
								SET _realPrincipalInterest = _realPrincipalInterest + __early_price;
							ELSE
								SET _realPrincipalInterest = _realPrincipalInterest + __pay_price;
							END IF;
					END IF;
				END LOOP;
				close cur_test;  
			END;
			   
		END IF;
	END LOOP;
	SELECT 
_uid,
_area_id,
_company,
_orderid,
_name,
_identity,
_phone,
_playingTime,
_price,
_periods,
_payday,
_periods_price,
_shouldPayDay,
_tot_price,
_orderPayId,
_status,
_pay_price,
_early_price,
_dalay_price,
_realPayDay,
_payType,
_numericalorder,
_realMoney,
_deduction,
_payDifference,
_realPrincipalInterest
;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for __tmp_process
-- ----------------------------
DROP PROCEDURE IF EXISTS `__tmp_process`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `__tmp_process`(
	IN _in_operation VARCHAR(30)
)
BEGIN
	IF _in_operation = 'DROP' THEN 
		DROP TABLE IF EXISTS `__tmp`;
	ELSEIF _in_operation = 'CLEAR' THEN 
		DELETE FROM __tmp;
		ALTER TABLE __tmp AUTO_INCREMENT = 1;
	ELSEIF _in_operation = 'SELECT' THEN 
		SELECT *  FROM __tmp;
	ELSEIF _in_operation = 'CREATE' THEN 
		DROP TABLE IF EXISTS `__tmp`;
		CREATE TABLE `__tmp`( 
			id int(11) unsigned NOT NULL AUTO_INCREMENT ,
			_key_1 VARCHAR(100) NULL ,
			_key_2 VARCHAR(100) NULL ,
			_key_3 VARCHAR(100) NULL ,
			_key_4 VARCHAR(100) NULL ,
			_key_5 VARCHAR(100) NULL ,
			_key_6 VARCHAR(100) NULL ,
			_key_7 VARCHAR(100) NULL ,
			_key_8 VARCHAR(100) NULL ,
			_key_9 VARCHAR(100) NULL ,
			PRIMARY KEY(id)
		) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='临时表';
	ELSEIF _in_operation = 'INIT' THEN 
		BEGIN
			DECLARE _max int ;
			DECLARE _i int ;
	
			SET _i = 0;
			SET _max = 30;
			SET @_sql = 'INSERT INTO __tmp (`_key_1`)VALUES(NULL)';
			SET _max = _max - 1;
			_cur_loop:LOOP
				IF _i = _max THEN
					LEAVE _cur_loop;
				ELSE
					SET _i = _i + 1; 
					SET @_sql = CONCAT( @_sql ,',(NULL)');
				END IF;
			END LOOP;
			prepare stmt from @_sql; 
			EXECUTE stmt;     
			deallocate prepare stmt;   
		END;
	END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for __tmp_table_select_first
-- ----------------------------
DROP PROCEDURE IF EXISTS `__tmp_table_select_first`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `__tmp_table_select_first`(
	in _in_table_name VARCHAR (30),
	in _in_key_name VARCHAR (30)
)
BEGIN
	declare done int;  
	declare _COLUMN_NAME VARCHAR(40);
	DECLARE _key VARCHAR(20) ; 
	DECLARE _i int ; 
	DECLARE _max_length int ; 
	
	declare cur_test CURSOR for 
		SELECT COLUMN_NAME FROM information_schema.`COLUMNS` WHERE TABLE_SCHEMA = DATABASE() AND table_name = _in_table_name;
  declare continue handler FOR SQLSTATE '02000' SET done = 1;  

	SELECT MAX(LENGTH(COLUMN_NAME)) INTO _max_length  FROM information_schema.`COLUMNS` WHERE TABLE_SCHEMA = DATABASE() AND table_name = _in_table_name;
	
	set _i = 0 ;
	SET _key = _in_key_name;
	OPEN cur_test;
	_cur_loop:LOOP
		FETCH cur_test INTO _COLUMN_NAME;
		IF done = 1 THEN
			LEAVE _cur_loop;
		ELSE
			SET _i = _i + 1; 
			SET @dt = 'Not Found';
			SET @sql = CONCAT('SELECT `',_COLUMN_NAME,'` INTO @dt FROM ',_in_table_name,' limit 1 ');
			prepare stmt from @sql; 
			EXECUTE stmt;     
			deallocate prepare stmt;  
			IF @dt = 'Not Found' AND _i = 1 THEN 
				LEAVE _cur_loop;
			END If;
			IF @dt is NULL THEN
				SET @dt = 'NULL';
			END IF;
			#SET @c_l = LENGTH(_COLUMN_NAME);
			#SET @t_n = CEIL( (_max_length - LENGTH(_COLUMN_NAME) ) / 4 );
			SET _COLUMN_NAME = UPPER(_COLUMN_NAME);
			SET @value = QUOTE( CONCAT(RPAD(_COLUMN_NAME,_max_length ,' '),'=',@dt));
			SET @sql = CONCAT('UPDATE __tmp SET ',_key,'=',@value,' WHERE id = ',_i);
			prepare stmt from @sql; 
			EXECUTE stmt;     
			deallocate prepare stmt;   
		END IF;
	END LOOP;
	close cur_test;   
END
;;
DELIMITER ;
