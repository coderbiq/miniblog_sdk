<?php
# 定义命名空间
namespace Ebsdk;

/**
 * 类 Exception 提供对异常的封装
 * 
 * @package Ebsdk
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class Exception extends \Exception
{
    # 定义适配器未找到异常
    const ADAPTER_NOT_FOUND = 1;
}
