<?php

session_start();

$herrorDetail = $_REQUEST['herror-detail'];
$herrorTitle = $_REQUEST['herror-title'];
$btnLink = $_REQUEST['btn-link'];
$btnLink = $_REQUEST['btn-link'];
$herrorBg = $_FILES['herror_bg_img'];
// $herrorProfile = $_FILES['herror_profile_img'];

$extension1 = pathinfo($herrorBg['name'], PATHINFO_EXTENSION);
// $extension2 = pathinfo($herrorProfile['name'], PATHINFO_EXTENSION);

define('SELECTED_EXTENSION', ['jpg', 'jpeg', 'png']);

$error = [];

if(empty($herrorDetail)){
    $error['herror-detail'] = "Herror Detail is required";
}

if(empty($herrorTitle)){
    $error['herror-title'] = "Herror Title is required";
}

// if(empty($btnLink)){
//     $error['btn-link'] = "Enter btn link";
// }

//**********************/ image validation Start ************// 
if($herrorBg['size'] == 0){
    $error['herror_bg_img'] = "Herror background image is required";
} else if (!in_array($extension1,  SELECTED_EXTENSION)){
    $error['herror_bg_img'] = "Herror background image must ". join(", ", SELECTED_EXTENSION) . " are Excepted"; 
}

// if($herrorProfile['size'] == 0){
//     $error['herror_profile_img'] = "Herror Profile image is required";
// } else if (!in_array($extension2,  SELECTED_EXTENSION)){
//     $error['herror_profile_img'] = "Herror Profile image must ". join(", ", SELECTED_EXTENSION) . " are Excepted"; 
// }


//**********************/ image validation END ************// 


if(count($error) > 0){
    $_SESSION['error'] = $error;
    header("location: ../dashboard/herror.php");
}else {
    // update or Creat 
    include "../database/env.php";
    // $dataExits = false;
    $query = "SELECT * FROM  herror_deta LIMIT 1";
    $result = mysqli_query($conn, $query);  
 

    //**********! */ file Uploade Syster *****************************////
    $path = "../uploads/herror_bg_img";
    if(!file_exists($path)){
        mkdir($path);
    }

    // $path2 = "../uploads/herror_Profile_image";
    // if(!file_exists($path2)){
    //     mkdir($path2);
    // }

    //****** if previous image Found  */


    // if we not found previous image then we will upload new image
    $fileName = 'herror_bg_img-' . uniqid() . ".$extension1";
    move_uploaded_file($herrorBg['tmp_name'], $path . "/" . $fileName);

    // $fileName2 = 'herror_profile_img-' . uniqid() . ".$extension2";
    // move_uploaded_file($herrorProfile['tmp_name'], $path2 . "/" . $fileName2);


    //*************8 */ Update Data 

    if($result->num_rows > 0){
        // updata 
        $herrorImg = mysqli_fetch_assoc($result); 

        if ($herrorImg && isset($herrorImg['background_Image']) && !empty($herrorImg['background_Image'])) {
            $filePath = $path . "/" . $herrorImg['background_Image'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        // if($herrorImg['profile_image']){
        //     unlink($path2 . "/" . $herrorImg['profile_image']);
        // }
        $query = "UPDATE herror_deta SET herror_Detail='$herrorDetail',herror_Title='$herrorTitle',btn_link='$btnLink',background_Image='$fileName'";
    }else {
        // creat  
        $query = "INSERT INTO herror_deta(herror_Detail, herror_Title, btn_link, background_Image, ) VALUES ('$herrorDetail','$herrorTitle','$btnLink','$fileName')";
    }
    $result = mysqli_query($conn, $query);

}