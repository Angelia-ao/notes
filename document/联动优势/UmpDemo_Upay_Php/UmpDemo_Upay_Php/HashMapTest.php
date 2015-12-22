<?php

require_once 'api\mer2Plat.php';
require_once 'api\plat2Mer.php';

require_once 'PHPUnit\Framework\TestCase.php';

/**
 * HashMap test case.
 */
class HashMapTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var HashMap
	 */
	private $HashMap;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated HashMapTest::setUp()
		

		$this->HashMap = new HashMap(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated HashMapTest::tearDown()
		

		$this->HashMap = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Tests HashMap->put()
	 */
	public function testPut() {
		//组织请求参数
//		$map = new HashMap();
//		$map->put("merId","9996");
//		$map->put("orderId",rand(100000,999999));
//		$map->put("merDate",date("Ymd"));
//		$map->put("amount","1");
//		$map->put("version","3.0");
		//后台直连下订单
//		$map = new HashMap();
//		$map->put("merId", "9996");
//		$map->put("goodsId", "1001");
//		$map->put("mobileId", "13720040275");
//		$map->put("orderId", "467242");
//		$map->put("merDate", "20100402");
//		$map->put("amount", "1");
//		$map->put("amtType", "01");
//		$map->put("bankType", "3");
//		$map->put("notyfuUrl", "http://pay.test.umpay.com/pay/test/testNotify.jsp");
//		$map->put("merPriv", "");
//		$map->put("expand", "");
//		$map->put("version", "3.0");
		//订单查询
		$map = new HashMap();
		$map->put("merId", "9996");
		$map->put("goodsId", "100");
		$map->put("orderId", "236798");
		$map->put("merDate", "20100302");
		$map->put("mobileId", "13910173623");
		$map->put("version", "3.0");
	
		
	
		//获取请求数据对象
//		$reqData = MerToPlat::cancelByGet($map);//商户撤销
//		$reqData = MerToPlat::directPayByGet($map);//后台直连下单
		$reqData = MerToPlat::queryTransByGet($map);//订单
		//获取请求URL
		$url = $reqData->getUrl();
//		echo "\n" . $url;
		//请求平台取得平台响应结果
		$html = file_get_contents($url);
//		echo "\n".$html;
		//解析平台响应数据
//		$resData = PlatToMer::getCancelByHtml($html);//商户撤销职务
//		$resData = PlatToMer::getDirectPayByHtml($html);//后台直连下单
		$resData = PlatToMer::getQueryTransByHtml($html);
		$retCode = $resData->get("retCode");
		//判断退费结果,retCode=0000为成功,其他为失败,
		if($retCode=="0000"){
			echo "\n商户退费成功";
		}else{
			echo "\n商户退失败,响应码:" . $retCode;
			
		}
	}

}

