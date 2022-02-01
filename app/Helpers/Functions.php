<?php

function arrayToSelectOption(array $a, string $id = "", string $class = "", string $attr = "", $value = "", string $ph = "")
{
    $c=$class!=''?"class='$class'":'';
    $data= "<select id='$id' name='$id' $c $attr>";
    if($ph!=""){
        $data.= "<option value=''>--Select $ph--</option><br>";
    }
    foreach ($a as $x => $val) {
        $v = ($x == $value) ? "selected" : "";
        $data.= "<option value='$x' $v>$val</option>";
    }
    $data.= "</select>";
    return $data;
}
