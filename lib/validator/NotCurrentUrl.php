<?php
/**
 * Created by JetBrains PhpStorm.
 * User: robertspeer
 * Date: 1/11/13
 * Time: 3:41 PM
 * To change this template use File | Settings | File Templates.
 */
class NotCurrentUrl extends sfValidatorUrl
{
    protected function configure($options = array(), $messages = array())
    {
        parent::configure($options, $messages);

        $this->setMessage('invalid', 'URL may not be from this site, & must by in this format: http://www.example.com');
    }

    protected function doClean($value)
    {
       $parseUrl = parse_url($value);
       if (sfContext::getInstance()->getRequest()->getHost() == $parseUrl['host'])
        {
            throw new sfValidatorError($this, 'invalid', array('value' => $value));
        }

        return $value;
    }
}
