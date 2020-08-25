<?php

namespace Meetanshi\Hello\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Meetanshi\Hello\Model\HelloFactory;
use Meetanshi\Hello\Model\ResourceModel\Hello\CollectionFactory;

class Submit extends Action
{
    protected $pageFactory;
    protected $hello;
    protected $collection;

    public function __construct(
        Context $context,
        HelloFactory $hello,
        CollectionFactory $collection,
        PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->hello = $hello;
        $this->collection = $collection;
        return parent::__construct($context);
    }

    public function execute()
    {
        try {
            $post = $this->getRequest()->getPost();
            if ($post) {
                $model = $this->hello->create();
                $model->setName($post['name'])
                    ->setEmail($post['email'])
                    ->setGender($post['gender'])
                    ->setDob($post['dob'])
                    ->save();
                $this->messageManager->addSuccessMessage(__("Success Message"));


                \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('badha record');
                $colection = $this->collection->create();

                \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info(print_r($colection->getData(),true));

            }
        } catch (\Exception $e) {
            \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info($e->getMessage());
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;

    }
}
