<?php

if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 1;
}

if (!isset($_SESSION['Completed'])) {
    $_SESSION['Completed'] = 0;
}

if (!isset($_SESSION['last_roll_time'])) {
    $_SESSION['last_roll_time'] = null;
}

if (!isset($_SESSION['current_quest'])) {
    $_SESSION['current_quest'] = "";
}

if (isset($_POST['complete'])) {

    $timerDone = true;

    if ($_SESSION['last_roll_time'] != null) {
        $timeNow = time();
        $secondsPassed = $timeNow - $_SESSION['last_roll_time'];

        if ($secondsPassed < 300) {
            $timerDone = false;
        }
    }

    if ($_SESSION['current_quest'] != "") {

        if ($timerDone == true) {

            $_SESSION['Completed'] = $_SESSION['Completed'] + 1;

            $_SESSION['current_quest'] = "";
            $_SESSION['last_roll_time'] = null;

            if ($_SESSION['Completed'] >= 10) {
                $_SESSION['level'] = $_SESSION['level'] + 1;
                $_SESSION['Completed'] = 0;
            }

            $storage = __DIR__ . '/../Register/data.json';
            $users = json_decode(file_get_contents($storage), true);

            foreach ($users as &$user) {
                if ($user['username'] === $_SESSION['user']) {
                    $user['level']     = $_SESSION['level'];
                    $user['Completed'] = $_SESSION['Completed'];
                    break;
                }
            }
            unset($user);

            file_put_contents($storage, json_encode($users, JSON_PRETTY_PRINT));
        }
    }
}

$level     = $_SESSION['level'];
$Completed = $_SESSION['Completed'];