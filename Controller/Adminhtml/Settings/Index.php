<?php
namespace Dolphin\TutorialPlugin\Controller\Adminhtml\Settings;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Data\Form\FormKey\Validator as FormKeyValidator; // Import FormKeyValidator
use Psr\Log\LoggerInterface; // Import LoggerInterface
use Magento\Backend\App\Action\Context;

class Index extends Action implements HttpGetActionInterface
{
    protected $resultPageFactory;
    protected $_formKeyValidator; // Define FormKeyValidator
    protected $_logger; // Define Logger

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        FormKeyValidator $formKeyValidator, // Inject FormKeyValidator
        LoggerInterface $logger // Inject Logger
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_formKeyValidator = $formKeyValidator; // Initialize FormKeyValidator
        $this->_logger = $logger; // Initialize Logger
        parent::__construct($context);
    }

    public function execute()
    {
        // Log the Form Keys
        $this->_logger->info('Form Key from Post: ' . $this->getRequest()->getParam('form_key'));
        $this->_logger->info('Form Key from Session: ' . $this->_formKeyValidator->getFormKey());

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
