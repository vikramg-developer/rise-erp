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
        8 => "Eighth",
        9 => "Nineth",
        10 => "Tenth",
        11 => "Eleventh",
        12 => "Twelfth",
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

if (!empty($registration[0]['dob'])) {
    $birth_date = $registration[0]['dob'];
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
//$up_dt = $this->db->select('*')->get_where('registration', array('registration_id' => $registration[0]['registration_id']))->result_array();
//$s = explode(" ", $up_dt[0]['approved_dt']);
//$t = array_slice($s, 0, 1);
//$e = implode(" ", $t);
//$f = date("d/m/Y", strtotime($e));

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bonafide Certificate</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/external/bootstrap.min.css">
        <script src="<?php echo base_url(); ?>assets/external/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/external/bootstrap.min.js"></script>

        <style>

            @page{
                margin-top: 50px;
                margin-left: 30px;
                margin-right: 24px;

            }
            /*table, th, td */
            /*{*/
            /*      border: 2px solid black;*/
            /*      border-collapse: collapse;*/
            /*}*/
            .row::after
            {
                content: "";
                clear: both;
                display: table;
            }
            .column
            {
                float: left;
                width: 99%;
                padding: 5px;
            }
            *,html {
                /*margin-top: 50px;*/
                /*margin-bottom: 0px;*/
                font-family: 'Open Sans';
            }
            text {
                font-family: 'Open Sans';
                font-weight: 350;
            }
            .a {
                line-height: 175%;
                margin-left: 35px;
            }
            .f-24 {
                font-size: 18px;
            }
            .f-18 {
                font-size: 15px;
            }
            .f-16 {
                font-size: 14px;
            }
            .font-weight-medium {
                font-weight: 400;
            }

            .font-weight-semibold {
                font-weight: bold;
            }

            .font-weight-bold {
                font-weight: bold;
            }

        </style>
    </head>
    <?php
//    if ($registration[0]['year_id'] != 1) {
//        $course = $this->db->select('department_name')->where('department_id', $registration[0]['department_id'])->get('department')->row('department_name');
//    } else {
//        $course = $this->db->select('department_name')->where('department_id', $registration[0]['course_id'])->get('department')->row('department_name');
//    }

//    $ysd = $this->db->select('*')->where(array('academic_year' => $bonafide[0]['academic_year'], 'registration_id' => $bonafide[0]['student_id']))->get('yearwise_student_data')->row_array();
//    $main_course = $this->db->select('department_name')->where('department_id', $ysd['department_id'])->get('department')->row('department_name');
//    $year = $this->db->select('year_name')->where('year_id', $ysd['year_id'])->get('year')->row('year_name');
//    $year_name = ($registration[0]['is_dsy'] == '1' && $registration[0]['year_id'] == '2') ? ('Direct ' . $year) : ($year);
//    $financial_academic_year = $this->Common_model->get_current_financial_year();

    ?>
    <body class="full-height" style="font-family:dejavuserif;font-weight:bold">
        <table border="0px" style="width:100%" class="row">

            <tr>
                <?php
                for ($m = 0; $m <= 1; $m++) {
                    ?>
                    <td>
                        <table border="0px" style="border:1mm solid black" class="column">    

                            <tr>
                                <td align="center"><?php
                                    if ($m == 0) {
                                        ?>
                                        <span style="float:right">(Office Copy)</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span style="float:right">(Student Copy)</span>
                                        <?php
                                    }
                                    ?></td>
                                <td align="center" ></td>
                                <td align="center" ></td>
                                <td align="center" ></td>
                                <td align="center" ></td>
                                <td align="center" ></td>
                                <td align="center" ></td>
                                <td colspan='3' align="right">No: 1<?php //echo $bonafide[0]['bonafide_id']; ?></td>
                            </tr>
                            <tr>
                                <td colspan='1' rowspan="1"><img src="assets/images/kbp_logo.png" style="width:70px; height:70px;"></td>
                                <td colspan='11' style="text-align: center;"><h5>Rayat Shikshan Sanstha's<br><span style="font-family: times;font-size: 14pt;">Karmaveer Bhaurao Patil College of Engineering, Satara</span><br>Sadar Bazar, Camp Satara - 415001</h5></td>
                            </tr>

                            <tr>
                                <td colspan='12'></td>
                            <hr>
                            </tr>

                            <tr>
                                <td colspan='12' align="center" class="font-weight-semibold"><h3>BONAFIDE CERTIFICATE</h3></td>
                            </tr> <br>    

                            <tr>
                                <td colspan='12' class="f-18 a" style="margin-left:100px">&nbsp;This is to certify that,<b class="f-16 font-weight-semibold">&nbsp;<?php
//                                        if ($registration[0]['gender'] == "Male") {
//                                            echo 'Mr.';
//                                        } else {
//                                            echo 'Mrs.';
//                                        }
                                        ?><u>Mr. SHINDE NAGESH TUKARAM<?php //echo $registration[0]['last_name'] . " " . $registration[0]['first_name'] . " " . $registration[0]['middle_name']; ?></u></b>&nbsp;is a &nbsp;bonafide student of this College, studying in the
                                    <b class="">&nbsp;<u>Civil Engineering-<?php //echo $course . "-" . $year_name; ?></u></b>&nbsp;Class during academic &nbsp;year&nbsp;<b class="f-16 font-weight-semibold">&nbsp;<u>2025-2026<?php //echo $ysd['academic_year']; ?></u></b><br>&nbsp;To the best of my knowledge and belief. <?php
//                                    if ($registration[0]['gender'] == "Male") {
//                                        echo He;
//                                    } else {
//                                        echo She;
//                                    }
                                    ?> bears good moral &nbsp;character.<br>&nbsp;<?php
//                                                if ($registration[0]['gender'] == "Male") {
//                                                    echo 'His';
//                                                } else {
//                                                    echo 'Her';
//                                                }
                                                ?>His date of birth is &nbsp;<b class="f-16 font-weight-semibold">15/10/2002<?php //echo date("d/m/Y", strtotime($registration[0]['dob'])); ?></b>&nbsp;(In words <b class="f-16 font-weight-semibold">Fifteenth October Two Thousand Two<?php //echo $birth_day . "   " . $monthName . " " . $birth_year; ?>).</b>
                                </td></h5>
                            </tr>
                            <br><br>
                            <tr>
                                <td colspan='12' class="f-16 font-weight-semibold">&nbsp;Date of Admission : 01/06/2021<?php //echo date('d/m/Y', strtotime($bonafide[0]['admission_dt'])); ?> </b></td>
                            </tr><br><br>

                            <tr>

                                <td colspan='12' class="f-16 font-weight-semibold"> &nbsp;Place : SATARA</b></td>
                            </tr><br>

                            <tr>
                            <?php //$date = date_create($bonafide[0]['bonafide_date']); ?>
                                <td colspan='12' class="f-16 font-weight-semibold">&nbsp;Date :&nbsp;09/12/2025<?php //echo date_format($date, "d/m/Y"); ?></b></td>
                            <tr>
                                <td colspan='2'></td>

                                <td colspan='10' align="center" width="160px" class="f-18" style='text-transform:uppercase'><b class="f-16 font-weight-semibold"><?php //echo $bonafide[0]['type']; ?></b></td>
                            </tr><br>

                            <tr>
                                <td colspan='2'></td>

                                <td colspan='10' align="center" class="f-18"><b class="f-16 font-weight-semibold">Karmaveer Bhaurao Patil College of Engineering, Satara</b><br><br><br></td>

                            </tr>

                </tr>
            </table>

        </td>
<?php } ?>

</tr>
</table><br>


<script>
    window.print();
</script>


</body>
</html>
