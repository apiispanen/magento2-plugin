<?php 
namespace Dolphin\TutorialPlugin\Controller\Adminhtml\Settings;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\RawFactory;

class Index extends Action
{
    protected $resultRawFactory;

    public function __construct(Action\Context $context, RawFactory $resultRawFactory)
    {
        parent::__construct($context);
        $this->resultRawFactory = $resultRawFactory;
    }

    public function execute()
    {
        $resultRaw = $this->resultRawFactory->create();
        $resultRaw->setContents('Hello World!');
        return $resultRaw;
    }

    protected function _isAllowed()
    {
        // You may want to set a custom ACL rule here or use an existing rule
        return $this->_authorization->isAllowed('Magento_Backend::content');
    }
}
