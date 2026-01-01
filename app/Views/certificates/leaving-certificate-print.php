<?php

function numberTowords_1($num) {
    $ones = array(
        1 => "First",
        2 => "Second",
        3 => "Third",
        4 => "Fourth",
        5 => "Fifth",
        6 => "Sixth",
        7 => "Seventh",
        8 => "Eightth",
        9 => "Nineth",
        10 => "Tenth",
        11 => "Eleventh",
        12 => "Twelveth",
        13 => "Thirteenth",
        14 => "Fourteenth",
        15 => "Fifteenth",
        16 => "Sixteenth",
        17 => "Seventeenth",
        18 => "Eighteenth",
        19 => "Nineteenth",
        "014" => "Fourteen"
    );
    $tens = array(
        0 => "Zero",
        1 => "Ten",
        2 => "Twenty",
        3 => "Thirty",
        4 => "Forty",
        5 => "Fifty",
        6 => "Sixty",
        7 => "Seventy",
        8 => "Eighty",
        9 => "Ninety"
    );
    $hundreds = array(
        "Hundred",
        "Thousand",
        "Million",
        "Billion",
        "Trillion",
        "Quardrillion"
    ); /* limit t quadrillion */
    $num = number_format($num, 2, ".", ",");
    $num_arr = explode(".", $num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",", $wholenum));
    krsort($whole_arr, 1);
    $rettxt = "";
    foreach ($whole_arr as $key => $i) {

        while (substr($i, 0, 1) == "0")
            $i = substr($i, 1, 5);
        if ($i < 20) {
            /* echo "getting:".$i; */
            $rettxt .= $ones[$i];
        } elseif ($i < 100) {
            if (substr($i, 0, 1) != "0")
                $rettxt .= $tens[substr($i, 0, 1)];
            if (substr($i, 1, 1) != "0")
                $rettxt .= " " . $ones[substr($i, 1, 1)];
        } else {
            if (substr($i, 0, 1) != "0")
                $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
            if (substr($i, 1, 1) != "0")
                $rettxt .= " " . $tens[substr($i, 1, 1)];
            if (substr($i, 2, 1) != "0")
                $rettxt .= " " . $ones[substr($i, 2, 1)];
        }
        if ($key > 0) {
            $rettxt .= " " . $hundreds[$key] . " ";
        }
    }
    if ($decnum > 0) {
        $rettxt .= " and ";
        if ($decnum < 20) {
            $rettxt .= $ones[$decnum];
        } elseif ($decnum < 100) {
            $rettxt .= $tens[substr($decnum, 0, 1)];
            $rettxt .= " " . $ones[substr($decnum, 1, 1)];
        }
    }
    return $rettxt;
}

function numberTowords($num) {

    $ones = array(
        0 => "Zero",
        1 => "One",
        2 => "Two",
        3 => "Three",
        4 => "Four",
        5 => "Five",
        6 => "Six",
        7 => "Seven",
        8 => "Eight",
        9 => "Nine",
        10 => "Ten",
        11 => "Eleven",
        12 => "Twelve",
        13 => "Thirteen",
        14 => "Fourteen",
        15 => "Fifteen",
        16 => "Sixteen",
        17 => "Seventeen",
        18 => "Eighteen",
        19 => "Nineteen",
        "014" => "Fourteen"
    );
    $tens = array(
        0 => "Zero",
        1 => "Ten",
        2 => "Twenty",
        3 => "Thirty",
        4 => "Forty",
        5 => "Fifty",
        6 => "Sixty",
        7 => "Seventy",
        8 => "Eighty",
        9 => "Ninety"
    );
    $hundreds = array(
        "Hundred",
        "Thousand",
        "Million",
        "Billion",
        "Trillion",
        "Quardrillion"
    ); /* limit t quadrillion */
    $num = number_format($num, 2, ".", ",");
    $num_arr = explode(".", $num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",", $wholenum));
    krsort($whole_arr, 1);
    $rettxt = "";
    foreach ($whole_arr as $key => $i) {

        while (substr($i, 0, 1) == "0")
            $i = substr($i, 1, 5);
        if ($i < 20) {
            /* echo "getting:".$i; */
            $rettxt .= $ones[$i];
        } elseif ($i < 100) {
            if (substr($i, 0, 1) != "0")
                $rettxt .= $tens[substr($i, 0, 1)];
            if (substr($i, 1, 1) != "0")
                $rettxt .= " " . $ones[substr($i, 1, 1)];
        } else {
            if (substr($i, 0, 1) != "0")
                $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
            if (substr($i, 1, 1) != "0")
                $rettxt .= " " . $tens[substr($i, 1, 1)];
            if (substr($i, 2, 1) != "0")
                $rettxt .= " " . $ones[substr($i, 2, 1)];
        }
        if ($key > 0) {
            $rettxt .= " " . $hundreds[$key] . " ";
        }
    }
    if ($decnum > 0) {
        $rettxt .= " and ";
        if ($decnum < 20) {
            $rettxt .= $ones[$decnum];
        } elseif ($decnum < 100) {
            $rettxt .= $tens[substr($decnum, 0, 1)];
            $rettxt .= " " . $ones[substr($decnum, 1, 1)];
        }
    }
    return $rettxt;
}

if (!empty($yearwise_data[0]['dob'])) {
    $birth_date = $yearwise_data[0]['dob'];
    $new_birth_date = explode('-', $birth_date);
    $year = $new_birth_date[0];
    $month = $new_birth_date[1];
    $day = $new_birth_date[2];
    $birth_day = numberTowords_1($day);
    $birth_year = numberTowords($year);
    $monthNum = $month;
    $dateObj = DateTime::createFromFormat('!m', $monthNum); //Convert the number into month name
    $monthName = ucwords($dateObj->format('F'));
// echo "<p align='center' style='color:blue'>$birth_day $monthName $birth_year</p>";
}
//        $up_dt =$this->db->select('*')->get_where('registration',array('registration_id'=>$yearwise_data[0]['registration_id']))->result_array();
//        $s = explode(" ",$up_dt[0]['up_dt']);
//        $t=array_slice($s, 0,1);
//        $e = implode(" ",$t);
//        $f = date("d/m/Y", strtotime($e));
//        // die($f);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="<?php //echo base_url();     ?>assets/external/bootstrap.min.css">-->
    <!--<script src="<?php echo base_url(); ?>assets/external/jquery.min.js"></script>-->
    <!--<script src="<?php echo base_url(); ?>assets/external/bootstrap.min.js"></script>-->

        <style>

            @page{
                margin-top: 10px;
                margin-left: 70px;
                margin-right: 40px;
                margin-bottom: 10px;
            }

            body
            {
                /*font-family: times;    */
                /*font-family: courier;    */
                font-family: garuda;

                /*font-family: freeserif;*/
                /*font-size: 10pt;*/
                line-height: 1.5;

            }

            div{
                margin-left: 30px;
                width: 100%;
            }
            .top{

            }
            .bottom{
                border-bottom: 1px dashed black;
                width: 100%;
            }
            div.mycontainer {
                width:100%;
                overflow:auto;
                margin: auto;
            }
            div.mycontainer div {
                width:30%;
                float:left;

            }

            table
            {
                width:  100%;
                /*border: 1px solid black;*/
                border-collapse: collapse;
            }



            table#header td,th
            {
                text-align: center;
                padding: 3px;
            }

            table#data td
            {
                padding: 5px;
            }

            table#exam td
            {
                padding: 10px 30px;
                text-align: center;
            }


        </style>
    </head>
    <body>
        <div style="position: absolute; left: 500px; top: 150px;">
            <?php
            if ($lc_data['is_duplicate'] == 1 && $lc_data['is_cancelled'] == 0) {
                ?>
                <img src="<?php echo base_url('assets/images/duplicate.jpg'); ?>" style="width:150px; height:40px;opacity:0.5">
                <?php
            }
            ?>
        </div>

        <div style="position: absolute; left: 150px; top: 300px;">
            <?php
            if ($lc_data['is_cancelled'] == 1) {
                ?>
                <img src="<?php echo base_url('assets/images/cancelled.png'); ?>" style="width:400px; height:240px;opacity:0.4">
                <?php
            }
            ?>
        </div>
        <table id="header">
            <tr>
                <td rowspan="1"><img src="assets/images/kbp_logo.png" style="width:70px; height:70px;"></td>
                <td style="text-align: center;"><h5>Rayat Shikshan Sanstha's<br><span style="font-family: times;font-size: 14pt;">Karmaveer Bhaurao Patil College of Engineering, Satara</span><br>Sadar Bazar, Camp Satara - 415001</h5></td>
            </tr>
    <!--    <tr>
                    <th style="font-family: times;"><h3>Karmaveer Bhaurao Patil College of Engineering, Satara</h3></th>
            </tr>
            <tr>
                    <td><h5>Sadar Bazar, Camp Satara - 415001</h5></td>
            </tr>-->
        </table>

        <hr style="color:#000; background-color:#000; margin-top:1%;height:2px">

        <p style="text-align: center; font-size: 9pt; margin-top:-1%;">"Approved by AICTE - New Delhi *Recognized by Govt. of Maharashtra & DTE* <br>Affiliated to Dr. Babasaheb Ambedkar Technological University, Lonere."</p>

        <hr style="color:#000; background-color:#000; margin-top:-1%;height:2px">

        <p style="text-align: center; font-size: 12pt; font-family: times;margin-top:0%;margin-bottom:0%; font-weight: bold;">TRANSFERENCE CERTIFICATE</p>

        <p style="text-align: center; font-size: 9pt;">(No change in any entry in this certificate shall be made expect by the authority issuing it, and any infringement of this requirement is liable to attract penalty or legal action involve the imposition of penalty such as that of rustication)</p>

        <table>
            <tr>
                <td>Rise No.:<?php echo $yearwise_data['student_rise_no']; ?></td>
                <td>Gen. Reg No.:<?php echo $yearwise_data['student_general_register_no']; ?></td>
                <td style="text-align: right;">LC No.: <?php echo esc($lc_data['leaving_certificate_no'] ?? ''); ?></td>
            </tr>
        </table>

        a)
        <table id="data" border="1">
            <tr>
                <td rowspan="2" style="vertical-align: top;">1)</td>
                <td rowspan="1" style="vertical-align: top;">Name in Full (Beginnig with Surname)</td>
                <td style="font-weight: bold;"><b><?php echo esc($yearwise_data['student_last_name'] . " " . $yearwise_data['student_first_name'] . " " . $yearwise_data['student_middle_name']); ?></b></td>
            </tr>
            <tr>
                <td rowspan="1" style="vertical-align: top;">Mother's Name</td>
                <td>SUNITA<?php //echo mb_convert_case($student_details[0]['mother_name'],MB_CASE_TITLE,"UTF-8");      ?></td>
            </tr>
            <tr>
                <td>2)</td>
                <td>Religion and Caste</td>
                <td>Hindu Maratha<?php //echo mb_convert_case($religion[0]['religion'],MB_CASE_TITLE,"UTF-8");      ?>&emsp;&emsp;<?php //echo mb_convert_case($caste[0]['caste_name'],MB_CASE_TITLE,"UTF-8");      ?></td>
            </tr>
            <tr>
                <td>3)</td>
                <td>Nationality</td>
                <td>Indian<?php //echo mb_convert_case($student_details[0]['nationality'],MB_CASE_TITLE,"UTF-8");      ?></td>
            </tr>
            <tr>
                <td>4)</td>
                <td>Date of Birth (Both in figures & words)</td>
                <td>15/10/2002<?php //echo date('d/m/Y',strtotime($yearwise_data[0]['dob']));      ?><br>Fifteenth October Two Thousand Two<?php //echo $birth_day." ".$monthName." ".$birth_year;     ?></td>
            </tr>
            <tr>
                <td>5)</td>
                <td>Place of Birth</td>
                <td>Satara<?php //echo mb_convert_case($student_details[0]['place_of_birth'],MB_CASE_TITLE,"UTF-8");      ?></td>
            </tr>
            <tr>
                <td>6)</td>
                <td>Previous Qualification</td>
                <td>HSC<?php //echo $student_details[0]['pre_qualification'];      ?></td>
            </tr>
            <tr>
                <td>7)</td>
                <td>Date of Admission</td>
                <td>01/06/2021<?php //echo date('d/m/Y',strtotime($lc[0]['date_of_admission']));      ?></td>
            </tr>
            <tr>
                <td>8)</td>
                <td>Date of Leaving</td>
                <td>30/06/2025<?php //echo date('d/m/Y',strtotime($lc[0]['date_of_leaving']));      ?></td>
            </tr>
        </table>

        <p style="margin-top:1%; text-indent: -18px;">b) <?php //echo ($yearwise_data[0]['gender']=='Male')?"He":"She";      ?> Appeared for the following examination in this college, since <?php //echo ($yearwise_data[0]['gender']=='Male')?"his":"her";      ?> last University Board examination, with the result shown against them-</p>

        <table id="exam" border="1">
            <tr>
                <th>Examination</th>
                <th>Year</th>
                <th>Result-Passed or Failed (Mention Class in case of Pass and Exemptions with subjects if any, in case of Failure)</th>
            </tr>
            <tr>
                <td><?php echo esc($lc_data['examination'] ?? ''); ?></td>
                <td><?php echo esc($lc_data['exam_period'] ?? ''); ?></td>
                <td>First Class<?php //echo $lc[0]['status'];      ?></td>
            </tr>
        </table>

        <p >c) <?php //echo ($yearwise_data[0]['gender']=='Male')?"He":"She";      ?> Bears a good moral character.&nbsp;&nbsp;<?php //echo (count($duplicate_lc) > 1) ? "This Certificate is issued for Migration.": "";     ?></p>
        <p style="text-indent: -18px;">d) <?php //echo ($yearwise_data[0]['gender']=='Male')?"His":"Her";      ?> Voluntary subject or Group of subjects in which <?php //echo ($yearwise_data[0]['gender']=='Male')?"he":"she";      ?> attended the course of instructions in this college was <?php //echo $course[0]['course_name'];      ?>.</p>
        <br>

        <table>
            <tr>
                <td style="width: 60%;">Place: Satara</td>
                <th style="text-align: center;">Principal,<br>Karmaveer Bhaurao Patil <br>College of Engineering, Satara.</th>
            </tr>
        </table>

        <?php
        if ($lc_data['is_duplicate'] == 0) {
            ?>

            <p style="margin-top:-1%">
                Date:
                <?=
                !empty($lc_data['added_at']) ? date('d/m/Y', strtotime($lc_data['added_at'])) : ''
                ?>
            </p>
            <br>

            <?php
        } elseif ($lc_data['is_duplicate'] == 1) {
            ?>
            <p>Date: <?php echo date('d/m/Y', strtotime($lc_data['added_at'])); ?></p>
            <p><?=
                !empty($previous_lc_date[0]['added_at']) ? 'TC. No. 2: Date: ' . date('d/m/Y', strtotime($previous_lc_date[0]['added_at'])) : ''
                ?></p> 


        <?php } ?>    
        <p>Forwarded with Compliments to The Principal</p>
        <p><b>-------------------------------------------- College ------------------------------------------------</b></p>
    </body>
</html>
