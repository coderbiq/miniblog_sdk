<?php
# 定义命名空间
namespace Ebsdk\Client;

/**
 * 类 Exception 封装与客户端对象相关的异常
 * 
 * @package Ebsdk\Client
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class Exception extends \Exception
{
    const APP_KEY_ERROR = 1;
    const OAUTH_TOKEN_ERROR = 2;
}
