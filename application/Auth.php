<?php
# 定义命名空间
namespace Ebsdk;

/**
 * 接口 Auth 定义授权接口类的公共行为
 * 
 * @package Ebsdk;
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
interface Auth
{
    public function __construct(Array $_config);
}
