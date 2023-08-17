<?php 
namespace Dolphin\TutorialPlugin\Controller\Adminhtml\Settings;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface; // Import this interface
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface // Implement this interface
{
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Tutorial Plugin Settings'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        // You may want to set a custom ACL rule here or use an existing rule
        return $this->_authorization->isAllowed('Magento_Backend::content');
    }
}
