<?php
/* 
   Get all x,y coords of specified rgb color in an image and return an array.
   The default provided implementation is to find all pixels of pure white (255,255,255) color.
    
   4 arguments required for the function: path/to/image, and red, green, blue values
   of target pixel to search for. Function assumes $pic
   to be a .jpg type image. You will have to change the
   code if you are using a different image type, or else 
   setup some conditions to determine which image type
   $pic is, and use the proper GD functions for it.
   $r, $g, $b each takes a 0-255 dec format value.  
*/	 
function getCoords ($pic, $r, $g, $b) {
   // put rgb args into array for comparison in loop   
   $argrgb = array('red' => $r, 'green' => $g, 'blue' => $b);

   // create image resource of picture 
   $image = imagecreatefromjpeg($pic);

   // get width and height of image
   list($width, $height) = getimagesize($pic);

   // loop through each column
   for ($y = 0; $y <= $height; $y++) {
      // loop through each pixel of the current row
      for ($x = 0; $x <= $width; $x++) {
         // get index of color at specific x,y coord
         $color_index = imagecolorat($image, $x, $y);
         // returns pixel color as array of red,green,blue,alpha
         $rgb = imagecolorsforindex($image, $color_index);		  
         // pop the alpha value off the end of the array
         array_pop($rgb); 
         // compare pixel arrays. if they are the same, empty array is returned
         $result = array_diff($rgb, $argrgb);
         // if empty array is returned...         
         if (empty($result))
            // add the coordinate to our list
            $dotCoords[] = array('x' => $x, 'y' => $y);
      } // end $x
   } // end $y
   // return list of coords
   return $dotCoords;
} // end getCoords

/*** example ***/
// target picture
$pic = "somepic.jpg";

// get all coords of pure white pixels
$whiteCoords = getCoords($pic, 255, 255, 255);
// output results
echo "<pre>"; print_r($whiteCoords); echo "</pre>";	 
?>
