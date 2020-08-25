<?php

namespace Meetanshi\Hello\Block;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\View\Element\Template;

class Index extends Template
{
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
    }

    public function getFormAction()
    {
        ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('block file called');

        return $this->getUrl('hello/index/submit', ['_secure' => true]);
    }
}
