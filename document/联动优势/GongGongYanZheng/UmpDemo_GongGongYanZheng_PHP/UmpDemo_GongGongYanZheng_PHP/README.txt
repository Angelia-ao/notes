demo名称：公共验证接口demo
demo版本：4.0
开发语言：PHP
对应规范：联动优势公共验证产品_商户接入规范V1.0.1

---------------
 demo 文件结构
---------------

UmpDemo_ShouYinTai_PHP
|-- api ....................................php接口文件目录
|   |-- common.php
|   |-- config.php .........................配置文件
|   |-- mer2Plat.php
|   |-- mer2PlatUtil.php
|   |-- plat2Mer.php
|   `-- plat2MerUtil.php
|-- PagesV4.0
     |-- commAuth_1.php .........借记卡直连下单
     |-- commAuth_2.php
     |
     |-- resDataResolve_1.php ...........响应数据解析
     |-- resDataResolve_2.php
     |
     |-- getPlatNotifyData_1.php ........平台通知数据解析响应
     |-- getPlatNotifyData_2.php
     |
     |-- tools_Decrypt_1.php ............平台通知加密数据解密
     |-- tools_Decrypt_2.php
     |
     |-- tools_Encrypt_1.php ............平台公钥数据加密
     |-- tools_Encrypt_2.php
     |
     |-- tools_Urlcode_1.php ............url编码/解码
     `-- tools_Urlcode_2.php

*** 注意 ***
需要配置的文件是api/config.php，保证商户私钥与平台证书要文件路径与api/config.php配置中的路径匹配。
本接口软件包采用PHP 5.1.6标准，请确认已安装PHP 5.1.6及以上运行环境


-----------------------
以apache为例的部署步骤
-----------------------

需要准备的文件：
    UmpDemo_JieJiKaZhiLian_PHP.zip.........demo压缩包
    NNNN_XXXX.key.pem......................用于php demo的key文件，NNNN为商户号，XXXX为商户名称全拼
    cert_2d59.cert.pem.....................平台证书

1.解压demo压缩包，将解压好的demo文件夹保存到apache的虚拟目录中

2.将key文件和证书文件copy至任意目录，本示例保存至/opt/cert目录下 *确保文件权限可读

3.编辑demo中api文件夹下config.php文件，修改密钥和证书的配置 *绝对路径
    例：
//      ===== 密钥配置 =====
//      商户的私钥的绝对路径
        define("privatekey",'/opt/cert/6245_UFuCeShiSH.key.pem');
//      商户私钥配置地址,如果需配置多个商户配置私钥地址，则按如下规则添加
//      global $mer_pk ;//= array();
        $mer_pk = array();
        $mer_pk['6245'] = '/opt/cert/6245_UFuCeShiSH.key.pem';
        $mer_pk['9995'] = '/opt/cert/testMer.key.pem';
        $mer_pk['9996'] = '/opt/cert/testMer.key.pem';
        $mer_pk['700998'] = '/opt/cert/7000998_Mer.key.pem';

//      UMPAY的平台证书路径
        define("platcert",'/opt/cert/cert_2d59.cert.pem');

4.重启apache，使用浏览器进入http://apache服务IP/UmpDemo_JieJiKaZhiLian_PHP/，即可进入demo页面

