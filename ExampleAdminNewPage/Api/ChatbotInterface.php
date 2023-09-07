<?php
namespace Dolphin\ExampleAdminNewPage\Api;
interface ChatbotInterface
{
    /**
     * GET for Post api
     * @param string $name
     * @param string $info
     * @return string
     */
    public function getPost($name, $info);
}