<?php

function generateTree($items)
{
    $temp = [];
    foreach ($items as $v) {
        $temp[$v['id']] = $v;
    }

    $tree = [];
    foreach ($temp as $item) {
        if (isset($temp[$item['pid']])) {
            $temp[$item['pid']]['list'][] = &$temp[$item['id']];
        } else {
            $tree[] = &$temp[$item['id']];
        }
    }

	return $tree;
}

$item = [
    [
        'id' => 1,
        'pid' => 0,
    ],
    [
        'id' => 2,
        'pid' => 0,
    ],
    [
        'id' => 3,
        'pid' => 1,
    ],
    [
        'id' => 4,
        'pid' => 3,
    ],
    [
        'id' => 5,
        'pid' => 2,
    ]
];

echo json_encode(generateTree($item));