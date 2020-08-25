<?php

namespace Meetanshi\Hello\Model\ResourceModel\Hello;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Meetanshi\Hello\Model\Hello',
            'Meetanshi\Hello\Model\ResourceModel\Hello'
        );
    }
}
