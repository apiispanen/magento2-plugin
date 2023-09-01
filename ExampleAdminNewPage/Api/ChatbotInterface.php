<?
namespace Dolphin\ExampleAdminNewPage\Api;

interface ChatbotInterface
{
    /**
     * @param string $text
     * @return string
     */
    public function getResponse($text);
}
