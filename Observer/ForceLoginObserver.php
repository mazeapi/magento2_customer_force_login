<?php

/**
 * Mazeapi Software.
 *
 * @author    Mazeapi
 * @author    Iftakharul Alam <bappa2du@gmail.com>
 * @license   https://mazeapi.com/license.html
 */

namespace Mazeapi\ForceLogin\Observer;

use Magento\Framework\App\Area;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\State as AppState;


class ForceLoginObserver implements ObserverInterface
{
    /**
     * @var \Magento\Framework\App\Response\RedirectInterface
     */
    protected $_redirect;

    /**
     * @var \Mazeapi\ForceLogin\Helper\Data
     */
    protected $_dataHelper;

    /**
     * Customer session
     *
     * @var \Magento\Customer\Model\Session
     */
    protected $_customerSession;

    /**
     * @var AppState
     */
    protected $_appState;

    /**
     * ForceLoginObserver constructor.
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Framework\App\Response\RedirectInterface $redirect
     * @param \Mazeapi\ForceLogin\Helper\Data $dataHelper
     * @param AppState $appState
     */
    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Mazeapi\ForceLogin\Helper\Data $dataHelper,
        AppState $appState
    )
    {
        $this->_customerSession = $customerSession;
        $this->_redirect = $redirect;
        $this->_dataHelper = $dataHelper;
        $this->_appState = $appState;
    }

    /**
     * @param Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {

        if ($this->_appState->getAreaCode() == Area::AREA_ADMINHTML) {
            return $this;
        }

        if (!$this->_dataHelper->isForceLoginEnabled()) {
            return $this;
        }

        $actionName = $observer->getEvent()->getRequest()->getFullActionName();


        $controller = $observer->getControllerAction();


        $openActions = array(
            'customer_account_create',
            'customer_account_createpost',
            'customer_account_login',
            'customer_account_loginpost',
            'customer_account_logoutsuccess',
            'customer_account_forgotpassword',
            'customer_account_forgotpasswordpost',
            'customer_account_resetpassword',
            'customer_account_resetpasswordpost',
            'customer_account_confirm',
            'customer_account_confirmation',
        );


        if (in_array($actionName, $openActions) && !$this->_customerSession->isLoggedIn()) {
            return $this;
        } elseif (!$this->_customerSession->isLoggedIn()) {
            $this->_redirect->redirect($controller->getResponse(), 'customer/account/login');
        }

        return $this;

    }

}