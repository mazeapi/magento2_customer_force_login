<?php

/**
 * @author Iftakharul Alam Bappa <iftakharul@strativ.se>
 */
namespace Mazeapi\ForceLogin\Plugin;


use Magento\Customer\Controller\Account\LoginPost;

class LoginPostPlugin
{
    /**
     * @var \Mazeapi\ForceLogin\Helper\Data
     */
    protected $_adminSettings;

    public function __construct(\Mazeapi\ForceLogin\Helper\Data $data)
    {
        $this->_adminSettings = $data;
    }

    /**
     * @param  LoginPost
     * @param  [type]
     * @return [type]
     */
    public function afterExecute(LoginPost $subject, $result)
    {
        $redirectPath = $this->_adminSettings->getRedirectPath();
        $result->setPath($redirectPath);
        return $result;
    }

}