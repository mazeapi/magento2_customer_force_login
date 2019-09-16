<?php

/**
 * Mazeapi Software.
 *
 * @package   Mazeapi_ForceLogin
 * @author    Mazeapi
 * @author    Iftakharul Alam <bappa2du@gmail.com>
 * @license   https://mazeapi.com/license.html
 */
namespace Mazeapi\ForceLogin\Plugin;


use Magento\Customer\Controller\Account\LoginPost;

class LoginPostPlugin
{
    /**
     * @var \Mazeapi\ForceLogin\Helper\Data
     */
    protected $_dataHelper;

    /**
     * LoginPostPlugin constructor.
     * @param \Mazeapi\ForceLogin\Helper\Data $data
     */
    public function __construct(\Mazeapi\ForceLogin\Helper\Data $dataHelper)
    {
        $this->_dataHelper = $dataHelper;
    }

    /**
     * @param LoginPost $subject
     * @param $result
     * @return mixed
     */
    public function afterExecute(LoginPost $subject, $result)
    {
        $redirectPath = $this->_dataHelper->getRedirectPath();
        $result->setPath($redirectPath);
        return $result;
    }

}