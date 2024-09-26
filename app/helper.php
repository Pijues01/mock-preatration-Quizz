<?php
function enc($num){
    // echo $num;
    if(is_numeric($num)){
        $p = str_split($num);
        // print_r($p);
        $s= '';
        foreach($p as $i){
            switch ($i) {
                case "1":
                    $s .= 'akb';
                    break;
                case "2":
                    $s .= 'xjz';
                    break;
                case "3":
                    $s .= 'jhm';
                    break;
                case "4":
                    $s .= 'bkc';
                    break;
                case "5":
                    $s .= 'xde';
                    break;
                case "6":
                    $s .= 'nhg';
                    break;
                case "0":
                    $s .= 'egr';
                    break;
                case "7":
                    $s .= 'mjy';
                    break;
                case "8":
                    $s .= 'wer';
                    break;
                case "9":
                    $s .= 'poi';
                    break;
            }
        }
        return $s;
    }else{
        $q = str_split($num,3);
        // print_r($q);
        $m= '';
        foreach($q as $j){
            switch ($j) {
                case "akb":
                    $m .= '1';
                    break;
                case "xjz":
                    $m .= '2';
                    break;
                case "jhm":
                    $m .= '3';
                    break;
                case "bkc":
                    $m .= '4';
                    break;
                case "xde":
                    $m .= '5';
                    break;
                case "nhg":
                    $m .= '6';
                    break;
                case "egr":
                    $m .= '0';
                    break;
                case "mjy":
                    $m .= '7';
                    break;
                case "wer":
                    $m .= '8';
                    break;
                case "poi":
                    $m .= '9';
                    break;
            }
        }
        return $m;
    }
}
// echo enc($num);
// $h = enc(987);
// echo $h;
