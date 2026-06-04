<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listless</title>
    <link rel="stylesheet" href="Main/style.css">
    <?php include('Main/ButtonHandler.php') ?>
    <?php include('Main/level.php') ?>
</head>
<body>

    <header>
        <div class="logo">
            <img src="https://cdn-icons-png.flaticon.com/256/8194/8194907.png" alt="Listless logo">
            <p>Listless</p>
        </div>

        <div class="headerRight">
            <div class="levelBadge">
                <p class="badge-label">Lv.</p>
                <p class="badge-value"> <?php echo $level ?> </p>
            </div>

            <div class="questTracker">
                <p class="tracker-count">
                    <strong> <?php echo $Completed ?> </strong> <small>/ 10</small>
                </p>

                <div class="segBar">
                    <div class="seg"></div>
                    <div class="seg"></div>
                    <div class="seg"></div>
                    <div class="seg"></div>
                    <div class="seg"></div>
                    <div class="seg"></div>
                    <div class="seg"></div>
                    <div class="seg"></div>
                    <div class="seg"></div>
                    <div class="seg"></div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="topRow">
            <section class="questBox">
                <p class="section-label">CURRENT SIDE QUEST</p>

                <div class="questCard">
                    <div class="questTop">
                        <img src="https://cdn-icons-png.flaticon.com/256/724/724715.png" alt="Quest icon">
                        <p class="quest-title"><?php echo htmlspecialchars($_SESSION['current_quest']); ?></p>
                    </div>

                    <div class="questTags">
                        <?php
                        $timerText = "Ready to roll!";

                        if ($_SESSION['last_roll_time'] != null) {
                            $secondsPassed = time() - $_SESSION['last_roll_time'];
                            $secondsLeft = 5 - $secondsPassed;

                            if ($secondsLeft > 0) {
                                $minutesLeft = floor($secondsLeft / 60);
                                $secsLeft    = $secondsLeft % 60;
                                $timerText   = "⏳ Next roll in: " . $minutesLeft . "m " . $secsLeft . "s";
                            }
                        }
                        ?>
                        <p class="tag tag-timer">⏰ <?php echo $timerText; ?></p>
                    </div>

                    <?php if ($_SESSION['current_quest'] != "" && (time() - $_SESSION['last_roll_time']) >= 5): ?>
                        <form method="post">
                            <button type="submit" name="complete" class="btn btn-complete">✓ COMPLETE QUEST</button>
                        </form>
                    <?php endif; ?>
                </div>
            </section>

            <section class="rollBox">
                <p class="section-label">NEED SOMETHING NEW?</p>

                <div class="rollCard">
                    <img src="https://cdn-icons-png.flaticon.com/256/2058/2058703.png" alt="Dice icon">
                    <p class="roll-label">GET A RANDOM SIDE QUEST</p>
                    <p class="roll-hint">Can't find the right quest? Roll for a new one!</p>
                </div>

                <form method="post">
                    <button type="submit" name="roller" class="btn btn-roll">🎲 ROLL QUEST</button>
                </form>
            </section>
        </div>

        <p class="section-label">SIDE QUEST CATEGORIES</p>
        <div class="catGrid">

            <form method="post" style="display: contents;">
                <button value="social" type="submit" name="cat"
                    class="catCard <?php if($_SESSION['selected'] == 'social') echo 'catCard-active'; ?>">
                    <img src="https://cdn-icons-png.flaticon.com/256/1019/1019607.png" alt="Social category">
                    <p class="cat-name"> Social </p>
                    <p class="cat-avail">20 Available</p>
                </button>

                <button value="physical" type="submit" name="cat"
                    class="catCard <?php if($_SESSION['selected'] == 'physical') echo 'catCard-active'; ?>">
                    <img src="https://cdn-icons-png.flaticon.com/256/2936/2936886.png" alt="Physical category">
                    <p class="cat-name"> Physical </p>
                    <p class="cat-avail">20 Available</p>
                </button>

                <button value="mental" type="submit" name="cat"
                    class="catCard <?php if($_SESSION['selected'] == 'mental') echo 'catCard-active'; ?>">
                    <img src="https://cdn-icons-png.flaticon.com/256/2784/2784461.png" alt="Mental category">
                    <p class="cat-name"> Mental </p>
                    <p class="cat-avail">20 Available</p>
                </button>

                <button value="lifestyle" type="submit" name="cat"
                    class="catCard <?php if($_SESSION['selected'] == 'lifestyle') echo 'catCard-active'; ?>">
                    <img src="https://cdn-icons-png.flaticon.com/256/1067/1067555.png" alt="Lifestyle category">
                    <p class="cat-name"> Lifestyle </p>
                    <p class="cat-avail">20 Available</p>
                </button>
            </form>
        </div>

        <div class="tipCard">
            <img src="Main/image-removebg-preview.png" alt="Tip icon">
            <div>
                <p class="tip-label">TIP</p>
                <p class="tip-text">Small steps every day lead to big changes. You've got this!</p>
            </div>
        </div>
    </main>

</body>
</html>