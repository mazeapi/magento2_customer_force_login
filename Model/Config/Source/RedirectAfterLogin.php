<?php

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