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
                background-image:url("<?= base_url('assets/images/i_card_front.png') ?>");
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
                text-align:center;
                padding-right:4mm;
                padding-left:4mm;
            }

            .sanstha{
                font-size:8px;
                font-weight:bold;
            }
            .college{
                font-size:9px;
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
            .photo{
                margin-top:0;
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
            .details{
                width:100%;
                font-size:8px;
                margin-top:2mm;
            }
            .details td{
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
        </style>
    </head>

    <body>

        <div class="card">
            <!-- KBP LOGO -->

            <!-- HEADER -->
            <table class="header-table">
                <tr>
                    <td class="text-cell">
                        <div class="sanstha"><?= esc($sanstha_name) ?></div>
                        <div class="college"><?= esc($college_name) ?></div>
                        <!--<div class="address">Sadar Bazar, Camp Satara – 415001</div>-->
                        <div class="year"><?= esc($academic_year) ?></div>
                    </td>
                </tr>
            </table>
            <!--            <div class="kbp-logo">
                            <img src="<?= base_url('assets/images/kbp_logo.png') ?>" style="width:25px;height:30px;">
                        </div>-->

            <!-- PHOTO -->
            <div class="photo">
                <img src="<?= base_url('assets/images/profile.jpg') ?>" style="width:60px;height:60px ">
            </div>

            <!-- NAME -->
            <div class="name"><?= esc($full_name) ?></div>

            <!-- DETAILS -->
            <table class="details">
                <tr><td width="10mm">Class</td><td>: <?= esc($class) ?></td></tr>
                <tr><td>DOB</td><td>: <?= date('d-m-Y', strtotime($dob)) ?></td></tr>
                <tr><td>Mob.No.</td><td>: <?= esc($mobile) ?></td></tr>
                <tr><td>Rise No.</td><td>: <?= esc($rise_no) ?></td></tr>
                <tr><td>Address</td><td>: <?= esc($address) ?></td></tr>
            </table>

            <div style="margin-top:4mm;margin-left:4mm">
                <img src="data:image/png;base64,<?= $barcode_base64 ?>"
                     style="width:30mm; height:6mm;">
            </div>
        </div>

        <div class="page-break"></div>

        <div class="card" style="background-image:url('<?= base_url('assets/images/i_card_back.png') ?>')">
            <!-- NOTHING ELSE -->
        </div>

    </body>
</html>
