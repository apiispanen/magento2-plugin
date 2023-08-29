<?php
namespace Dolphin\ExampleAdminNewPage\Controller;
interface Chatbot
{
    /**
     * GET for Post api
     * @param string $name
     * @param string $info
     * @return string
     */
    public function getPost($name, $info);
}