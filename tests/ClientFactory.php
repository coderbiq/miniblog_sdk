<?php
# 设置命令空间
namespace Test;

# 加载测试文件
require_once __DIR__ . '/../application/ClientFactory.php';

/**
 * 类 ClientFactory 提供对客户端工厂的单元测试
 * 
 * @package Test
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class ClientFactory extends \PHPUnit_Framework_TestCase
{
    /**
     * 方法 testFactoryReturnType 测试工厂返回对象的类型
     * 
     * @access public
     * @return void
     */
    public function testFactoryReturnType()
    {
        $client = \Ebsdk\ClientFactory::instance()->factory(
            'Tencent', array('app_key' => '', 'app_secret' => ''));

        $this->assertInstanceOf('\Ebsdk\Adapter\Tencent\Client', $client);
        $this->assertInstanceOf('\ebsdk\Client', $client);
    }

    /**
     * 方法 testFactoryNotFound 提供对创建一个不存在的客户适配器的异常测试
     * 
     * @access public
     * @return void
     */
    public function testFactoryNotFound()
    {
        try{
            $client = \Ebsdk\ClientFactory::instance()->factory('abc');

            $this->fail();

        } catch( \Ebsdk\Exception $e ) {
            $this->assertEquals(
                \Ebsdk\Exception::ADAPTER_NOT_FOUND,
                $e->getCode()
            );

            return null;
        }

        $this->fail();
    }
}
