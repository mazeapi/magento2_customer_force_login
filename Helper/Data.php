<?php

/**
 * Mazeapi Software.
 *
 * @author    Mazeapi
 * @author    Iftakharul Alam <bappa2du@gmail.com>
 * @license   https://mazeapi.com/license.html
 */

namespace Mazeapi\ForceLogin\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{

    /**
     * Config paths
     */
    const XML_PATH_ENABLED = 'mazeapi_core_settings/general/force_login';
    const XML_PATH_REDIRECT_URL = 'mazeapi_core_settings/general/redirect_after_login';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig
    )
    {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string
     */
    public function isForceLoginEnabled()
    {
        return trim($this->scopeConfig->getValue(self::XML_PATH_ENABLED));
    }

    /**
     * @return string
     */
    public function getRedirectPath()
    {
        return trim($this->scopeConfig->getValue(self::XML_PATH_REDIRECT_URL));
    }
}