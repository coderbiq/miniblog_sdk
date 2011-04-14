<?php
#定义命名空间
namespace Ebsdk\Client;

# 包含依赖文件
require_once __DIR__ . '/../Client.php';
require_once __DIR__ . '/Exception.php';

/**
 * 类 Base 实现一个基本的微博客户端
 * 
 * @package Ebsdk\Client
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
abstract class Base implements \Ebsdk\Client
{
    protected $_app_key;
    protected $_app_secret;
    protected $_oauth_token;
    protected $_oauth_token_secret;

    protected $_objects = array();

    public function setAppKey($_app_key, $_app_secret)
    {
        $this->_app_key = $_app_key;
        $this->_app_secret = $_app_secret;

        return $this;
    }

    public function setOauthToken($_oauth_token, $_oauth_token_secret)
    {
        $this->_oauth_token = $_oauth_token;
        $this->_oauth_token_secret = $_oauth_token_secret;

        if(isset($this->_objects['oauth']))
            $this->_objects['oauth']->setToken(
                $_oauth_token, $_oauth_token_secret
            );

        return $this;
    }

    protected function _auth(
        $_class_name, $_type = 'oauth', $_config = array()
    )
    {
        if(!isset($this->_objects['oauth']))
        {
            $rc = new \ReflectionClass($_class_name);
            if(empty($_config))
            {
                $this->_validateAppKey();
                $this->_objects['oauth'] = $rc->newInstance(
                    Array(
                        'app_key' => $this->_app_key,
                        'app_secret' => $this->_app_secret
                    )
                );
            }
            else
                $this->_object['oauth'] = $rc->newInstance($_config);
        }

        return $this->_objects['oauth'];
    }

    protected function _timeLine($_class_name, Array $_config = array())
    {
        if(!isset($this->_objects['time_line']))
        {
            $rc = new \ReflectionClass($_class_name);

            if(empty($_config))
            {
                $this->_validateAppKey();
                $this->_validateOauthToken();

                $this->_objects['timeline'] = $rc->newInstance(
                    array(
                        $this->_app_key,
                        $this->_app_secret,
                        $this->_oauth_token,
                        $this->_oauth_token_secret
                    )
                );
            }
            else
                $this->_objects['timeline'] = $rc->newInstance($_config);
        }

        return $this->_objects['timeline'];
    }


    protected function _validateAppKey()
    {
        if(empty($this->_app_key) || empty($this->_app_secret) )
            throw new Exception('app key cannot be empty', Exception::APP_KEY_ERROR);
    }

    protected function _validateOauthToken()
    {
        if(empty($this->_oauth_token) || empty($this->_oauth_token_secret))
            throw new Exception('oauth token cannot be empty', Exception::OAUTH_TOKEN_ERROR);
    }

    public function __construct(Array $_config)
    {
        $this->setAppKey($_config['app_key'], $_config['app_secret']);

        if(
            isset($_config['oauth_token']) 
            && 
            isset($_config['oauth_token_secret'])
        )
        {
            $this->setOauthToken(
                $_config['oauth_token'], 
                $_config['oauth_token_secret']
            );
        }
    }
}
