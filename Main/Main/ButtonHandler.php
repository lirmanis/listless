<?php

if (!isset($_SESSION["selected"])) {
    $_SESSION["selected"] = "";
}

if (!isset($_SESSION["current_quest"])) {
    $_SESSION["current_quest"] = "";
}

if (!isset($_SESSION["used_quests"])) {
    $_SESSION["used_quests"] = array();
}

if (!isset($_SESSION["last_roll_time"])) {
    $_SESSION["last_roll_time"] = null;
}

if (isset($_POST["cat"])) {
    $_SESSION["selected"] = $_POST["cat"];
}

if (isset($_POST["roller"])) {

    $canRoll = true;

    if ($_SESSION["last_roll_time"] != null) {
        $now = time();
        $diff = $now - $_SESSION["last_roll_time"];

        if ($diff < 300) {
            $canRoll = false;
        }
    }

    if ($canRoll == true) {
        if ($_SESSION["selected"] != "") {

            $json = file_get_contents(__DIR__ . "/quests.json");
            $data = json_decode($json, true);

            $cat = $_SESSION["selected"];

            $cat = ucfirst(strtolower($cat));

            if (isset($data[$cat])) {

                $quests = $data[$cat];

                $used = array();

                if (isset($_SESSION["used_quests"][$cat])) {
                    $used = $_SESSION["used_quests"][$cat];
                }

                $available = array();

                foreach ($quests as $q) {
                    if (!in_array($q, $used)) {
                        $available[] = $q;
                    }
                }

                if (count($available) == 0) {
                    $available = $quests;
                    $_SESSION["used_quests"][$cat] = array();
                }

                $randKey = array_rand($available);
                $quest = $available[$randKey];

                $_SESSION["current_quest"] = $quest;

                if (!isset($_SESSION["used_quests"][$cat])) {
                    $_SESSION["used_quests"][$cat] = array();
                }

                $_SESSION["used_quests"][$cat][] = $quest;

                $_SESSION["last_roll_time"] = time();
            }
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST["complete"])) {
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
}

?>