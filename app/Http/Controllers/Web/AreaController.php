<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::transform(Area::all());
        dd(makeTreeReference($areas, 'id', 'pid', 'children'));
    }
}
