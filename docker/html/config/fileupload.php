<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/forum-data">
        <label>Title</label>
        <input type="text" name="title">
        <label>File Upload</label>
        <input type="File" name="file">
        <input type="submit" name="submit">

    </form>

</body>
</html>
//<?php
//conn string
//$conn = mysqli_connect($host,$db,$user,$pass,$charset);

// if (isset($_POST["submit"]))
// {
//     $title = $_POST["title"];

//     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];

//     $tname = $_FILES["files"]["tmp_name"];

//     $uploads_dir = '/images';

//     move_uploaded_file($tname,$uploads_dir.'/'.$pname);

//     $sql  = "INSERT into fileup(title,image) VALUES('$title','$pname')";
//     if(mysqli_query($conn,$sql)){
//         echo "File succes";
//     }
//     else{
//         echo"Error";
//     }
// }
// ?> -->
