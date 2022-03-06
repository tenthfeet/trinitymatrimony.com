<?php

function selectOptionFromArray(array $a, string $id = "", string $class = "", string $attr = "", $value = "", string $ph = "")
{
    $c = $class != '' ? "class='$class'" : '';
    $data = "<select id='$id' name='$id' $c $attr>";
    if ($ph != "") {
        $data .= "<option value=''>--Select $ph--</option><br>";
    }
    foreach ($a as $x => $val) {
        $v = ($x == $value) ? "selected" : "";
        $data .= "<option value='$x' $v>$val</option>";
    }
    $data .= "</select>";
    return $data;
}

function optionsFromArray(array $a, string $key, $value = "", string $ph = "")
{
    $data = '';
    // $c = $class != '' ? "class='$class'" : '';
    // $data = "<select id='$id' name='$id' $c $attr>";
    if ($ph != "") {
        $data .= "<option value=''>--Select $ph--</option><br>";
    }
    foreach ($a[$key] as $x => $val) {
        $v = ($x == $value) ? "selected" : "";
        $data .= "<option value='$x' $v>$val</option>";
    }
    // $data .= "</select>";
    return $data;
}

function age(string $dob)
{
    $birthDate = $dob;
    $today = date('Y-m-d');
    $dateA = new DateTime($today);
    $dateB = new DateTime($birthDate);
    $dateDiff = $dateA->diff($dateB);
    $age = "{$dateDiff->y} Years {$dateDiff->m} Months {$dateDiff->d} Days";
    return $age;
}

function profileCards($data)
{
    $p ='';
    foreach ($data as $item) {
        $p .='<div class="col-lg-6 subject-card  mt-4">';
        $p .= '<div class="subject-card-header p-4">';
        $p .= '<a href="' . url("viewprofile/" . $item->uid) . '" class="card_title p-lg-4d-block">';
        $p .= '<div class="row align-items-center">';
        $p .= '<div class="col-sm-5 subject-img text-center">';
        $p .= '<img src="' . asset($item->photo) . '" class="img-fluid" alt="" style="height: 150px;">';
        $p .= '</div>';
        $p .= '<div class="col-sm-7 subject-content mt-sm-0 mt-4">';
        $p .= '<div class="dst-btm">';
        $p .= '<h6 class="">PROFILE ID </h6>';
        $p .= '<span>' . $item->pid . '</span>';
        $p .= '</div>';
        $p .= '<p>';
        $p.=($item->dob != '1970-01-01')?age($item->dob):"Age not yet Provided";
        $p.=($item->height)?",".$item->height."cm":"";
        $p .= '</p>';
        $p .= '<p class="sub-para">' . htmlspecialchars($item->occupation, ENT_QUOTES) . '</p>';
        $p .= '<p class="sub-para">';
        $p.=(($item->district != null)&&($item->district != "Others"))?$item->district:"";
        $p.=(($item->state != null)&&($item->state != "Others"))?",".$item->state.", ":"";
        $p.='India</p>';
        $p .= '</div>';
        $p .= '</div>';
        $p .= '</a>';
        $p .= '</div>';
        $p .='</div>';
    }

    return $p;
}
