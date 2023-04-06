<?php
function mod7_check($mod7_key, $mod7_lenght)
{
    $sum = 0;
    for ($i = 0; $i < $mod7_lenght; $i++) {
        $sum = $sum + substr($mod7_key, $i, 1);
    }

    $valid = $sum % 7;
    if ($valid == 0) {
        return true;
    } else {
        return false;
    }
}

function retail_key($key)
{
    $const = substr($key, 0, 3);
    if (
        $const == 333 ||
        $const == 444 ||
        $const == 555 ||
        $const == 666 ||
        $const == 777 ||
        $const == 888 ||
        $const == 999
    ) {
        return false;
    } else {
        $mod7_key = substr($key, 4, 11);
        $mod7_lenght = strlen($mod7_key);
        if (mod7_check($mod7_key, $mod7_lenght)) {
            return true;
        } else {
            return false;
        };
    }
}

function oem_key($key)
{
    $const1 = substr($key, 0, 3);
    $const2 = substr($key, 3, 2);
    $oem_check = substr($key, 6, 3);
    $mod7_key = substr($key, 10, 7);

    if ($oem_check == "OEM") {
        if ($const1 >= 001 && $const1 <= 366) {
            if (($const2 >= 95 && $const2 <= 99) || ($const2 >= 00 && $const2 <= 02)) {
                $mod7_lenght = strlen($mod7_key);
                if (mod7_check($mod7_key, $mod7_lenght)) {
                    return true;
                } else {
                    return false;
                };
            } else {
                return false;
            };
        } else {
            return false;
        };
    } else {
        return false;
    };
}
