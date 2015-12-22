<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>商户接收退款结果通知验签及响应平台</title>
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
				<h3>商户接收退款结果通知验签及响应平台</h3>
				<div class="mrmain">
					<form name="subForm" action="./refundNotify_2.php" method="get"
						style="margin: 0px">
                         <div><strong>本页面所填参数均为真实数据，请勿修改。商户可以直接提交并验签退款结果通知(该通知默认为6245的支付结果通知，需要保证配置文件私钥为6245的私钥），如果商户需测试己方退款支付结果通知，请在refundNotify_2页面完成测试。</strong></div>
          <div>以下参数按照通知队列顺序排列</div>
						<table>
							<tbody>
                                        <tr>
                  <th nowrap="nowrap">交易错误码【error_code】：</th>
                  <td nowrap="nowrap"><input type="text" value="0000" class="wtxt" name="error_code"/> <span>*</span></td>
                </tr>
                              <tr>
                  <th nowrap="nowrap">下单日期【mer_date】：</th>
                  <td nowrap="nowrap"><input type="text" value="20140324" class="wtxt" name="mer_date"/> <span>*</span></td>
                </tr>
                  <tr>
                  <th nowrap="nowrap">商户号【mer_id】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="mer_id" value="6374"/> <span>*</span></td>
                </tr>
                    <tr>
                  <th nowrap="nowrap">订单号【order_id】：</th>
                  <td nowrap="nowrap"><input type="text" value="60770232" class="wtxt" name="order_id"/> <span>*</span></td>
                </tr>
                
                <tr>
                  <th nowrap="nowrap">退款金额【refund_amt】：</th>
                  <td nowrap="nowrap"><input type="text" value="1" class="wtxt" name="refund_amt"/> <span>*(以分为单位)</span></td>
                </tr>
                   <tr>
                  <th nowrap="nowrap">退款流水号【refund_no】：</th>
                  <td nowrap="nowrap"><input type="text" value="2014040212341234" class="wtxt" name="refund_no"/> <span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">退款状态【refund_state】：</th>
                  <td nowrap="nowrap"><input type="text" value="REFUND_SUCCESS" class="wtxt" name="refund_state"/> <span>*</span></td>
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
                  <td nowrap="nowrap"><textarea name="sign" cols="40" rows="5">GtcWn6JvUNihniuBtPRMEL1p++7f+IZztPAD9gDhvJf6BNBqlJsX9cNsP/pVszP/zv8y4/lETLW8VfO0X8I1uYvZxqQofZddE1rTrDOt30tRty12DXUAUewq4mFe9J4/nPF3qwqlnPaPe+JfvephYg3CS9DdmQxakx0bEtg6y5c=</textarea> <span>*</span></td>
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