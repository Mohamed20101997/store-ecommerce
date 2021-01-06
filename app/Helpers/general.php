
<?php

use Illuminate\Support\Facades\Storage;

define('PAGINATION_COUNT', 15);

function getFolder(){

    return  app()->getLocale() === 'ar' ? 'css-rtl' : 'css';

}

function uploadImage($folder,$image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
 }


function remove_previous($brand)
 {
    Storage::disk('brands')->delete($brand->photo);

 } //end of remove_previous function

function image_path($folder , $val)
 {
    return asset('assets/images/' . $folder .'/'. $val);

 } //end of remove_previous function
