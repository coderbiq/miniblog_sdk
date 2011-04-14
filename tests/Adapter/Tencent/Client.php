<?php
# 定义命名空间
namespace Test\Adapter\Tencent;
use \Ebsdk\Adapter\Tencent as Tencent;

# 包含依赖文件
require_once __DIR__ . '/../../../application/Adapter/Tencent/Client.php';
require_once __DIR__ . '/../../Client/Base.php';

/**
 * 类 TestClient 提供对腾讯微博客户端的单元测试
 * 
 * @package Test\Adapter\Tencent
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class Client extends \Test\Client\Base
{
    protected function _getClient()
    {
        $config = include __DIR__ . '/../../Config.php';

        return new Tencent\Client($config['Tencent']);
    }

    protected function _assertAuthObject($_auth)
    {
        $this->assertInstanceOf('\Ebsdk\Adapter\Tencent\Auth\Oauth', $_auth);
    }

    protected function _assertTimeline($_timeline)
    {
    }
}
