<?php

namespace Meetanshi\Hello\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Hello extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mt_registration', 'id');
    }
}
