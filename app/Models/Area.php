<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['id', 'name', 'pid'];

    public $timestamps = false;

    public static function transform($areas)
    {
        $data = [];
        foreach ($areas as $area) {
            $data[] = self::transformItem($area);
        }
        return $data;
    }

    public static function transformItem($area)
    {
        $data['name'] = $area->name;
        $data['id'] = $area->id;
        $data['pid'] = $area->pid;
        $data['value'] = $area->name;
        $data['label'] = $area->name;
        // 判断是否为最后一级
        if (substr($data['id'], 4) != 00 && $data['id'] != 0) {
            if (mb_substr($data['name'], -1) == '区') {
                $data['status'] = true;
            }
        }

        return $data;
    }
}
