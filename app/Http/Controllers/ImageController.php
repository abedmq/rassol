<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller {

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image',
        ]);
        $image          = $request->file('file');
        $upload_success = $image->store('temp');

        if ($upload_success)
        {
            return response()->json(['name' => $upload_success], 200);
        } // Else, return error 400
        else
        {
            return response()->json('error', 400);
        }
    }

    function get($id, $size = '')
    {
        $path  = storage_path('app/public/images/' . $id);
        $cache = storage_path('app/public/cache');
        if (!file_exists($cache))
            mkdir($cache, 0777);


        try
        {
            if (\request('type') == 'crop')
                $type = 'crop';
            elseif (request('type') == 'extend')
                $type = 'extend';
            else
                $type = 'compress';
            if ($size)
            {
                $tmp = $cache . '/' . Str::replaceFirst('x', '-', $size) . "-" . $type . '-' . $id;

                if (is_file($tmp))
                {
                    return Image::make($tmp)->response();
                }
                $img = Image::make($path);

                $sizes = explode('x', $size);
                if (sizeof($sizes) == 2)
                {
                    if ($sizes[0] == 'a')
                    {
                        $img->resize(null, $sizes[1], function ($constraint)
                        {
                            $constraint->aspectRatio();
                        });
                    }
                    else
                    {
                        if (\request('type') == 'crop')
                        {
                            $img->fit($sizes[0], $sizes[1]);
                        }
                        else
                        {
                            $img->resize($sizes[0], $sizes[1]);
                        }

                    }

                }
                elseif (request('type') == 'extend')
                {
                    $width  = $img->width();
                    $height = $img->height();


                    /*
                    *  canvas
                    */
                    $dimension = $sizes[0];

                    $vertical   = (($width < $height) ? true : false);
                    $horizontal = (($width > $height) ? true : false);
                    $square     = (($width = $height) ? true : false);

                    if ($vertical)
                    {
                        $top       = $bottom = 0;
                        $newHeight = ($dimension) - ($bottom + $top);
                        $img->resize(null, $newHeight, function ($constraint)
                        {
                            $constraint->aspectRatio();
                        });

                    }
                    else if ($horizontal)
                    {
                        $right    = $left =0;
                        $newWidth = ($dimension) - ($right + $left);
                        $img->resize($newWidth, null, function ($constraint)
                        {
                            $constraint->aspectRatio();
                        });
                    }
                    else if ($square)
                    {
                        $right    = $left = 0;
                        $newWidth = ($dimension) - ($left + $right);
                        $img->resize($newWidth, null, function ($constraint)
                        {
                            $constraint->aspectRatio();
                        });

                    }

                    $img->resizeCanvas($dimension, $dimension, 'center', false, request()->color?:'#ffffff');
                }
                else
                {

                    $img->resize($sizes[0], null, function ($constraint)
                    {
                        $constraint->aspectRatio();
                    });
                }
                $img->save($tmp);
            }
            else
            {
                $img = Image::make($path);

            }


            return $img->response();
        } catch (\Intervention\Image\Exception\NotReadableException $e)
        {
            $file     = File::get($path);
            $type     = File::mimeType($path);
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);
            return $response;
        }
    }

}