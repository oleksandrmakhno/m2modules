<?php

namespace Om\CustomRouter\Controller;

class Router implements \Magento\Framework\App\RouterInterface
{
    protected $actionFactory;
    protected $_response;

    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory
    ) {
        $this->actionFactory = $actionFactory;
    }

    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $moduleName = 'omfront'; // this is value from routes.xml->frontName
        if ($request->getModuleName() === $moduleName) {
            return false;
        }
        $identifier = trim($request->getPathInfo(), '/');
        if (strpos($identifier, 'om') !== false) {
            $request->setModuleName($moduleName)->setControllerName('one')->setActionName('two');
        } else {
            return false;
        }

        return $this->actionFactory->create(
            'Magento\Framework\App\Action\Forward',
            ['request' => $request]
        );
    }
}