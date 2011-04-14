<?php
# 定义命名空间
namespace Test;

# 包含信赖文件
require_once __DIR__ . '/../Adapter/Tencent/Auth/Oauth.php';
require_once __DIR__ . '/../Adapter/Sina/Auth/Oauth.php';

class TestAllOauth extends \PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $suite = new self(
            new \ReflectionClass('\Test\Adapter\Tencent\Auth\Oauth')
        );

        $suite->addTestSuite('\Test\Adapter\Sina\Auth\Oauth');

        return $suite;
    }
}
