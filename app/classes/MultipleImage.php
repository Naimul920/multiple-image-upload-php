<?php


namespace App\classes;


class MultipleImage extends Database
{
    private $imageName;
    private $directory;
    private $imgURLOne;
    private $imgURLTwo;
    private $sql;
    private $con;
    private $result;
    private $file;

    public function __construct($file=null)
    {
        $this->con=$this->connect();
        $this->file=$file;
    }

    public function getImageURLOne()
    {
        $this->imageName=$this->file['image_one']['name'];
//        $this->directory='assets/img-one/'.$this->imageName;
        $this->directory= 'assets/images/'.$this->imageName;
        move_uploaded_file($this->file['image_one']['tmp_name'], $this->directory);
        return $this->directory;

    }
    public function getImageURLTwo()
    {
        $this->imageName=$this->file['image_two']['name'];
//        $this->directory='assets/img-two/'.$this->imageName;
        $this->directory= 'assets/images/'.$this->imageName;
        move_uploaded_file($this->file['image_two']['tmp_name'], $this->directory);
        return $this->directory;

    }

    public function add()
    {
        $this->imgURLOne=$this->getImageURLOne();
        $this->imgURLTwo = $this->getImageURLTwo();

        $this->sql="INSERT INTO multiple_images (image_one, image_two) VALUES ('$this->imgURLOne', '$this->imgURLTwo')";
        $this->result=mysqli_query($this->con, $this->sql);
        session_start();
        $_SESSION['message']='Single image upload successful';
        header('Location:action.php?page=multiple-image');
//        echo '<pre>';
//        print_r($this->imageOne['image_one']['name']);
//        exit();
//        if (empty($this->imageOne['image_one']['name']) && empty($this->imageTwo['image_two']['name']))
//        {
//            echo 'blank';
//        }
//        else
//        {
//            echo 'full';
//        }

    }
}