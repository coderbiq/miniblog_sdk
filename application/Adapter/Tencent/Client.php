<?php
#定义命名空间
namespace Ebsdk\Adapter\Tencent;

# 包含依赖文件
require_once __DIR__ . '/../../Client.php';
require_once __DIR__ . '/Auth.php';

/**
 * 类 Client 封装腾讯微博客户端
 * 
 * @package \Ebsdk\Adapter\Tencent
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class Client implements \Ebsdk\Client
{
    protected $_app_key;
    protected $_app_secret;

    protected $_objects = array();

    public function getAuth($_type = 'oauth', $_config = array())
    {
        if(!isset($this->_objects['oauth']))
        {
            $base_config = array(
                'app_key' => $this->_app_key,
                'app_secret' => $this->_app_secret
            );
            $config = array_merge($base_config, $_config);

            $this->_objects['oauth'] = new Auth($config);
        }

        return $this->_objects['oauth'];
    }

    public function setAppKey($_app_key)
    {
        $this->_app_key = $_app_key;

        return $this;
    }

    public function setSecret($_app_secret)
    {
        $this->_app_secret = $_app_secret;

        return $this;
    }

    public function __construct(Array $_config)
    {
        $this->setAppKey($_config['app_key'])
            ->setSecret($_config['app_secret']);
    }
}
