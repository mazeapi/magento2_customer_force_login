<?php
/**
 * Mazeapi Software.
 *
 * @package   Mazeapi_ForceLogin
 * @author    Mazeapi
 * @author    Iftakharul Alam <bappa2du@gmail.com>
 * @license   https://mazeapi.com/license.html
 */
namespace Mazeapi\ForceLogin\Model\Config\Source;


class RedirectAfterLogin
{
	public function toOptionArray()
    {
    	return [
    		['value' => '/', 'label' => __('Homepage')],
    		['value' => '/customer/account', 'label' => __('Customer Dashboard')],
    	];	
    }
}