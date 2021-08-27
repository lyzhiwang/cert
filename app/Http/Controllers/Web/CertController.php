<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class CertController extends Controller
{
    public function index()
    {
//        $areas = Area::transform(Area::all());
//        $areas = makeTreeReference($areas, 'id', 'pid', 'children');
//        return view('cert.index3', compact('areas'));
        return view('cert.index2');
    }

    public function test()
    {
        return view('cert.test');
    }

    public function create(Request $request)
    {
        $dataUrl = $request->data_url;
        Image::configure(array('driver' => 'imagick'));
        $img = Image::make(public_path() . '/images/cert_bg.jpg');
        $img->insert($dataUrl, 'center');
        return $img->response("jpg");
    }
}
