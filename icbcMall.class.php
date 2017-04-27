<?php
namespace Web\Controller\External;

use Web\Controller;
use Web\Common\Controller\MybaseController;

/**
*工行融E购票务接口
*/
class IcbcMall extends MybaseController
{

	public $config = array('IS_API' => true);

    protected $API_NAME = 'icbcmall';

    /**
     * [$app_key 工行分配给企业对接电商平台的应用标识]
     * @var [type]
     */
    protected $app_key;

    /**
     * [$app_secret 工行分配给企业对接电商平台的应用密钥]
     * @var [type]
     */
    protected $app_secret;

    /**
     * [$auth_code 商户授权该企业应用允许访问商户数据的授权码]
     * @var [type]
     */
    protected $auth_code;

    /**
     * [$timestamp //时间戳，格式为yyyy-MM-dd HH:mm:ss.xxxxxx，API服务端允许客户端请求时间误差为前后各5分钟。时间戳最少上送到秒级。]
     * @var [string]
     */
    protected $timestamp;

    function __construct()
    {
        list($sec, $time) = explode(' ', microtime());
        $sec = (float)$sec * 1000000;
        $this->timestamp = date('Y-m-d H:i:s.',$time).$sec;
    }

    /**
     * [request 向工行电商平台发出请求 http post]
     * @date   2017-04-26
     * @param  [sting]     $method  [请求方法名称]
     * @param  [sting]     $url  [请求地址]
     * @param  [type]     $data [请求body体]
     * @return [type]           [description]
     */
    public function request($method, $data)
    {
        $commonData = [
                        'method'    => $method,
                        'req_sid'   => '',
                        'version'   => '',
                        'format'    => 'xml',
                        'timestamp' => $this->timestamp,
                        'app_key'   => $this->app_key,
                        'auth_code' => $this->auth_code,
                    ];
    }

    /**
     * [makeSign SHA-256的HMAC散列算法（密钥为32位app_secret）签名后使用base64_encode]
     * @date   2017-04-26
     * @param  [type]     $req_data [description]
     * @return [type]           [description]
     */
    private function makeSign($req_data)
    {
        $in_charset = mb_detect_encoding($req_data);
        $req_data = iconv($in_charset, 'utf-8', $req_data);
        $signStr = 'app_key='.$this->app_key.'auth_code='.$this->auth_code.'req_data='.$req_data_encryed;
        return base64_encode(hash_hmac('sha256', $signStr, $this->app_secret));
    }
}