<?php
# 定义命名空间
namespace Test\Adapter\Tencent;
use \Ebsdk\Adapter\Sina as Sina;

# 包含依赖文件
require_once __DIR__ . '/../../../application/Adapter/Sina/Client.php';

/**
 * 类 TestClient 提供对腾讯微博客户端的单元测试
 * 
 * @package Test\Adapter\Tencent
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class TestClient extends \PHPUnit_Framework_TestCase
{
    protected $_config = array(
        'app_key' => '',
        'app_secret' => '',
    );

    /**
     * 方法 testGetAuth 测试获取授权接口对象
     * 
     * @access public
     * @return void
     */
    public function testGetAuth()
    {
        $client = new Sina\Client($this->_config);
        $auth = $client->getAuth();

        $this->assertType('\Ebsdk\Adapter\Sina\Auth', $auth);
    }
}
