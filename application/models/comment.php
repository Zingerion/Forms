<?php

namespace fb\classes;

class comment extends base
{
    public $name, $email, $text, $file;

    public function __construct($name, $email, $text, $file = null)
    {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
        $this->file = $file;
    }

    public function saveToDB()
    {
        $values = "'" . $this->name . "' , '" . $this->email . "' , '" . $this->text . "' , '" . $this->file . "'";
        parent::insert('comment (name, email, text, Img)', $values);
    }

    public function image_resize($sourse,$new_image,$width,$height)
    {
        $size = GetImageSize($sourse);
        $new_height = $height;
        $new_width = $width;

        if ($size[0] < $size[1])
        $new_width=($size[0]/$size[1])*$height;
        else
        $new_height=($size[1]/$size[0])*$width;
        $new_width=($new_width > $width)?$width:$new_width;
        $new_height=($new_height > $height)?$height:$new_height;
        $image_p = @imagecreatetruecolor($new_width, $new_height);
        if ($size[2]==2)
        {
            $image_cr = imagecreatefromjpeg($sourse);
        }
          else if ($size[2]==3)
          {
           $image_cr = imagecreatefrompng($sourse);
          }
          else if ($size[2]==1)
          {
           $image_cr = imagecreatefromgif($sourse);
          }
          imagecopyresampled($image_p, $image_cr, 0, 0, 0, 0, $new_width, $new_height, $size[0], $size[1]);
          if ($size[2]==2)
          {
           imagejpeg($image_p, $new_image, 75);
          }
          else if ($size[2]==1)
          {
           imagegif($image_p, $new_image);
          }
          else if ($size[2]==3)
          {
           imagepng($image_p, $new_image);
          }
    }
}
