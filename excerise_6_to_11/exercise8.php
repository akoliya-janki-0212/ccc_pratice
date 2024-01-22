<?php
function isprime($no)
{
    if($no<=0){
        return false;
    }
    for($i=2;$i<=($no/2);$i++)
    {
        if($no%$i==0)
        {
            return false;
        }
    }
       return true;
}

$no=3;
if(isprime($no)){
    echo $no.' is  prime<br>';
}
else{
    echo $no.' is not prime<br>';
}

?>