<?php

namespace Meetanshi\Hello\Model;

use Magento\Framework\Model\AbstractModel;

class Hello extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Meetanshi\Hello\Model\ResourceModel\Hello');
    }
}
