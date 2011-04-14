<?php
# 定义命名空间
namespace Ebsdk\Adapter\Sina;

# 包含依赖文件
require_once __DIR__ . '/../../Client/Base.php';
require_once __DIR__ . '/Auth/Oauth.php';
require_once __DIR__ . '/TimeLine.php';

/**
 * 类 Client 封装新浪微博客户端
 * 
 * @package \Ebsdk\Adapter\Sina
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class Client extends \Ebsdk\Client\Base
{
    public function auth($_type = 'oauth', $_config = array())
    {
        return $this->_auth(
            __NAMESPACE__ . '\\Auth\\Oauth', $_type, $_config
        );
    }

    public function timeLine(Array $_config = array())
    {
        return $this->_timeLine(__NAMESPACE__ . '\\TimeLine', $_config);
    }
}
