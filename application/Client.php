<?php
# 定义命名空间
namespace Ebsdk;

/**
 * 接口 Client 定义微博客户端的公共接口
 * 
 * @package Ebsdk
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
interface Client
{
    public function __construct(Array $_config);
}
