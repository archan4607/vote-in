<?php
include_once  "config.php";

if (isset($_GET['apply'])) {

    $chk = $_GET['chkbox'];
    $chk_imp = implode(",", $chk);
    echo $chk_imp;

    // $admin_insert = "UPDATE  admin  SET  AdminShowResult  = '$chk_exp' WHERE  admin . AdminID  = 1";
    $admin_insert="INSERT INTO  admin  (AdminShowResult ) VALUES ('$chk_imp')";
    $admin_update_result = mysqli_query($con, $admin_insert);


    $chk = $_GET['chkbox'];
    $chk_exp = explode(",", $chk);
    print_r($chk_exp);

    $admin_update = "UPDATE  admin  SET  AdminShowResult  = '$chk_exp' WHERE  admin . AdminID  = 1";
    // $admin_insert="INSERT INTO  admin  (AdminShowResult ) VALUES ('$chk_value')";
    $admin_update_result = mysqli_query($con, $admin_update);
    // $admin_update_fetch=mysqli_fetch_assoc($admin_update_result);

    echo "<br>" . $admin_update_result;
    print_r($admin_update_result);

    
}
?>
<form method="GET">
    <div class="card">
        <div class="card-body">
            <div class="form-check mb-3">
                <h4>Show Voting Result</h4>
            </div>


            <div class="form-check form-check-inline font-17">
                <input class="form-check-input" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#f72a2a" value="1" 
                <?php
                    if (in_array("1",$chk_exp))
                    {
                        echo "checked";
                    }
                ?>>
                <label class="form-check-label" for="inlineCheckbox2">Candidate Only</label>
            </div>
            <div class="form-check form-check-inline font-17">
                <input class="form-check-input" type="checkbox" name="chkbox[]" data-size="small" data-plugin="switchery" data-color="#1cff60" value="2"
                <?php
                    if (in_array("2",$chk_exp))
                    {
                        echo "checked";
                    }
                ?>>
                <label class="form-check-label" for="inlineCheckbox3">User Only</label>
            </div>
            <div class="form-check form-check-inline font-17">
                <button type="submit" style="margin-left: 55rem;" class="btn btn-success rounded-pill waves-effect waves-light" name="apply">
                    Apply Changes
                </button>




            </div>


        </div>
    </div>
</form>