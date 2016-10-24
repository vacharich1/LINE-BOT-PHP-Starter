<?php
// page2.php

session_start();

echo 'Welcome to page #2<br />';

echo $_SESSION['favcolor']; // green

// You may want to use SID here, like we did in page1.php
echo '<br /><a href="bot.php">page 1</a>';
?>