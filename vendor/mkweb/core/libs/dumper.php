<?php

function dumper($obj)
{
    echo '<pre>';
    echo htmlspecialchars(dumperGet($obj));
    echo '</pre>';
}

function dumperGet($obj, $leftspc = '')
{
    if (is_array($obj)) {
        $type = 'Массив[' . count($obj) . ']';
    } elseif (is_object($obj)) {
        $type = 'Объект';
    } elseif (gettype($obj) === 'boolean') {
        return $obj ? 'true' : 'false';
    } else {
        return "$obj";
    }

    $buf = $type;

    $leftspc .= '    ';

    foreach ($obj as $k => $v) {
        if ($k === 'GLOBALS') {
            continue;
        }

        $buf .= "\n$leftspc$k=> " . dumperGet($v, $leftspc);
    }

    return $buf;
}
