<?php
# 定义命名空间
namespace Test\Adapter\Sina\Auth;
use \Ebsdk\Adapter\Sina\Auth as Auth;

# 包含信赖文件
$application_path = __DIR__ . '/../../../../application';
require_once $application_path . '/Adapter/Sina/Auth/Oauth.php';

class Oauth extends \PHPUnit_Framework_TestCase
{
    protected $_callback;
    protected $_token;
    protected $_sign_in_with_wei_bo;
    protected $_url;
    protected $_oauth_verifier;
    protected $_oauth_token;

    public function testInterface()
    {
        $auth = new Auth\Oauth(array('driver' => $this));

        $auth->getRequestToken('callback');
        $auth->getAuthorizeURL('token', 'sign_in_with_weibo', 'url');
        $auth->getAccessToken('oauth_verifier', 'oauth_token');

        $this->assertEquals('callback', $this->_callback);
        $this->assertEquals('token', $this->_token);
        $this->assertEquals('sign_in_with_weibo', $this->_sign_in_with_weibo);
        $this->assertEquals('url', $this->_url);
        $this->assertEquals('oauth_verifier', $this->_oauth_verifier);
        $this->assertEquals('oauth_token', $this->_oauth_token);
    }

    public function testCreateForConfig()
    {
        $auth = new Auth\Oauth(array('app_key' => '', 'app_secret' => ''));

        $this->assertInstanceOf('WeiboOauth', $auth->getDriver());
    }

    public function testSetToken()
    {
        $auth = new Auth\Oauth(array('app_key' => '', 'app_secret' => ''));

        $auth->setToken('', '');

        $this->assertInstanceOf('OauthConsumer', $auth->getDriver()->token);
    }

    public function getRequestToken($_callback)
    {
        $this->_callback = $_callback;
    }

    public function getAuthorizeURL($_token, $_sign_in_with_weibo = TRUE , $_url)
    {
        $this->_token = $_token;
        $this->_sign_in_with_weibo = $_sign_in_with_weibo;
        $this->_url = $_url;
    }

    public function getAccessToken($_oauth_verifier = FALSE, $_oauth_token = false)
    {
        $this->_oauth_verifier = $_oauth_verifier;
        $this->_oauth_token = $_oauth_token;
    }
}
