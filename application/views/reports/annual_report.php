<!DOCTYPE html>
<html>
<head>
    <title>Annual Report</title>
    <link rel="stylesheet" href="<?php echo $this->config->item('asset_base')?><?php echo $css?>/print.css">
</head>
<body>
<hr>
<p class="bbt_header">
    <?php echo "<img style='padding_bottom:25px;' src=".$this->config->item('asset_base')."images/header.png>";?>
    <br/>2601 Watson Blvd.<br/>
    Warner Robins, GA 31093
</p>
<hr>
<?php
    echo "<p class="."bbt_text".">".date("m/d/Y")."<br/>";
    echo "Subject: ".$year." Annual Contributions Record"."<br/><br/>";
    echo "Dear ".$name.","."</br></br>";
    echo "Our records indicate that you gave offerings totaling $".$contribution_total." to Bible Baptist Temple in ".$year.".<br/>";
    echo "Your contributions were recorded as follows (".$num_contributions." detail records):";
    echo "</p>";
    echo "<p class="."bbt_text".">"."Envelope Number ".$env_no;
?>
<hr>
<div style="ppadding-bottom:50px;">
    <?php
    $printHeader = 1;
    $q1printed = false;
    $q2printed = false;
    $q3printed = false;
    $q4printed = false;
    echo "<table>";
    echo "<tr><td valign='top'>";
    foreach ($contributions as $contribution_item)
    {
        $timestamp = strtotime($contribution_item['giftdate']);

        switch (true){
            case in_array(date('n', $timestamp), range(1,3)):
                if($q1printed == false)
                {
                    echo "<table>";
                    echo "<tr><td  colspan=2><b>Quarter ".$printHeader."-".$year."</b></td></tr>";
                    $q1printed = true;
                    $printHeader++;
                    echo "<tr>";
                    echo "<td>";
                    echo $contribution_item['giftdate']; 
                    echo "</td>";
                    echo "<td>";
                    echo "$".$contribution_item['deductable'];
                    echo "</td>";
                    echo "</tr>";
                }
                else
                {
                    echo "<tr>";
                    echo "<td>";
                    echo $contribution_item['giftdate']; 
                    echo "</td>";
                    echo "<td>";
                    echo "$".$contribution_item['deductable'];
                    echo "</td>";
                    echo "</tr>";
                }
                break;
            case in_array(date('n', $timestamp), range(4,6)):
                if($q2printed == false)
                {
                    echo "</table>";
                    echo "</td><td  valign='top'>";
                    echo "<table>";
                    echo "<tr><td  colspan=2><b>Quarter ".$printHeader."-".$year."</b></td></tr>";
                    $q2printed = true;
                    $printHeader++;
                    echo "<tr>";
                    echo "<td>";
                    echo $contribution_item['giftdate']; 
                    echo "</td>";
                    echo "<td>";
                    echo "$".$contribution_item['deductable'];
                    echo "</td>";
                    echo "</tr>";
                }
                else
                {
                    echo "<tr>";
                    echo "<td>";
                    echo $contribution_item['giftdate']; 
                    echo "</td>";
                    echo "<td>";
                    echo "$".$contribution_item['deductable'];
                    echo "</td>";
                    echo "</tr>";
                }
                break;
            case in_array(date('n', $timestamp), range(7,9)):
            if($q3printed == false)
            {
                echo "</table>";
                echo "</td><td  valign='top'>";
                echo "<table>";
                echo "<tr><td  colspan=2><b>Quarter ".$printHeader."-".$year."</b></td></tr>";
                $q3printed = true;
                $printHeader++;
                echo "<tr>";
                echo "<td>";
                echo $contribution_item['giftdate']; 
                echo "</td>";
                echo "<td>";
                echo "$".$contribution_item['deductable'];
                echo "</td>";
                echo "</tr>";
            }
            else
            {
                echo "<tr>";
                echo "<td>";
                echo $contribution_item['giftdate']; 
                echo "</td>";
                echo "<td>";
                echo "$".$contribution_item['deductable'];
                echo "</td>";
                echo "</tr>";
            }
                break;
            case in_array(date('n', $timestamp), range(10,12)):
            if($q4printed == false)
            {
                echo "</table>";
                echo "</td><td  valign='top'>";
                echo "<table>";
                echo "<tr><td  colspan=2><b>Quarter ".$printHeader."-".$year."</b></td></tr>";
                $q4printed = true;
                $printHeader++;
                echo "<tr>";
                echo "<td>";
                echo $contribution_item['giftdate']; 
                echo "</td>";
                echo "<td>";
                echo "$".$contribution_item['deductable'];
                echo "</td>";
                echo "</tr>";
            }
            else
            {
                echo "<tr>";
                echo "<td>";
                echo $contribution_item['giftdate']; 
                echo "</td>";
                echo "<td>";
                echo "$".$contribution_item['deductable'];
                echo "</td>";
                echo "</tr>";
            }
                break;

        }
    }
    echo "</table>";
    echo "</td></tr>";
    echo "</table>";
    ?>
    </div>
    <div style="padding-top:120px; text-align:left;">
    <p class="bbt_text">None of your giving was done to receive anything in return except what the government considers an "intangible religious benefit."</p>
    <p class="bbt_text">Please retain this letter for your records if you intend to claim this contribution as a deduction on Schedule A of your Federal Income Tax Return.</p>
    <p style="padding-bottom:35px;" class="bbt_text">Thank you for your offerings in support of the ministries of Bible Baptist Temple.</p>
    <?php echo "<img style='padding-left:25px' src=".$this->config->item('asset_base')."images/sig_combined.png />";?>
    </div>
</body>
</html> 