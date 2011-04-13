<?php
# 定义命名空间
namespace Ebsdk\Adapter\Tencent\Auth;

# 包含依赖文件
require_once __DIR__ . '/../../../Auth.php';
require_once __DIR__ . '/../../../Auth/BaseOauth.php';
require_once __DIR__ . '/../sdk/opent.php';

class Oauth extends \Ebsdk\Auth\BaseOauth implements \Ebsdk\Auth
{
    public function __construct(Array $_config)
    {
        if(isset($_config['driver']))
            $this->_driver = $_config['driver'];

        else
        {
            $this->_driver = new \MBOpenToAuth(
                $_config['app_key'], $_config['app_secret']
            );

            if(isset($_config['return_format']))
                $this->_driver->format = $_config['return_format'];
        }
    }
}
