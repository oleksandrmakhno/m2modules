<?php

namespace Om\CustomRouter\Controller\One;

class Two extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        echo 222;
        die;
    }
}