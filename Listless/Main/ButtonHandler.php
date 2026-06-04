<?php

    $selected = false;

    if (isset($_POST["cat"])) {
        CatSelect($selected);
    }

    if (isset($_POST["roller"])) {
        Roll($selected);
    }


    function CatSelect($selected = false) {
        global $selected;

        if($selected == false) {
            $selected = true;
        }

        else {
            $selected = false;
        }
    }


    function Roll($selected) {
        global $selected;

        if($selected == false) {
            echo "nooo";
        }
        else {
            echo 'ha';
        }
    }


?>