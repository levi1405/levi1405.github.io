
<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
    <?php
function camposelect($campo,$tabla,$id)
{  
    include("conexion.php");

    $sql = "SELECT $id,$campo FROM $tabla";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    echo "<select name='$campo'>";
    while($row = $result->fetch_assoc())
     {
        echo  "<option value='".$row["$campo"]. "'>".$row["$campo"]."</option>";      
        }
    echo "</select>";
    } $conn->close();
}
///////////////////////////////////////////////////////////////
function editselect($campo,$tabla,$id,$selected)
{  
    include("conexion.php");
    
    $sql = "SELECT $id,$campo FROM $tabla";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    echo "<select name='$campo' >";
    while($row = $result->fetch_assoc())
        {
            echo  "<option value='".$row["$campo"]."'";
             if($row["$campo"]==$selected){
                echo  " selected ";  
             }
            echo ">".$row["$campo"]."</option>";   
        }
    echo "</select>";
    } $conn->close();
}

    ?>