<?php


namespace App\classes;



class SingleImage extends Database
{
    private $image;
    private $link;
    private $result;
    private $con;
    private $hostName;
    private $userName;
    private $password;
    private $dbName;
    private $sql;
    private $imgUrl;
    private $imageName;
    private $directory;
    private $row;



    public function __construct($file=null)
    {
        $this->con=$this->connect();

        $this->file=$file;
    }
    public function getImageUrl()
    {
        $this->imageName= $this->file['image']['name'];
        $this->directory= 'assets/images/'.$this->imageName;
        move_uploaded_file($this->file['image']['tmp_name'], $this->directory);
        return $this->directory;
    }

    public function create()
    {

        if (empty($this->file['image']['name']))
        {
            $this->imgUrl='';
        }
        else
        {
            $this->imgUrl=$this->getImageUrl();
        }
        $this->sql="INSERT INTO images (image) VALUES ('$this->imgUrl')";
        $this->result=mysqli_query($this->con, $this->sql);

        if ($this->result)
        {
            session_start();
            $_SESSION['message']='Single image upload successful';
            header('Location:action.php?page=home');
        }
        else
        {
            die('Query Error..!'.mysqli_error());
        }
    }
}