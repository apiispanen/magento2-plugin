<?php 
namespace Dolphin\ExampleAdminNewPage\Model;

use Dolphin\ExampleAdminNewPage\Api\ChatbotInterface;
use OpenAI\OpenAI;

class Chatbot implements ChatbotInterface
{
    public function getResponse($text)
    {
        $yourApiKey = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($yourApiKey);
        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $text],
            ],
        ]);

        return $response->choices[0]->message->content;
    }
}
