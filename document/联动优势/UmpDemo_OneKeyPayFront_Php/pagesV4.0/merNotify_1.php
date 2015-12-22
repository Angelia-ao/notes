<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>商户接收支付结果通知验签及响应平台</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="../common/css/public_css_ussys.css"
	type="text/css">
</head>
<?php 
	//初始化测试数据
	$orderId=rand(100000,999999);
	$merDate = date("Ymd");
?>
<body>
	<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>商户接收支付结果通知验签及响应平台</h3>
				<div class="mrmain">
					<form name="subForm" action="./merNotify_2.php" method="get"
						style="margin: 0px">
                         <div><strong>本页面所填参数均为真实数据，请勿修改。商户可以直接提交并验签结果通知(该通知默认为6245的支付结果通知，需要保证配置文件私钥为6245的私钥），如果商户需测试己方支付结果通知，请在merNotify_2页面完成测试。</strong></div>
          <div>以下参数按照通知队列顺序排列</div>
						<table>
							       <tbody>
                <tr>
                  <th nowrap="nowrap">金额【amount】：</th>
                  <td nowrap="nowrap"><input type="text" value="1" class="wtxt" name="amount"/> <span>*(以分为单位)</span></td>
                </tr>
                  <tr>
                  <th nowrap="nowrap">金额类型【amt_type】：</th>
                  <td nowrap="nowrap"><input type="text" value="RMB" class="wtxt" name="amt_type" /> <span>*</span></td>
                </tr>
                  <tr>
                   <th nowrap="nowrap">字符编码【charset】：</th>
                   <td nowrap="nowrap"><input type="text" class="wtxt" name="charset" value="UTF-8"/> <span>*</span></td>
                </tr>
                 <tr>
                   <th nowrap="nowrap">交易错误码【error_code】：</th>
                   <td nowrap="nowrap"><input type="text" class="wtxt" name="error_code" value="0000"/> <span>*</span></td>
                    </tr>
                     <tr>
                  <th nowrap="nowrap">商品号【goods_id】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="goods_id" value="2012"/></td>
                </tr>
                        <tr>
                  <th nowrap="nowrap">媒介标识【media_id】：</th>
                  <td nowrap="nowrap"><input type="text" value="15001052294" class="wtxt" name="media_id"/></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">媒介标识【media_type】：</th>
                  <td nowrap="nowrap"><input type="text" value="MOBILE" class="wtxt" name="media_type"/></td>
                </tr>
                
                  <tr>
                  <th nowrap="nowrap">下单日期【mer_date】：</th>
                  <td nowrap="nowrap"><input type="text" value="20131224" class="wtxt" name="mer_date"/> <span>*</span></td>
                </tr>
                  <tr>
                  <th nowrap="nowrap">商户号【mer_id】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="mer_id" value="6245"/> <span>*</span></td>
                </tr>
                
				<tr>
                  <th nowrap="nowrap">商户私有信息【mer_priv】：</th>
                  <td nowrap="nowrap"><input type="text" value="联动测试" class="wtxt" name="mer_priv"/> </td>
                </tr>
                  <tr>
                  <th nowrap="nowrap">订单号【order_id】：</th>
                  <td nowrap="nowrap"><input type="text" value="268519" class="wtxt" name="order_id"/> <span>*</span></td>
                </tr>
                  <tr>
                  <th nowrap="nowrap">支付日期【pay_date】：</th>
                  <td nowrap="nowrap"><input type="text" value="20131224" class="wtxt" name="pay_date"/> <span>*</span></td>
                </tr>
                 <tr>
                  <th nowrap="nowrap">银行流水【pay_seq】：</th>
                  <td nowrap="nowrap"><input type="text" value="000223790862" class="wtxt" name="pay_seq"/> <span>*</span></td>
                </tr>
                    <tr>
                  <th nowrap="nowrap">支付方式【pay_type】：</th>
                  <td nowrap="nowrap"><input type="text" value="CREDITCARD" class="wtxt" name="pay_type" /> <span>*</span></td>
                </tr>
                
                <tr>
                   <th nowrap="nowrap">接口名称【service】：</th>
                   <td nowrap="nowrap"><input type="text" class="wtxt" name="service" value="pay_result_notify"/> <span>*</span></td>
                    </tr>
                      <tr>
                  <th nowrap="nowrap">对账日期【settle_date】：</th>
                  <td nowrap="nowrap"><input type="text" value="20131224" class="wtxt" name="settle_date"/> <span>*</span></td>
                </tr>
                  <tr>
                  <th nowrap="nowrap">U付交易号【trade_no】：</th>
                  <td nowrap="nowrap"><input type="text" value="1312241715592532" class="wtxt" name="trade_no"/> <span>*</span></td>
                </tr>
                 <tr>
                  <th nowrap="nowrap">交易状态【trade_state】：</th>
                  <td nowrap="nowrap"><input type="text" value="TRADE_SUCCESS" class="wtxt" name="trade_state"/> <span>*</span></td>
                </tr>
                 <tr>
                  <th nowrap="nowrap">版本号【version】：</th>
                  <td nowrap="nowrap"><input type="text" value="4.0" class="wtxt" name="version"/> <span>*</span></td>
                </tr>
              
             
           
              <!-- 
                <tr>
                  <th nowrap="nowrap" valign="top">分账结果数据【split_data_result】：</th>
                  <td nowrap="nowrap"><textarea name="split_data_result" cols="40" rows="5"></textarea>  <tr><th><td>分账结果数据用base64解码，获取分账信息</td></th>
                 </tr></td>
                </tr>
                -->
            
                   <tr>
                  <th nowrap="nowrap" valign="top">签名密文【sign】：</th>
                  <td nowrap="nowrap"><textarea name="sign" cols="40" rows="5">NhKLCSYOw6GkuXBRfosmB0eJqFW4xa3hZ2klFijxmARzAXobfR8N+f6UB4ZgdPt2s9ENN5cQDijzqtU/qQUItRvfl/AxSycWSHqFL3Y0I4sP4x6KpFCS/RvJILYucQZWW1bPqeA/Iz1V447P1ZAFFneIujMHumf9EGtwOqpLvjw=</textarea> <span>*</span></td>
                </tr>
                   <tr>
                   <th nowrap="nowrap">签名方式【sign_type】：</th>
                    <td nowrap="nowrap"><input type="text" class="wtxt" name="sign_type" value="RSA"/> <span>*</span></td>
                </tr>
                <tr>
                  <th></th>
                  <td><div class="pbutton2 pline"><input type="submit" value="提交" class="button" /></div></td>
                </tr>
              </tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="FOOTA"><?php include("./bottom.php");?></div>

</body>
</html>
<script>
</script>