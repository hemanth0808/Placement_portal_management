<?php
 
    // Database Connection
    require("config.php");
    session_name("staff");
   session_start();
   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: staff_login.php");
    exit;
}
    // get users list
    $cgpa = $_SESSION["cgpa"];
    $backlog = $_SESSION["backlog"];
    $company=$_SESSION['company'];
    $query = "select * from marks where cgpa >= '$cgpa' and backlogs <='$backlog'";
    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
    }
 
    $users = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    
 
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=users-sample.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('RegdNo','Name','Email','Contact','D.O.B', 'Cgpa', 'Backlogs' ,'Company'));
 
    /*if (count($users) > 0) {
        foreach ($users as $row) {
            fputcsv($output, $row);
        }
    }*/
    $row4=array();
    if(count($users)>0){
        foreach($users as $row){
            $regd=$row["regdno"];
            $query2= "select * from student where regdno='$regd'";
            if (!$result2 = mysqli_query($conn, $query2)) {
                exit(mysqli_error($conn));
            }
            if (mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $users2[] = $row2;
                }
            }
            if(count($users2)>0){
                foreach($users2 as $row2){
                   
                } 
        }
        $row3=array_merge($row2,$row);
        array_push($row3,$company);
        unset($row3['password']);
        fputcsv($output,$row3);
        /*print_r($row2['name']);
        print_r($row["regdno"]);*/
    }
}
?>