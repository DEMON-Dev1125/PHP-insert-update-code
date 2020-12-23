<?php
    $mysqli = new mysqli("localhost", "root", "", "johncrane");
    if(isset($_POST['update']))
    {  
        $Test_ID =$_POST['testid'];
        $Seal_Size =$_POST['seal_size'];
        $DE_Catridge =$_POST['de_catridge'];
        $NDE_Catridge =$_POST['nde_catridge'];
        $Project_Number_Name =$_POST['project_number_name'];
        $Description_GA =$_POST['description_ga'];
        $Operator =$_POST['operator'];    

        $idSql = "SELECT ID FROM `rig_details2` ORDER BY `ID` DESC limit 1";
        $result = mysqli_query($mysqli, $idSql);
        if (!empty($result)) {
            $rows = $result->fetch_assoc();
            $id = $rows['ID'];

            $sql = "UPDATE `rig_details2` SET `Test_ID`='$Test_ID',`Seal_Size`='$Seal_Size',`DE_Catridge`='$DE_Catridge',`NDE_Catridge`='$NDE_Catridge',`Project_Number_Name`='$Project_Number_Name',`Description_GA`='$Description_GA',`Operator`='$Operator' WHERE ID= '$id'";
        
            $query = mysqli_query($mysqli,$sql);
        
            if(!isset($query))
            {
                die("Error $query" .mysqli_connect_error());
            }
            else
            {
                header('Location: index.php');
            }
        }
    }

    if(isset($_POST['insert']))
    {
        $Test_ID =$_POST['testid'];
        $Seal_Size =$_POST['seal_size'];
        $DE_Catridge =$_POST['de_catridge'];
        $NDE_Catridge =$_POST['nde_catridge'];
        $Project_Number_Name =$_POST['project_number_name'];
        $Description_GA =$_POST['description_ga'];
        $Operator =$_POST['operator'];      
        

        if ($Test_ID != '' && $Seal_Size != '' && $DE_Catridge != '' && $NDE_Catridge != '' && $Project_Number_Name != '' && $Description_GA != '' && $Operator != '' ) // Textboxes should not be empty
        {    
            //$sql = "SELECT * FROM rig_details1 WHERE Test_ID = 'NULL' AND Seal_Size = 'NULL' AND DE_Catridge = 'NULL' AND NDE_Catridge = 'NULL' AND Project_Number_Name = 'NULL' AND Description_GA = 'NULL' AND Operator = 'NULL' ORDER BY ID DESC LIMIT 1";
            
            //$result = mysqli_fetch_array(mysqli_query($conn, $sql));
        
            //if (!empty($result))  // Is the rig_details table last row is having NULL as values
            //{
                //$id = $result['ID'];

                //$sql = "UPDATE `rig_details1` SET `Test_ID`='$Test_ID',`Seal_Size`='$Seal_Size',`DE_Catridge`='$DE_Catridge',`NDE_Catridge`='$NDE_Catridge',`Project_Number_Name`='$Project_Number_Name',`Description_GA`='$Description_GA',`Operator`='$Operator' WHERE ID = '$id'";
                $sql = "INSERT INTO `rig_details2`(`Test_ID`, `seal_size`, `de_catridge`, `nde_catridge`, `project_number_name`, `description_ga`, `operator`, `Onoff_Status`)
                VALUES ('$Test_ID', '$Seal_Size', '$DE_Catridge', '$NDE_Catridge', '$Project_Number_Name', '$Description_GA', '$Operator', 1)";

                //mysqli_query($conn, $sql);
                $query = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
                
                if($query)
                {
                   header('Location: index.php');
                }
            // }
            // else
            // {
            //     header('Location: index.php');
            // }
        }
        else
        {
            header('Location: index.php');
        } 
    }
    else
    {
        header('Location: index.php');
    }  
    $mysqli->close();
?>

