<?php
include_once 'inc/db.php';
$db = new Database();
$db->openDb();
$conn = $db->con;
?>
<!DOCTYPE html>
<html>
<head>
<style>
ul {
  background-color: #000000;
  width: 755px;
  height: 348px;
  padding: 50px;
  margin: 0px ! important;
  display: block;
  /*justify-content: center;*/
  position: absolute;
}
label{
    display: inline-block;
    float: left;
    clear: left;
    width: 250px;
    text-align: left;
}
input {
  display: inline-block;
  float: left;
}
</style>
</head>
<body>
    <div>
        <div class="col-lg-12">
            <form action="process_testid.php" method="post">
        </div>
        <ul style="color: white; font-size:18px;">
            <?php 
            $testid = "";
            $seal_size = "";
            $de_catridge = "";
            $project_number_name = "";
            $description_ga = "";
            $operator = "";
            $ndecat = "";

            if (isset($_COOKIE['nde_catridge'])) {
                # code...
                $ndecat = $_COOKIE['nde_catridge'];

                if ($ndecat == NULL) {
                    # code...
                    $ndecat = "";
                }
            }

            if (isset($_COOKIE['operator'])) {
                # code...
                $operator = $_COOKIE['operator'];

                if ($operator == NULL) {
                    # code...
                    $operator = "";
                }
            }

            if (isset($_COOKIE['description_ga'])) {
                # code...
                $description_ga = $_COOKIE['description_ga'];
                if ($description_ga == NULL) {
                    # code...
                    $description_ga = "";
                }
            }

            if (isset($_COOKIE['project_number_name'])) {
                # code...
                $project_number_name = $_COOKIE['project_number_name'];

                if ($project_number_name == NULL) {
                    # code...
                    $project_number_name = "";
                }
            }

            if (isset($_COOKIE['de_catridge'])) {
                # code...
                $de_catridge = $_COOKIE['de_catridge'];
                if ($de_catridge == NULL) {
                    # code...
                    $de_catridge = "";
                }
            }

            if (isset($_COOKIE['test_id'])) {
                # code...
                $testid = $_COOKIE['test_id'];
                if ($testid == NULL) {
                    # code...
                    $testid = "";
                }
            }

            if (isset($_COOKIE['seal_size'])) {
                # code...
                $seal_size = $_COOKIE['seal_size'];
                if ($seal_size == NULL) {
                    # code...
                    $seal_size = "";
                }
            }

            $sqlRow = mysqli_query($conn, "SELECT * FROM `rig_details2` ORDER BY `ID` DESC limit 1");
            $getRigStatus = mysqli_fetch_array($sqlRow);
            $rigSt = 0;
            // var_dump($getRigStatus); exit;
            if ($getRigStatus != NULL) {
                $rigSt = $getRigStatus['Onoff_Status']; 
            }

            ?>
            <li>
                <label for="fname">TestId :</label>
                <input type="text" onkeyup="saveCookie('test_id')" value="<?=$testid; ?>" id="test_id" class="form-control" name="testid">
            </li>
            <br>
            <li> 
                <label for="fname">Seal Size :</label>
                <input type="text" value="<?=$seal_size; ?>" id="seal_size" onkeyup="saveCookie('seal_size')" class="form-control" name="seal_size">
            </li>
            <br>
            <li> 
                <label for="fname">DE Catridge :</label>
                <input type="text" id="de_catridge" value="<?=$de_catridge; ?>" onkeyup="saveCookie('de_catridge')" class="form-control" name="de_catridge">
            </li>
            <br>
            <li>
                <label for="fname">NDE Catridge :</label>
                <input type="text" id="nde_catridge" onkeyup="saveCookie('nde_catridge')" class="form-control" name="nde_catridge" value="<?=$ndecat; ?>">
            </li>
            <br>
            <li>
                <label for="fname">Project Number & Name :</label>
                <input type="text" id="project_number_name" value="<?=$project_number_name; ?>" onkeyup="saveCookie('project_number_name')" class="form-control" name="project_number_name">
            </li>
            <br>
            <li>
                <label for="fname">Description_GA :</label>
                <input type="text" id="description_ga" value="<?=$description_ga; ?>" onkeyup="saveCookie('description_ga')" class="form-control" name="description_ga">
            </li>
            <br>
            <li>
                <label for="fname">Operator :</label>
                <input type="text" id="operator" value="<?=$operator; ?>" onkeyup="saveCookie('operator')" class="form-control" name="operator">
            </li>

            <p align="right">
                <input type="submit" <?php 
                if ($rigSt == 1) {
                    # code...
                     ?>
                     disabled="true"
                     <?php
                }
                ?> name="insert" value="insert" class="btn btn-success"  style="margin-right: 150px; float: right !important; margin-top:10px;"/>
            </p>
            <p align="right">
                <input type="submit" <?php 
                    if ($rigSt == 0) {
                        # code...
                        ?>
                        disabled="true"
                        <?php
                    }
                    // $sql = "SELECT * FROM `rig_details2` ORDER BY `ID` DESC limit 1";
                    // $result = $conn->query($sql);
                    // if (!empty($result)) {
                    //     $rows = $result->fetch_assoc();
                    //     var_dump($rows); exit;
                    // }
                ?> name="update" value="update" class="btn btn-success"  style="margin-right: 50px; float: right !important; margin-top:10px;"/> 
            </p>           
        </ul>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

        <script type="text/javascript">
            function saveCookie(id)
            {
                var get_id = "#"+id;
                var get_value = $(get_id).val();
                Cookies.set(id, get_value);
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function () {   
            $("#my-form").submit(function (e) {   
                $("#btn-submit").attr("disabled", true);
                return true;
            });
        });
        </script>
    </div>

    <!-- <script type="text/javascript">
        var f = 1;
        setInterval(function(){ 
            addData();
        }, 2000);
        addData();

        function addData()
        {
            var status = '<?=$rigSt; ?>';
            if (status == '0') 
            {
                var test_id = $("#test_id").val();
                var seal_size = $("#seal_size").val();
                var de_catridge = $("#de_catridge").val();
                var nde_catridge = $("#nde_catridge").val();
                var project_number_name = $("#project_number_name").val();
                var operator = $("#operator").val();
                var description_ga = $("#description_ga").val();

                if (test_id != "" && seal_size != "" && de_catridge != "" && nde_catridge != "" && project_number_name != "" && operator != "" && description_ga != "") 
                {
                    setInterval(function(){
                        $.post("process_testid.php", {testid:test_id, seal_size:seal_size, de_catridge:de_catridge, nde_catridge:nde_catridge, project_number_name:project_number_name, operator:operator, description_ga:description_ga}, 
                        function(result)
                        {
                            $("#test_id").val('');
                            $("#seal_size").val('');
                            $("#de_catridge").val('');
                            $("#nde_catridge").val('');
                            $("#project_number_name").val('');
                            $("#operator").val('');
                            $("#description_ga").val('');

                            Cookies.remove('nde_catridge');
                            Cookies.remove('de_catridge');
                            Cookies.remove('operator');
                            Cookies.remove('test_id');
                            Cookies.remove('description_ga');
                            Cookies.remove('seal_size');
                            Cookies.remove('project_number_name');

                            location.reload();
                        });
                    }, 2000);
                }
            }         
        }
    </script> -->

</body>
</html>



