<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>直连网银</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="../common/css/public_css_ussys.css"
	type="text/css">
</head>
<?php
//初始化测试数据
$orderId = rand ( 100000, 999999 );
$merDate = date ( "Ymd" );
?>


  <body>
	<div id="HEADA"><?php include("./head.php");?></div>
	<div id="MAINA">
		<div class="mindexa">
			<div class="mleft">
          <?php include("./left.php");?>
        </div>
			<div class="mright">
				<h3>网银直连<span>(带*项为必填)</span>
				</h3>
				<div class="mrmain">
					<form name="subForm" action="./payReqDirect_2.php" method="post"
						style="margin: 0px">
						<table>
					            <tbody>
              <tr>
                    <th nowrap="nowrap">接口名称【service】：</th>
                    <td nowrap="nowrap"><select name="service">
			                 <option value="pay_req_split_direct" selected="selected">pay_req_split_direct-直连网银</option>
		              </select><span>*</span>
                   </td>
                </tr>
                <tr>
                  <th nowrap="nowrap">字符编码【charset】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="charset" value="UTF-8"/> <span>*</span></td>
               </tr>
               <tr>
               <th nowrap="nowrap">签名方式【sign_type】：</th>
               <td nowrap="nowrap"><input type="text" class="wtxt" name="sign_type" value="RSA"/> <span>*</span></td>
               </tr>
               <tr>
                 <th nowrap="nowrap">商户号【mer_id】：</th>
                 <td nowrap="nowrap"><input type="text" class="wtxt" name="mer_id" value="6245"/> <span>*</span></td>
               </tr>
               <tr>
                  <th nowrap="nowrap">页面返回地址【ret_url】：</th>
                  <td nowrap="nowrap"><input type="text" value="http://114.113.159.207:8756/pgtest/notify0000V4.jsp" class="wtxt" name="ret_url"/> <span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">结果通讯地址【notify_url】：</th>
                  <td nowrap="nowrap"><input type="text" value="http://114.113.159.207:8756/pgtest/notify0000V4.jsp" class="wtxt" name="notify_url"/><span>*</span></td>
                </tr>
               <tr>
                  <th nowrap="nowrap">版本号【version】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="version" value="4.0"/> <span>*</span></td>
                </tr>
                
                <tr>
                  <th nowrap="nowrap">商品号【goods_id】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="goods_id" value="2012"/></td>
                </tr>
				<tr>
                  <th nowrap="nowrap">商品信息【goods_inf】：</th>
                  <td nowrap="nowrap"><input type="text" class="wtxt" name="goods_inf" value="测试商品"/></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">媒介标识【media_id】：</th>
                  <td nowrap="nowrap"><input type="text" value="13000000000" class="wtxt" name="media_id"/> <span>media_id和media_type同传递或时同不传</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">媒介类型【media_type】：</th>
                  <td nowrap="nowrap"><select name="media_type">
                       <option value="MOBILE">手机号码</option>
                        <option value="">不传递</option>
                </select> <span>media_id和media_type同传递或时同不传</span></td>
                </tr>
                 <tr>
                  <th nowrap="nowrap">订单号【order_id】：</th>
                 <td><input type=text class="wtxt" name="order_id"
										value="<?php echo $orderId;?>" /><span><font color="red">*</font></span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">订单日期【mer_date】：</th>
                 <td><input type=text class="wtxt" name="mer_date"
										value="<?php echo $merDate;?>" /><span><font color="red">*</font></span></td>
                </tr>    
                <tr>
                  <th nowrap="nowrap">金额【amount】：</th>
                  <td nowrap="nowrap"><input type="text" value="1" class="wtxt" name="amount"/> <span>*(以分为单位)</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">金额类型【amt_type】：</th>
                  <td nowrap="nowrap"><select name="amt_type">
						<option value="RMB" selected="selected">人民币</option>
					  </select> <span>*</span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">支付方式【pay_type】：</th>
                  <td nowrap="nowrap"><select name="pay_type" id="pay_type">
                                      <option value="B2CDEBITBANK" selected>个人网银借记卡直连</option>
			              </select></td>
                </tr>
				<tr>
                  <th nowrap="nowrap">默认银行【gate_id】：</th>
                  <td nowrap="nowrap"><select name="gate_id" id="gate_id">
		                <option value="ICBC">中国工商银行</option>
		                <option value="CMB">招商银行</option>
		                <option value="CCB" selected>中国建设银行</option>
		                <option value="BOC">中国银行</option>
		                <option value="ABC">中国农业银行</option>
		                <option value="SPDB">上海浦东发展银行</option>
		                <option value="GDB">广东发展银行</option>
		                <option value="CEB">中国光大银行</option>
		                <option value="CIB">兴业银行</option>
		                <option value="HXB">华夏银行</option>
		                <option value="CMBC">民生银行</option>
                                <option value="PSBC">邮储银行</option>
                                <option value="BEA">东亚银行</option>
					  </select>
				  </td>
                </tr>
				<tr>
                  <th nowrap="nowrap">商户私有信息【mer_priv】：</th>
                  <td nowrap="nowrap"><input type="text" value="联动测试" class="wtxt" name="mer_priv"/> </td>
                </tr>
                <tr>
                  <th nowrap="nowrap">商户扩展信息【expand】：</th>
                  <td nowrap="nowrap"><input type="text" value="UMPAY" class="wtxt" name="expand"/> </td>
                </tr>
                <tr>
                  <th nowrap="nowrap">用户IP地址【user_ip】：</th>
                  <td nowrap="nowrap"><input type="text" value="192.168.1.2" class="wtxt" name="user_ip"/></td>
                </tr>
               <tr>
                  <th nowrap="nowrap">订单过期时常【expire_time】：</th>
                  <td nowrap="nowrap"><input type="text" value="600" class="wtxt" name="expire_time"/><span> 单位：分钟</span></td>
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
document.getElementById("splitWebPay").className="msel";
var i = 0;                                                               
function add()                                                           
                                                                         
{                                                                        
i = i+1;                                                                 
str='<table>';                                                           
                                                                         
str=str+'<tr align=center valign=middle bgcolor=#FFFFFF>';               
                                                                         
str=str+'<th>子订单号</th>';                                                 
sub_order_id = 'sub_order_id'+i;                                         
str=str+'<td><input type=text name='+sub_order_id+' class="wtxt"/></td>';            
                                                                         
str=str+'<th>子订单金额</th>';                                                
sub_amount='sub_amount'+i;                                               
str=str+'<td><input type=text name='+sub_amount+' class="wtxt"/></td>';              
                                                                         
str=str+'<th>子商户号</th>';                                                 
sub_mer_id='sub_mer_id'+i;                                               
str=str+'<td><input type=text name='+sub_mer_id+' class="wtxt"/></td>';              
                                                                         
str=str+'<th>子订单信息</th>';                                                
sub_order_desc='sub_order_desc'+i;                                       
str=str+'<td><input type=text name='+sub_order_desc+' class="wtxt"/></td>';          
                                                                         
str=str+'</tr></table>';                                                 
                                                                         
                                                                         
document.getElementById('upid').innerHTML+=str+'';                                           
                                                                         
}                                                                        

</script>
