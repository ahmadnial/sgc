<?php
include 'conn2.php';

if (isset($_POST['add-groupper'])) {

    $add_groupper = $_POST['form-groupper'];
    $mr = $_POST['mr'];
    $sql = "INSERT into econtrol values ('$add_groupper','$mr') ";
    $query = sqlsrv_query($conn, $sql);
    header('location: index.php');

    if ($query) {
        //redirect ke halaman index
        echo "<script> alert(
            'Sip,sampun Kesimpen sri!') </script>";
        echo "<script>
                window.location.href='index.php'
            </script>";
    } else {
        // var_dump();
        die(print_r(sqlsrv_errors(), true));
    }
}
