<?php

require_once 'vendor/autoload.php';
use App\classes\SingleImage;
use App\classes\MultipleImage;

if (isset($_GET['page']))
{
    if ($_GET['page']=='home')
    {
        include 'pages/home.php';
    }
    if ($_GET['page']=='multiple-image')
    {
        include 'pages/multiple-image.php';
    }

}
elseif (isset($_POST['btn']))
{
    if ($_POST['btn']=='Upload Image')
    {
        $singleImage = new SingleImage($_FILES);
        $singleImage->create();
    }
    elseif ($_POST['btn']=='Multiple Image upload')
    {

        $multipleImage= new MultipleImage($_FILES);
        $multipleImage->add();
    }
}