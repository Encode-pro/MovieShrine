<?php
if(isset($_POST['submit'])&& isset($_FILES['my_image']))
{
    include "db_conn.php";
    echo "<pre>";
    print_r($_FILES['my_image']);
    echo"</pre>";

    $img_name=$_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name=$_FILES['my_image']['tmp_name'];
    $error=$_FILES['my_image']['error'];

    if($error===0)
    {
        if($img_size>125000)
        {
            $em="Sorry, Your file is too large.";
            header("Location: account.php?error=$em");
        }
        else
        {
            $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc=strtolower($img_ex);
            $allowed_exs=array("jpg","jpeg","png");
            if(in_array($img_ex_lc,$allowed_exs))
            {
                $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path='img/userprofile'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);

                //Insert into database
                if(!isset($_SESSION)) 
                { 
                    session_start(); 
                } 
                $u_name=$_SESSION['username'];
                $sql="insert into moviereview.images(user_name,image_url) values ('$u_name','$new_img_name')";
                mysqli_query($con,$sql);
                header("Location: account.php");
                
            }
            else
            {
                $em="You can't upload files of this type";
                header("Location: account.php?error=$em");
            }
        }
    }
    else
    {
        $em="unkwon error occurred!";
        header("Location: account.php?error=$em");
    }
}
else{
    header("Location:account.php");
}
?>