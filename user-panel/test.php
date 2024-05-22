
    <?php


    $con = mysqli_connect("localhost", "root", "", "votein");
    if (!$con) {
        echo "Something went wrong";
        die();
    }


    echo "Today ".$today_date =date("Y-m-d")."<br>";

    $F_date = "SELECT VotingFrom  FROM admin WHERE AdminUID=2100682887";
    $F_date_cmp = mysqli_query($con, $F_date);
    $F_date_fetch = mysqli_fetch_assoc($F_date_cmp);
    echo "From ". $F_date_fetch['VotingFrom']."<br>";

    $T_date = "SELECT VotingTill FROM admin WHERE AdminUID=2100682887";
    $T_date_cmp = mysqli_query($con, $T_date);
    $T_date_fetch = mysqli_fetch_assoc($T_date_cmp);
    echo "Till ". $T_date_fetch['VotingTill']."<br>";

    if ($today_date >  $F_date_fetch['VotingFrom'] and $today_date < $T_date_fetch['VotingTill']) {
        echo "DATE MATCH";
    }
    else {
        echo "<br>DATE NOT MATCH";
    }
    ?>