<?php

$databasehost = "freedb.tech";
$databasename = "freedbtech_myelination";
$databaseusername = "freedbtech_username";
$databasepassword = "password";

$con = mysqli_connect($databasehost,$databaseusername,$databasepassword,$databasename) or die(mysqli_error($con));
mysqli_set_charset($con,"utf-8");
mysqli_query($conn,"SET CHARACTER SET 'utf8'");
mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");
$query = file_get_contents("php://input");
$sth = mysqli_query($con,$query);

if(mysqli_errno($con)){
    header("HTTP/1.1 500 Internal Server Error");
    echo $query."\n";
    echo "errorr";
    echo mysqli_error($con);
}else{
    $question = $_GET['question'];
    $answer = $_GET['answer'];
    $choicea = $_GET['choicea'];
    $choiceb = $_GET['choiceb'];
    $choicec = $_GET['choicec'];
    $remarks = $_GET['remarks'];

    $sql = "INSERT into question_tbl(question,answer,choicea,choiceb,choicec,remarks) values('".$question."','".$answer."','".$choicea."','".$choiceb."','".$choicec."','".$remarks."')";
    if(mysqli_query($con,$sql)){
        echo "saved successfuly!";
    }else{
        echo "error".mysqli_error($con);
    }
    /*$rows=array();
    while($r = mysqli_fetch_assoc($sth)){
        $rows[] = $r;
    }
    $res = json_encode($rows);
    echo $res;
    mysqli_free_result($sth);
    */

}

mysqli_close($con);

?>
