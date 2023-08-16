<?php
namespace Dolphin\TutorialPlugin\Model\Conflict;
class Plugin1
{
    public function afterGetMessage($subject, $result)
    {
        echo "Calling " , __METHOD__ , "\n";    
        return 'From Plugin 1';
    }
}
