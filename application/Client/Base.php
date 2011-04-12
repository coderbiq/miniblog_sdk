<?php
#定义命名空间
namespace Ebsdk\Client;

# 包含依赖文件
require_once __DIR__ . '/../Client.php';

/**
 * 类 Base 实现一个基本的微博客户端
 * 
 * @package Ebsdk\Client
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
abstract class Base implements \Ebsdk\Client
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

            $ro = new \ReflectionClass($this->_getAuthClassName());
            $this->_objects['oauth'] = $ro->newInstance($config);
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
