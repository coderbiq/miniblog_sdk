<?php
# 定义命令空间
namespace Ebsdk;

# 包含依赖文件
require_once 'Exception.php';

/**
 * 类 ClientFactory 封装一个微博客户端工厂
 * 
 * @package Ebsdk
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class ClientFactory
{
    /**
     * 属性 $_instance 存储微博客户端工厂的唯一实例对象
     *
     * @var \Ebsdk\ClientFactory
     * @static
     * @access protected
     */
    protected static $_instance;

    /**
     * 属性 _adapter_namespace 存储适配器类的命令空间
     * 
     * @var \String
     * @access protected
     */
    protected $_adapter_namespace;

    /**
     * 属性 _adapter_path 存储适配器类的物理路径
     * 
     * @var \String
     * @access protected
     */
    protected $_adapter_path;

    /**
     * 方法 instance 获取微博客户端工厂的唯一实例
     * 
     * @static
     * @access public
     * @return \Ebsdk\ClientFactory
     */
    public static function instance()
    {
        if(static::$_instance === null)
            static::$_instance = new self();

        return static::$_instance;
    }

    /**
     * 方法 factory 获取一个微客户端对象
     * 
     * @param \String $_adapter 微博客户端名称
     * @param \Array $_config 微博客户端配置参数
     * @access public
     * @return \Ebsdk\Client
     */
    public function factory($_adapter, Array $_config = array())
    {
        if(!\is_string($_adapter))
            throw new Exception('Argument 1 passed to Ebsdk\ClientFactory::factory() must be an string');

        $class_name = $this->_adapter_namespace. '\\' . $_adapter . '\\Client';

        $this->_loadAdapter($_adapter);
        $rc = new \ReflectionClass($class_name);
        $adapter = $rc->newInstance($_config);
        
        return $adapter;
    }

    /**
     * 方法 setAdapterNamespace 设置微博客户端适配器的命令空间
     * 
     * @param \String $_namespace 
     * @access public
     * @return \Ebsdk\ClientFactory
     */
    public function setAdapterNamespace($_namespace = null)
    {
        if(!\is_string($_namespace) && $_namespace !== null)
            throw new Exception('Argument 1 passed to Ebsdk\ClientFactory::setAdapterNamespace() must be an string');

        if($_namespace === null)
            $_namespace = '\\Ebsdk\\Adapter';

        $this->_adapter_namespace = $_namespace;

        return $this;
    }

    /**
     * 方法 setAdapterPath 设置微博客户端适配器的路径
     * 
     * @param \String $_path 微博客户端适配器的路径
     * @access public
     * @return \Ebsdk\ClientFactory
     */
    public function setAdapterPath($_path = null)
    {
        if(!\is_string($_path) && $_path !== null)
            throw new Exception('Argument 1 passed to Ebsdk\ClientFactory::setAdapterPath() must be an string');

        if($_path === null)
            $_path = __DIR__ . '/Adapter';

        $this->_adapter_path = $_path;

        return $this;
    }

    /**
     * 方法 _loadAdapter 加载一个适配器类文件
     * 
     * @param \String $_adapter 适配器名称
     * @access protected
     * @return void
     */
    protected function _loadAdapter($_adapter)
    {
        $path = $this->_adapter_path . '/' . $_adapter . '/Client.php';

        if(!file_exists($path))
        {
            throw new Exception(
                sprintf('Adapter \'%s\' not found!', $_adapter),
                Exception::ADAPTER_NOT_FOUND
            );
        }

        require_once($path);
    }

    protected function __construct()
    {
        $this->setAdapterNamespace();
        $this->setAdapterPath();
    }
}
