<?php

/**
 * Mazeapi Software.
 *
 * @package   Mazeapi_ForceLogin
 * @author    Mazeapi
 * @license   https://mazeapi.com/license.html
 */

namespace Mazeapi\ForceLogin\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    protected $_adminSettings;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
        $this->_adminSettings = $this->scopeConfig->getValue('mazeapi_core_settings', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function isForceLoginEnabled()
    {
        return trim($this->_adminSettings['general']['force_login']);
    }

    /**
     * @return string
     */
    public function getRedirectPath()
    {
        return trim($this->_adminSettings['general']['redirect_after_login']);
    }
}