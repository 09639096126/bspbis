<?php
 $db = mysqli_connect('sql313.infinityfree.com', 'if0_36876348', '1XKX6HDUghKbCy6') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'if0_36876348_bspbis' ) or die(mysqli_error($db));

        session_start();
?>