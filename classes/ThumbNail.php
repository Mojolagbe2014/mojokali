<?php
//require 'Imaging.php';
/**
 * Description of Thumbnail
 *
 * @author Kaiste
 */
class ThumbNail extends Imaging{
    private $image; 
    private $width; 
    private $height; 
    
    public function Thumbnail($image,$width,$height) { 
        parent::setImage($image); 
        parent::setQuality(80); 
        parent::setSize($width,$height); 
        $this->thumbnail= pathinfo($image, PATHINFO_DIRNAME)."/thumb/".pathinfo($image, PATHINFO_FILENAME)."_tn.".pathinfo($image, PATHINFO_EXTENSION); 
        
        if(!file_exists($this->thumbnail)){
            parent::saveImg($this->thumbnail); 
            parent::clearCache(); 
        }
    } 
    
    function __toString() { 
        return $this->thumbnail; 
    } 
}
