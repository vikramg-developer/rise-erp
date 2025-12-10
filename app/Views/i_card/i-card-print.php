<style>
.icard {
    width: 54mm;
    height: 86mm;
    font-family: Arial, sans-serif;
    position: relative;
    overflow: hidden;
}

.icard .bg-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 54mm;
    height: 86mm;
    z-index: -1;
}

.icard .photo-box {
    width: 18mm;
    height: 22mm;
    border: 1px solid #000;
    position: absolute;
    top: 22mm;
    left: 18mm;
}

.details {
    text-align: center;
    font-size: 7px;
    color: #000;
    position: absolute;
    width: 50mm;
    left: 2mm;
}

.name {
    top: 48mm;
    font-weight: bold;
    text-transform: uppercase;
}

.line {
    text-align: left;
    left: 4mm;
    font-size: 7px;
}

.class { top: 53mm; }
.dob { top: 57mm; }
.mobile { top: 61mm; }
.uid { top: 65mm; }
.address { top: 69mm; }

.barcode {
    position: absolute;
    width: 50mm;
    left: 1mm;
    top: 73mm;
}
</style>

<div class="icard">
    <img src="assets/images/icard_front_side.jpg" class="bg-img">

    <!-- Student Photo -->
    <img src="assets/images/student.jpg" class="photo-box">

    <!-- Name -->
    <div class="details name">KAMBLE HARSHAD MITTHU</div>

    <!-- Details -->
    <div class="details line class"><b>Class :</b> F.Y. B.Sc (Computer Science)</div>
    <div class="details line dob"><b>DOB :</b> 21-06-2004</div>
    <div class="details line mobile"><b>Mo.No :</b> 9402768566</div>
    <div class="details line uid"><b>U.ID :</b> 20250004</div>
    <div class="details line address"><b>Add :</b> SHRIGONDA</div>

    <!-- Barcode image -->
    <img src="assets/images/barcode.png" class="barcode">
</div>

<pagebreak />