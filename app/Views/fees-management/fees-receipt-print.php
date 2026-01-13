<html>
    <style>

        @page
        {
            margin: 20px 20px 20px 30px;
        }

        table
        {
            border-collapse: collapse;
            margin-top: 0px;
        }

        #office_copy_header th,td, #student_copy_header th,td, #office_copy_student_details th,td, #student_copy_student_details th,td, #office_copy_fee_details th,td, #student_copy_fee_details th,td, #office_copy_footer th,td, #student_copy_footer th,td
        {
            padding: 5px;
            font-size: 9pt;
        }

        /*#office_copy_fee_details, #student_copy_fee_details
        {
                border: 2px solid;
                border-bottom: 0px;
        }*/

        /*#office_copy_footer, #student_copy_footer
        {
                border: 2px solid;
        }*/

        span
        {
            margin-left:100px;
        }
    </style>
    <?php
//		foreach ($payment_head_table_data as $value) 
//		{
//
//			$registration_info = $this->Registration_model->registration_info($payment_table_data[0]['registration_id']);
//			$yearwise_student_info = $this->Fees_management_model->get_yearwise_student_data($payment_table_data[0]['registration_id'],$payment_table_data[0]['year_id']);
//			$department_name = $this->Fees_management_model->get_department_name($payment_table_data[0]['department_id']);
//            $academic_year_id = $this->Fees_management_model->getAcademicYearId($yearwise_student_info[0]['academic_year']);
//            
//			if($payment_table_data[0]['department_id'] == 0)
//			{
//			    $department_name[0]['department_name'] = "";
//			}
//            
//            if($payment_table_data[0]['transaction_dt'] != "0000-00-00")
//			{
//				$dated = date('d-m-Y',strtotime($payment_table_data[0]['transaction_dt']));
//			}
//			else
//			{
//				$dated = date('d-m-Y',strtotime($payment_table_data[0]['payment_dt']));
//			}
//			
//			$academic_year = $this->Fees_management_model->getAcademicYearById($payment_table_data[0]['academic_year_id']);
//			$current_financial_year = $this->Common_model->get_current_financial_year();
//			$financial_year = $this->Common_model->get_financial_year_by_id($payment_table_data[0]['financial_year_id']);
//			$head_group_data = $this->Fees_management_model->head_group_data($value['head_group_id']);
//			$headwise_fee_data = $this->Fees_management_model->get_headwise_fee_data_from_payment_head_table($value['head_group_id'],$value['payment_id']);
//			$mode_of_payment = $this->Fees_management_model->get_mode_of_payment_by_id($payment_table_data[0]['mode_of_payment_id']);
//
//// 			$fees_data = $this->Fees_management_model->get_head_fees_data($registration_info[0]['admission_year_id'],$registration_info[0]['year_id'],$payment_table_data[0]['year_id'],$yearwise_student_info[0]['payment_category_id']);
//            $fees_data = $this->Fees_management_model->get_applicable_fee_from_student_fee_data_table($value['registration_id'],$payment_table_data[0]['academic_year_id'],$yearwise_student_info[0]['year_id'],$yearwise_student_info[0]['payment_category_id'],$registration_info[0]['year_id']);
//           
//			$fee_paid_from_student = $this->Fees_management_model->get_student_pending_fee_data($payment_table_data[0]['registration_id'],$payment_table_data[0]['year_id'],$academic_year_id[0]['year_id'],1);
//            $fee_paid_from_govt = $this->Fees_management_model->get_student_pending_fee_data($payment_table_data[0]['registration_id'],$payment_table_data[0]['year_id'],$academic_year_id[0]['year_id'],2);
//            
//            $pending_fee_from_student = $fees_data[0]['fees_from_student']-$fee_paid_from_student[0]['fees_paid'];
//            $pending_fee_from_govt = $fees_data[0]['fees_from_govt']-$fee_paid_from_govt[0]['fees_paid'];
//            
//            $fees_paid_by_student = $this->Fees_management_model->get_student_fee_data($payment_table_data[0]['registration_id'],$payment_table_data[0]['year_id'],$academic_year_id[0]['year_id'],1,$payment_table_data[0]['payment_id']);
//            $fees_paid_by_govt = $this->Fees_management_model->get_student_fee_data($payment_table_data[0]['registration_id'],$payment_table_data[0]['year_id'],$academic_year_id[0]['year_id'],2,$payment_table_data[0]['payment_id']);
//            
//            
//            
//			if($payment_table_data[0]['cash_or_online']==1)
//			{
//				$cash_or_online = "Cash";
//			}
//			else
//			{
//				$cash_or_online = "";
//			}
//
//			$drawn_on = $this->Fees_management_model->get_head_name($payment_table_data[0]['drawn_on']);
//			
//			if($payment_table_data[0]['is_other_fee']==1 && $payment_table_data[0]['registration_id'] == 0)
//			{
//			    $student_name = $payment_table_data[0]['student_name'];
//			    // $year_name = $this->Fees_management_model->get_year_name($payment_table_data[0]['year_id']);
//			    $class = $this->Fees_management_model->get_class_name_by_id($payment_table_data[0]['class_id']);
//			 //   var_dump($class);
//			    $class_name = $class[0]['class_name'];
//			}
//			else
//			{
//			    $student_name =$registration_info[0]['last_name']." ".$registration_info[0]['first_name']." ".$registration_info[0]['middle_name'];
//			    $class = $this->Fees_management_model->get_class_name_by_id($yearwise_student_info[0]['class_id']);
//			    $class_name = $class[0]['class_name'];
//			}
//			
//			if($payment_table_data[0]['year_id'] == 0)
//			{
//			    $class_name = "";
//			}
    ?>
    <body>
        <table style="width: 100%" border="0">

            <tr>
                <!-- Office Copy -->
                <td style="border: 2px solid; padding: 0;">
                    <table id="office_copy_header"  style="width: 100%" border="0">
                        <tr>
                            <td></td>
                            <td style="text-align:center;"><span style="background-color: #000; color: #FFF; font-size: 14px;">&emsp;RECEIPT&emsp;</span></td>
                            <td style="text-align: right;">Office Copy</td>
                        </tr>
                        <tr>
                            <td><img src="<?php echo base_url('assets/images/kbp_logo.png'); ?>" style="width:70px; height:70px;"></td>
                            <td style="text-align: center;"><h4>Rayat Shikshan Sanstha's<br><span style="font-family: times;font-size: 14pt;">Karmaveer Bhaurao Patil College of Engineering, Satara</span><br>Sadar Bazar, Camp Satara - 415001</h4></td>
                        </tr>
<!--			<tr>
                                <th colspan="1" style="text-align: center;">Karmaveer Bhaurao Patil College of Engineering, Satara</th>
                                <td></td>
                        </tr>
                        <tr>
                                <td colspan="1" style="text-align: center;">Sadar Bazar, Camp Satara, 415001</td>
                                <td></td>
                        </tr>-->
                        <tr>
                            <td colspan="2" style="text-align: left;"><b>Receipt No.:</b> 2025-2026/B.Tech/3923<?php // echo  $financial_year[0]['year_name']."/".$head_group_data[0]['head_group_abbr']."/".$value['receipt_no'].''.$value['sub_reciept_no']    ?></td>
                            <td colspan="1" style="text-align: right;"><b>Date: </b> 13-01-2026<?php // echo date('d-m-Y',strtotime($payment_table_data[0]['payment_dt']));    ?></td>
                        </tr>
                    </table>

                    <hr>
                    <?php
//						if($registration_info[0]['is_dsy'] == 1 && $payment_table_data[0]['year_id'] == 2)
//						{
//							$dir = "Dir. ";
//						}
                    ?>
                    <table id="office_copy_student_details" style="width: 100%" border="0">
                        <tr>
                            <td colspan="1"><b>Name: </b><?php echo strtoupper($student_name); ?></td>
                            <td colspan="1" style="text-align: right;"><b>Reg. ID:</b> <?php echo $registration_id; ?></td>
                        </tr>
                        <tr>
                            <td colspan="1"><b>Dept: </b><?php echo $department_name; ?> - <?php echo $year_name; ?></td>
                            <td colspan="1" style="text-align: right;"><b>Year:</b> <?php echo $academic_year; ?></td>
                        </tr>
                    </table>



                    <table id="office_copy_fee_details" style="width: 100%" border="0">
                        <tr>
                            <th style="border-right: 1px solid #888; border-bottom: 1px solid #888; border-top: 1px solid #888; font-size: 8pt; width: 10%;"><b>SR. NO.</th>
                            <th style="border-right: 1px solid #888; border-bottom: 1px solid #888; border-top: 1px solid #888; font-size: 8pt; width: 70%;"><b>PARTICULARS</th>
                            <th style=" border-bottom: 1px solid #888; border-top: 1px solid #888; font-size: 8pt; width: 20%;"><b>AMOUNT (RS.)</th>
                        </tr>
                        <?php
//						$i=1;
//						$total_head_fees =0;
//						foreach($headwise_fee_data as $head_fees)
//						{
//							$head_name = $this->Fees_management_model->get_head_name($head_fees['head_id']);
//							$total_head_fees = $total_head_fees+$head_fees['fees_paid'];
//							if($payment_table_data[0]['is_cancelled']==1)
//							{
//								$head_fees['fees_paid']=0;
//								$total_head_fees=0;
//							}
                        ?>
                        <tr>
                            <td style="text-align: center; border-right: 1px solid #888;">1<?php // echo $i++;     ?></td>
                            <td style="text-align: left; border-right: 1px solid #888;">tution fee<?php //echo $head_name[0]['head_name'];    ?></td>
                            <td style="text-align: right;"> 12000<?php //echo $head_fees['fees_paid'];     ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border-right: 1px solid #888;">2<?php // echo $i++;     ?></td>
                            <td style="text-align: left; border-right: 1px solid #888;">Development fee<?php //echo $head_name[0]['head_name'];    ?></td>
                            <td style="text-align: right;"> 32000<?php //echo $head_fees['fees_paid'];     ?></td>
                        </tr>
                        <?php //}  ?>


                        <?php
                        for ($i = 0; $i < 31 - 2; $i++) {
                            ?>
                            <tr>
                                <td style="border-right: 1px solid #888;"></td>
                                <td style="border-right: 1px solid #888;"></td>
                                <td></td>
                            </tr>
                            <?php
                        }
                        ?>


                        <tr>
                            <th colspan="2" style="text-align: right; border-top: 1px solid #888; border-bottom: 1px solid #888; border-right: 1px solid #888; font-size: 8pt;">TOTAL</th>
                            <th colspan="1" style="text-align: right; border-top: 1px solid #888; border-bottom: 1px solid #888;"><?php //echo number_format((float) $total_head_fees, 2, '.', '');    ?></th>
                        </tr>

                        <tr>
                            <td colspan="3" style="text-align: left">Rupees in Words <?php // echo strtoupper(ucwords($this->Fees_management_model->getIndianCurrency($total_head_fees)));    ?> ONLY</td>
                        </tr>
                    </table>

                    <table id="office_copy_footer" style="width: 100%" border="0">
                        <tr>
                            <td colspan="2" style="border-top: 2px solid;"><b>Mode Of Payment</b> <?php // echo $cash_or_online." ".$mode_of_payment[0]['mode_of_payment'];    ?> &emsp;&emsp; <?php //echo $payment_table_data[0]['reference_no'];    ?></td>
                            <td style="border-top: 2px solid;"><b>Dated </b><?php // echo $dated;    ?></td>
                        </tr>
                        <tr>
                            <td><b>Narration: </b> <?php //echo $payment_table_data[0]['narration']    ?></td>
                        </tr>
                        <?php
//							if($payment_table_data[0]['is_cancelled']==1)
//							{
                        ?>
                        <tr>
                            <td><b>Cancel Remark: </b> <?php //echo $payment_table_data[0]['cancel_remark']   ?></td>
                        </tr>
                        <?php //  }   ?>
                        <?php
                        // if($payment_table_data[0]['cash_or_online']==2)
//							{
                        ?>
                        <tr>
                            <td colspan="2"><b>Drawn On</b> <?php // echo $drawn_on[0]['head_name'];   ?></td>
                            <td><b>Branch</b> <?php // echo mb_convert_case($payment_table_data[0]['branch'], MB_CASE_TITLE, "UTF-8");    ?></td>
                        </tr>
                        <?php
//  }
//						else
//						{
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                        //  }
//						if($payment_table_data[0]['is_other_fee']!=1)
//						   {
                        ?>

                        <tr>
                            <td colspan="3"><b>Pending Fee From Student After this Receipt: <?php // echo $fees_data[0]['fees_from_student']-$fees_paid_by_student[0]['fees_paid'];    ?></b></td>
                        </tr>

                        <tr>
                            <td colspan="3"><b>Pending Fee From Scholarship After this Receipt: <?php // echo $fees_data[0]['fees_from_govt']-$fees_paid_by_govt[0]['fees_paid'];    ?></b></td>

                        </tr>
                        <?php // }   ?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <tr>

                            <td colspan="2" style="text-align: right;color:red"><b><?php // echo ($payment_table_data[0]['is_cancelled']==1)?"Receipt Cancelled":"";    ?></b></td>
                            <td colspan="1" style="text-align: center"><b>Accountant/Cashier</b></td>

                        </tr>

                    </table>
                </td>

                <td></td>

                <!-- Student Copy -->

                <td style="border: 2px solid; padding: 0;">
                    <table id="student_copy_header"  style="width: 100%" border="0">
                        <tr>
                            <td></td>
                            <td style="text-align:center;"><span style="background-color: #000; color: #FFF; font-size: 14px;">&emsp;RECEIPT&emsp;</span></td>
                            <td style="text-align: right;">Student Copy</td>
                        </tr>
                        <tr>
                            <td><img src="<?php echo base_url('assets/images/kbp_logo.png'); ?>" style="width:70px; height:70px;"></td>
                            <td style="text-align: center;"><h4>Rayat Shikshan Sanstha's<br><span style="font-family: times;font-size: 14pt;">Karmaveer Bhaurao Patil College of Engineering, Satara</span><br>Sadar Bazar, Camp Satara - 415001</h4></td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: left;"><b>Receipt No.:</b> 2025-2026/B.Tech/3923<?php // echo  $financial_year[0]['year_name']."/".$head_group_data[0]['head_group_abbr']."/".$value['receipt_no'].''.$value['sub_reciept_no']    ?></td>
                            <td colspan="1" style="text-align: right;"><b>Date: </b> 13-01-2026<?php // echo date('d-m-Y',strtotime($payment_table_data[0]['payment_dt']));    ?></td>
                        </tr>
                    </table>

                    <hr>

                    <table id="student_copy_student_details" style="width: 100%" border="0">
                        <tr>
                            <td colspan="1"><b>Name: </b><?php echo strtoupper($student_name); ?></td>
                            <td colspan="1" style="text-align: right;"><b>Reg. ID:</b> <?php echo $registration_id; ?></td>
                        </tr>
                        <tr>
                            <td colspan="1"><b>Dept: </b><?php echo $department_name; ?> - <?php echo $year_name; ?></td>
                            <td colspan="1" style="text-align: right;"><b>Year:</b> <?php echo $academic_year; ?></td>
                        </tr>
                    </table>

                    <table id="student_copy_fee_details" style="width: 100%" border="0">
                        <tr>
                            <th style="border-right: 1px solid #888; border-bottom: 1px solid #888; border-top: 1px solid #888; font-size: 8pt; width: 10%;"><b>SR. NO.</th>
                            <th style="border-right: 1px solid #888; border-bottom: 1px solid #888; border-top: 1px solid #888; font-size: 8pt; width: 70%;"><b>PARTICULARS</th>
                            <th style=" border-bottom: 1px solid #888; border-top: 1px solid #888; font-size: 8pt; width: 20%;"><b>AMOUNT (RS.)</th>
                        </tr>
                        <?php
//						$i=1;
//						$total_head_fees =0;
//						foreach($headwise_fee_data as $head_fees)
//						{							
//							$head_name = $this->Fees_management_model->get_head_name($head_fees['head_id']);
//							$total_head_fees = $total_head_fees+$head_fees['fees_paid'];
//
//							if($payment_table_data[0]['is_cancelled']==1)
//							{
//								$head_fees['fees_paid']=0;
//								$total_head_fees=0;
//							}
                        ?>
                        <tr>
                            <td style="text-align: center; border-right: 1px solid #888;">1<?php // echo $i++;     ?></td>
                            <td style="text-align: left; border-right: 1px solid #888;">tution fee<?php //echo $head_name[0]['head_name'];    ?></td>
                            <td style="text-align: right;"> 12000<?php //echo $head_fees['fees_paid'];     ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border-right: 1px solid #888;">2<?php // echo $i++;     ?></td>
                            <td style="text-align: left; border-right: 1px solid #888;">Development fee<?php //echo $head_name[0]['head_name'];    ?></td>
                            <td style="text-align: right;"> 32000<?php //echo $head_fees['fees_paid'];     ?></td>
                        </tr>
                        <?php // }    ?>


                        <?php
                        for ($i = 0; $i < 31 - 2; $i++) {
                            ?>
                            <tr>
                                <td style="border-right: 1px solid #888;"></td>
                                <td style="border-right: 1px solid #888;"></td>
                                <td></td>
                            </tr>
    <?php
}
?>


                        <tr>
                            <th colspan="2" style="text-align: right; border-top: 1px solid #888; border-bottom: 1px solid #888; border-right: 1px solid #888; font-size: 8pt;">TOTAL</th>
                            <th colspan="1" style="text-align: right; border-top: 1px solid #888; border-bottom: 1px solid #888;"><?php //echo number_format((float) $total_head_fees, 2, '.', '');    ?></th>
                        </tr>

                        <tr>
                            <td colspan="3" style="text-align: left">Rupees in Words <?php // echo strtoupper(ucwords($this->Fees_management_model->getIndianCurrency($total_head_fees)));    ?> ONLY</td>
                        </tr>
                    </table>

                    <table id="student_copy_footer" style="width: 100%" border="0">
                        <tr>
                            <td colspan="2" style="border-top: 2px solid;"><b>Mode Of Payment</b> <?php // echo $cash_or_online." ".$mode_of_payment[0]['mode_of_payment'];    ?> &emsp;&emsp; <?php //echo $payment_table_data[0]['reference_no'];    ?></td>
                            <td style="border-top: 2px solid;"><b>Dated </b><?php // echo $dated;    ?></td>
                        </tr>
                        <tr>
                            <td><b>Narration: </b> <?php //echo $payment_table_data[0]['narration']    ?></td>
                        </tr>
<?php
//							if($payment_table_data[0]['is_cancelled']==1)
//							{
?>
                        <tr>
                            <td><b>Cancel Remark: </b> <?php //echo $payment_table_data[0]['cancel_remark']   ?></td>
                        </tr>
<?php //  }   ?>
                        <?php
                        //  if($payment_table_data[0]['cash_or_online']==2)
                        //{
                        ?>
                        <tr>
                            <td colspan="2"><b>Drawn On</b> <?php // echo $drawn_on[0]['head_name'];   ?></td>
                            <td><b>Branch</b> <?php // echo mb_convert_case($payment_table_data[0]['branch'], MB_CASE_TITLE, "UTF-8");   ?></td>
                        </tr>
<?php
//}
//						else
//						{
?>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
<?php
//  }
//						   if($payment_table_data[0]['is_other_fee']!=1)
//						   {
?>

                        <tr>
                            <td colspan="3"><b>Pending Fee From Student After this Receipt: <?php //echo $fees_data[0]['fees_from_student']-$fees_paid_by_student[0]['fees_paid'];    ?></b></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Pending Fee From Scholarship After this Receipt: <?php // echo $fees_data[0]['fees_from_govt']-$fees_paid_by_govt[0]['fees_paid'];   ?></b></td>

                        </tr>
<?php // }    ?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <tr>

                            <td colspan="2" style="text-align: right;color:red"><b><?php // echo ($payment_table_data[0]['is_cancelled']==1)?"Receipt Cancelled":"";    ?></b></td>
                            <td colspan="1" style="text-align: center"><b>Accountant/Cashier</b></td>

                        </tr>
                    </table>
                </td>

            </tr>



        </table>
<?php //}    ?>

    </body>
</html>