
<?php
        $_SESSION['canid']=abs( crc32( uniqid() ) );
        echo "id  ".$_SESSION['canid'];
?>