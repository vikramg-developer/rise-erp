<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                margin:0;
                padding:0;
            }

            .card{
                width:66mm;
                height:90mm;
                background-size:100% 100%;
                background-repeat:no-repeat;
                font-family:dejavusans;
                /*overflow:hidden;*/
            }
            .kbp-logo{
                position:absolute;
                margin-top:-6mm;        /* 🔴 USE mm */
                margin-left:3mm;
                width:9mm;
                height:9mm;
                z-index:20;      /* 🔴 LOGO ABOVE TEXT */
            }
            .kbp-logo img{
                width:6mm;
                height:6mm;
                object-fit:contain;
            }
            /* HEADER TABLE */
            .header-table{
                position:absolute;
                width:100%;
                border-collapse:collapse;
                color:#fff;
                z-index:10;
            }
            .header-table td{
                vertical-align:middle;
            }

            /* TEXT CELL */
            .text-cell{
                padding-top:2mm;
                text-align:center;
                padding-right:4mm;
                padding-left:4mm;
            }

            .sanstha{
                font-size:7px;
                font-weight:bold;
            }
            .college{
                font-size:10px;
                font-weight:bold;
            }
            .address{
                font-size:6px;
                font-weight:bold;
            }
            .year{
                font-size:9px;
                font-weight:bold;
            }

            /* PHOTO */
            .profile_photo{
                margin-top:1mm;
                /*padding-bottom:0;*/
                text-align:center;
            }

            /* NAME */
            .name{
                text-align:center;
                font-size:10px;
                font-weight:bold;
                margin-top:2mm;
            }

            /* DETAILS */
            .student_details{
                width:100%;
                font-size:8px;
                font-weight:bold;
                /*margin-top:mm;*/
            }
            .student_details td{
                vertical-align:top;
                padding-left:4mm;
            }

            /* SIGN */
            .sign{
                position:absolute;
                bottom:6mm;
                right:5mm;
                font-size:6px;
            }
            /* PAGE BREAK */
            .page-break{
                page-break-before: always;
            }

            /* BACK CARD */


            /* RULES SECTION */
            .rules-section{
                font-size:7.5px;
                color:#000;
            }

            /* RULES TITLE */
            .rules-title{
                padding-top:2mm;
                text-align:center;
                font-size:12px;
                font-weight:bold;
                margin-bottom:3mm;
            }

            /* RULES LIST */
            .rules-list{
                padding-left:8mm;
                padding-right:4mm;
                margin:0;
                font-weight:bold;
            }

            .rules-list li{
                font-size:9px;
                margin-bottom:2mm;
                /*text-align:justify;*/
            }

            /* BLUE BOLD LINE */
            .rules-line{
                width:100%;
                height:1mm;           /* bold thickness */
                background: linear-gradient(
                    to right,
                    #2f2fb3,    blue 
                    #6a1b9a,    purple 
                    #c2185b     red 
                    );
                margin-bottom:3mm;
            }

            /* BACK COLLEGE INFO */

            .back-college-info{
                text-align:center;
                margin-top:3mm;
                padding-left:4mm;
                padding-right:4mm;
            }
            
            /* Sanstha Name */
            .back-sanstha{
                font-size:8px;
                font-weight:bold;
            }
            /* College Name */
            .back-college-name{
                font-size:12px;
                font-weight:bold;
                margin-bottom:1mm;
            }

            /* College Address */
            .back-college-address{
                font-size:9px;
                font-weight:bold;
                /*line-height:1.2;*/
            }
        </style>
    </head>

    <body>

        <div class="card" style="background-image:url('<?= base_url('assets/images/i_card_front.png') ?>')">
            <!-- KBP LOGO -->

            <!-- HEADER -->
            <table class="header-table">
                <tr>
                    <td class="text-cell">
                        <div class="sanstha"><?= esc($sanstha_name) ?></div>
                        <div class="college"><?= esc($college_name) ?></div>
                        <!--<div class="address">Sadar Bazar, Camp Satara – 415001</div>-->
                        <div class="year"><?= esc($yearwise_data['academic_year_name']) ?></div>
                    </td>
                </tr>
            </table>
            <!--            <div class="kbp-logo">
                            <img src="<?= base_url('assets/images/kbp_logo.png') ?>" style="width:25px;height:30px;">
                        </div>-->

            <!-- PHOTO -->
            <div class="profile_photo">
                <img src="<?= base_url('assets/images/profile.jpg') ?>" style="width:60px;height:60px ">
            </div>

            <!-- NAME -->
            <div class="name">JADHAV SONAL SURYAKANT ATUB AKBAR MUDDSARA<?php //echo esc($yearwise_data['student_last_name'] . ' ' . $yearwise_data['student_first_name'] . ' ' . $yearwise_data['student_middle_name']) ?></div>

            <!-- DETAILS -->
            <table class="student_details">
                <tr><td width="10mm">Class</td><td>: <?= esc($yearwise_data['year_name']) ?> - <?= esc($yearwise_data['department_name']) ?></td></tr>
                <tr><td>DOB</td><td>: <?= date('d-m-Y', strtotime($yearwise_data['student_birthdate'])) ?></td></tr>
                <tr><td>Mob.No.</td><td>: <?= esc($mobile) ?></td></tr>
                <tr><td>Rise No.</td><td>: <?= esc($yearwise_data['student_rise_no']) ?></td></tr>
                <tr><td>Address</td><td>: <?= esc($address) ?></td></tr>
            </table>

            <div style="margin-top:4mm;margin-left:4mm">
                <img src="data:image/png;base64,<?= $barcode_base64 ?>"
                     style="width:30mm; height:6mm;">
            </div>
        </div>

        <div class="page-break"></div>

        <div class="card" style="background-image:url('<?= base_url('assets/images/i_card_back.png') ?>')">

            <!-- RULES CONTAINER -->
            <div class="rules-section">
                <div class="rules-title">RULES</div>

                <ul class="rules-list">
                    <li>This identity cum library card is compulsory for entry in the college.</li>
                    <li>This card is not transferable and must be produced whenever demanded.</li>
                    <li>In case this card is lost / found, kindly inform the Librarian.</li>
                </ul>
            </div>

            <div class="rules-line"></div>

            <div class="back-college-info">
                <div class="back-sanstha"><?= esc($sanstha_name) ?></div>
                <div class="back-college-name"><?= esc($college_name) ?></div>
                <div class="back-college-address"><?= esc($college_address) ?></div>
            </div>

        </div>

    </body>
</html>
