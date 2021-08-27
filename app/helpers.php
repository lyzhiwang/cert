<?php

function makeTreeReference($list, $pk = 'id', $parentId = 'pid', $child = 'children')
{
    $refer = [];
    $tree = [];
    foreach ($list as $k => $v) {
        $refer[$v[$pk]] = &$list[$k];  //创建主键的数组引用
    }

    foreach ($list as $k => $v) {
        $pid = $v[$parentId];   //获取当前分类的父级id
        if ($pid == 0) {
            $tree[] = &$list[$k];   //顶级栏目
        } else {
            if (isset($refer[$pid])) {
                $refer[$pid][$child][] = &$list[$k];  //如果存在父级栏目，则添加进父级栏目的子栏目数组中
            }
        }
    }

    return $tree;
}
