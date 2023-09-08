<?php
namespace Dolphin\ExampleAdminNewPage\Api;

/**
 * Interface ChatbotInterface
 * @api
 * @since 100.1.0
 */

interface ChatbotInterface
{
    /**
     * GET for Post api
     * @param string $text
     * @return string
     */
    public function getResponse($text);
}