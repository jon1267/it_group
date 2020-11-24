<?php
namespace App\Services\FilmPoster;

use Illuminate\Support\Str;
use Image;

class FilmPoster
{
    public function getPoster($request)
    {
        $imgPath = 'default_poster.jpg';

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            if ($image->isValid()) {
                $ext = $image->getClientOriginalExtension(); // ? strtolower()
                $filename = time() . '-' . Str::random(8) . '.' . $ext;
                //dd($image, $filename, $ext);

                $img = Image::make($image);
                //$img->fit(600,200)->save(public_path().'/'.'img/'.$filename);//резать очень индивидуально
                $img->save(public_path() . '/' . 'img/' . $filename);

                $imgPath = $filename;

            }
        }

        return $imgPath;
    }
}
