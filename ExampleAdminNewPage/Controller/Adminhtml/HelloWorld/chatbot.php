<?php
    // With PHP, make an api request to the chatbot on click of the submit button:

    namespace Dolphin\ExampleAdminNewPage\Controller\Adminhtml\Helloworld;
    // require 'vendor/autoload.php';
    use OpenAI\OpenAI;

    use Magento\Backend\App\Action;
    use Magento\Backend\App\Action\Context;
    use Magento\Framework\Controller\Result\JsonFactory;
    
    class Chatbot extends Action
    {
        protected $resultJsonFactory;
    
        public function __construct(
            Context $context,
            JsonFactory $resultJsonFactory
        ) {
            parent::__construct($context);
            $this->resultJsonFactory = $resultJsonFactory;
            $this->logger = $logger;

        }
        
        public function execute()
        {
            $this->logger->info('Chatbot execute method called');

            $result = $this->resultJsonFactory->create();

            
            // repo is https://github.com/openai-php/client
            // echo "Hello World!";
            $yourApiKey = getenv('OPENAI_API_KEY');
            // echo $yourApiKey;
            $text = $this->getRequest()->getPost('text');
            echo $text;

            $client = OpenAI::client($yourApiKey);
            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $text],
                ],
            ]);
            
            $response->id; // 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq'
            $response->object; // 'chat.completion'
            $response->created; // 1677701073
            $response->model; // 'gpt-3.5-turbo-0301'
            
            foreach ($response->choices as $result) {
                $result->index; // 0
                $result->message->role; // 'assistant'
                $result->message->content; // '\n\nHello there! How can I assist you today?'
                $result->finishReason; // 'stop'
            }
            
            $response->usage->promptTokens; // 9,
            $response->usage->completionTokens; // 12,
            $response->usage->totalTokens; // 21
            
            // return the response
            // echo json_encode($response);
            
            return $result->setData($response);
}
}
