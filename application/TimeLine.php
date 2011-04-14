<?php
# 定义命名空间
namespace Ebsdk;

/**
 * 方法 TimeLine 定义通用时间线接口
 * 
 * @package Ebsdk
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
interface TimeLine
{
    /**
     * 方法 getPublicTimeLine 获取公共时间线
     * 
     * @param Int $_offset 记录起始位置
     * @param Int $_count 单次获取记录条数
     * @param Array $_config 其它扩展配置参数
     * @access public
     * @return Ebsdk\coll
     */
    public function getPublicTimeLine(
        $_offset = 0, $_count = 10, Array $_config = array()
    );

    /**
     * 方法 getHomeTimeLine 获取指定用户的时间线
     * 
     * @param \Ebsdk\User $_user 
     * @param Int $_offset 记录起始位置
     * @param Int $_count 单次获取记录条数
     * @param Array $_config 其它扩展配置参数
     * @access public
     * @return Ebsdk\Coll
     */
    public function getHomeTimeLine(
        $_user, $_offset = 0, $_count = 10, Array $_config = array()
    );

    /**
     * 方法 getUserTimeLine 获取指定用户最新发表的时间线
     * 
     * @param \Ebsdk\User $_user 
     * @param int $_offset 
     * @param int $_count 
     * @param Array $_config 
     * @access public
     * @return Ebsdk\Coll
     */
    public function getUserTimeLine(
        $_user, $_offset = 0, $_count = 10, Array $_config = array()
    );

    public function __construct(Array $_config = array());
}
