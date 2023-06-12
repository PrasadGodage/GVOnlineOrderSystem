<?php

$billno = 5211;

echo getbillno($billno);

function getbillno($billno)
{
    if($billno<=9)
{
    $billno="00000".$billno;
}
else if($billno<=99)
{
    $billno = "0000".$billno;
}else if($billno<=999)
{
    $billno = "000".$billno;
}else if($billno<=9999)
{
    $billno = "00".$billno;
}
else if($billno<=99999)
{
    $billno = "0".$billno;
}

    return $billno;
}



?>