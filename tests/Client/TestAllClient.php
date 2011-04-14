<?php
# 定义命名空间
namespace Test;

# 包含依赖文件
require_once __DIR__ . '/../Adapter/Tencent/Client.php';
require_once __DIR__ . '/../Adapter/Sina/Client.php';

/**
 * 类 TestAllClient 封装一个对所有微博客户的测试套件
 * 
 * @package Test
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class TestAllClient extends \PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $suite = new self(
            new \ReflectionClass('\Test\Adapter\Tencent\Client')
        );

        $suite->addTestSuite('\Test\Adapter\Sina\Client');

        return $suite;
    }
}
