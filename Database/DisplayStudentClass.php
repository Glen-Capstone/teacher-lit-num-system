<?php 
include_once "Connection.php";
class DisplayStudentClass extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function ActiveStudentList(){
        $table = "user_info_view";
        $sql = "SELECT * FROM $table WHERE status = 'Active' AND user_level_description = 'Learner';";  
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td><a href='#'><span class='glyphicon glyphicon-info-sign' style = 'padding-left: 10px;'></span></a>";

                echo "<td>".$row['personal_id']."</td>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td class=text-success><strong>".$row['status']."</strong></td>";

                echo "<td>";
                echo "<a href='#' class='edit' data-toggle='modal' data-target='#editStudentModal' data-id='".$row["user_info_id"]."' style='margin-right:10px; color: text-success;'><span class='glyphicon glyphicon-edit' ></span></a>";
                
                echo " <a href='#' class='actvIconBtn text-danger' data-toggle='modal' data-target='#arcviveStudentModal' data-id='".$row["user_info_id"]."'> <span class='glyphicon glyphicon-trash'></span></a>";
                echo "</td>";

                echo "</tr>";
            }
        }

    }
    function ArchiveStudentList(){
        $table = "user_info_view";
        $sql = "SELECT * FROM $table WHERE status = 'Inactive' AND user_level_description = 'Learner';";  
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td><a href='#'><span class='glyphicon glyphicon-info-sign' style = 'padding-left: 10px;'></span></a>";

                echo "<td>".$row['personal_id']."</td>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']. "</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td class=text-danger><strong>".$row['status']."</strong></td>";

                echo "<td>";
                echo "<a href='#' class='edit' data-toggle='modal' data-target='#editStudentModal' data-id='".$row["user_info_id"]."' style='margin-right:10px; color: text-success;'><span class='glyphicon glyphicon-edit' ></span></a>";
                
                echo " <a href='#' class='actvIconBtn text-danger' data-toggle='modal' data-target='#activateStudentModal' data-id='".$row["user_info_id"]."'> <span class='glyphicon glyphicon-trash'></span></a>";
                echo "</td>";

                echo "</tr>";
            }
        }

    }
}
?>