<?php
#定义命名空间
namespace Ebsdk\Adapter\Tencent;

# 包含依赖文件
require_once __DIR__ . '/../../Client.php';

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
    public function __construct(Array $_config)
    {
    }
}
