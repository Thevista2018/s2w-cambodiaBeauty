
Firstname : <?=$firstname?><br />
Lastname : <?=$lastname?><br />
Company : <?=$company?><br />
Job : <?=$job?><br />

Email : <?=$email?><br />
Address : <?=$address1?> <?=$address2?><br />
City : <?=$city?><br />
State : <?=$state?><br />
Zip : <?=$zip?><br />
Country : <?=$country?><br />
Tel : <?=$tel?><br /><br />

<hr />We are interested in anticipated taking a stand <span style="color:red"><?=$choice2_info;?></span> sq.m.<hr />
<?php 
    foreach ($choice2 as $c2) { 
        if ($c2 == 1) echo 'Raw Space (Min 18sq.m)<br />';
        if ($c2 == 2) echo 'Standard Booth<br />'; 
    }
?>
<br />

<hr />Expected Total (sq.m)<hr />
<?=$expected;?>
<br />