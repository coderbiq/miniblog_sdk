<?php
# 定义命名空间
namespace Ebsdk\Auth;

# 包含信赖文件
require_once __DIR__ . '/Oauth.php';

/**
 * 类 BaseOauth 封装Oauth授权接口的基本行为
 * 
 * @package Ebsdk\Auth
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
class BaseOauth implements \Ebsdk\Auth\Oauth
{
    protected $_driver;

    public function getdriver()
    {
        return $this->_driver;
    }

    public function getRequestToken($_callback)
    {
        return $this->_driver->getRequestToken($_callback);
    }

    public function getAuthorizeURL($_token, $_sign_in_with_weibo = TRUE , $_url = null)
    {
        return $this->_driver->getAuthorizeURL($_token, $_sign_in_with_weibo, $_url);
    }

    public function getAccessToken($_oauth_verifier = FALSE, $_oauth_token = false)
    {
        return $this->_driver->getAccessToken($_oauth_verifier, $_oauth_token);
    }

    public function setToken($_token, $_token_secret)
    {
        $this->_driver->token = new \OauthConsumer($_token, $_token_secret);

        return $this;
    }
}
