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
	/**
	 * 
	 */
    protected $API_NAME = 'icbcmall';

    protected $app_key;
    protected $app_secret;
    protected $auth_code;
    protected $timestamp;
    function __construct()
    {
        list($sec, $time) = explode(' ', microtime());
        $sec = (float)$sec * 1000000;
        $this->timestamp = date('Y-m-d H:i:s.',$time).$sec;
    }

    /**
     * [request description] 
     * @date   2017-04-26
     * @param  [sting]     $method  [请求方法名称]
     * @param  [sting]     $url  [请求地址]
     * @param  [type]     $data [请求body体]
     * @return [type]           [description]
     */
    public function request($method, $url, $data)
    {
        $commonData = [
                        'method' => $method,
                        'req_sid' => '',
                        'version' => '',
                        'format' => 'xml',
                        'timestamp' => $this->timestamp,//时间戳，格式为yyyy-MM-dd HH:mm:ss.xxxxxx，API服务端允许客户端请求时间误差为前后各5分钟。时间戳最少上送到秒级。
                        'app_key' => $this->app_key,
                        'auth_code' => $this->auth_code,
                    ];
    }

    /**
     * [createSign ]
     * @date   2017-04-26
     * @param  [type]     $req_data [description]
     * @return [type]           [description]
     */
    private function createSign($req_data)
    {

        $signStr = 'app_key='.$this->app_key.'auth_code='.$this->auth_code.'req_data='.$req_data_encryed;
        return base64_encode(hash_hmac('sha256', $signStr, $this->app_secret));
    }
}