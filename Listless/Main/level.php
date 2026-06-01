<?php

$level = 1;
$Quests = 10;
$Completed = 0;


function LevelUp($level, $Completed, $Quests) {
    global $level;
    global $Completed;
    global $Quests;

    if ($Completed < $Quests) {
        $Completed++;
    }
   elseif($Completed == $Quests) {
        $level ++;
        $Completed = 0;
    }
    
}

?>