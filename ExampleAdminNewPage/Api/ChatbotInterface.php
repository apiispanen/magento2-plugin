<?php
namespace Dolphin\ExampleAdminNewPage\Api;
interface ChatbotInterface
{
    /**
     * GET for Post api
     * @param string $text
     * @return string
     */
    public function getResponse($text);
}