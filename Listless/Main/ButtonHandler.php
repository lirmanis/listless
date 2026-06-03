<?php

    $data = [
        'Selected' => false,
        'QuestRolled' => false,
        'Timer'=> 10,
    ];

    if (isset($_POST["cat"])) {
        CatSelect($data);
    }

    if (isset($_POST["roller"])) {
        Roll($data);
    }

    function CatSelect(array $data) {
        global $data;

        if($data['Selected'] == false) {
            $data['Selected'] = true;
            $data['ButtonName'] = "Selected";
        }

        else {
            $data['Selected'] = false;
        }
    }

    function Roll(array $data) {
        global $data;

        if($data['Selected'] == false) {
            echo "nooo";
            return;
        }
        else {
            echo 'ha';
        }

    }


?>