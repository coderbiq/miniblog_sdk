<?php
# 定义命名空间
namespace Ebsdk;

/**
 * 接口 Client 定义微博客户端的公共接口
 * 
 * @package Ebsdk
 * @version 0.2
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
interface Client
{
    /**
     * 方法 getAuth 获取授权API接口对象
     * 
     * @param string $_type 要使用的授权接口类型 
     * @param array $_config 授权接口配置参数
     * @access public
     * @return \Ebsdk\Auth
     */
    public function auth($_type = 'oauth', $_config = array());

    /**
     * 方法 timeLine 获取时间线接口对象
     * 
     * @access public
     * @return \Ebsdk\TimeLine
     */
    public function timeLine(Array $_config = array());    

    public function __construct(Array $_config);
}
