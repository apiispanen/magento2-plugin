<?php
namespace Dolphin\ExampleAdminNewPage\Controller;
interface Chatbot
{
    /**
     * GET for Post api
     * @param string $text
     * @return string
     */
    public function getResponse($text);
}