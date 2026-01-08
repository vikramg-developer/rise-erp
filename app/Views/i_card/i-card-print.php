<!DOCTYPE html>
<html>
<head>
<style>
body { margin: 0; font-family: sans-serif; font-size: 7px; }

/* CARD */
.card {
    width: 54mm;
    height: 86mm;
    position: relative;
    border: 0.3mm solid #000;
}

/* HEADER */
.header {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 18mm;
    background: #5a2a82;
    color: #fff;
    text-align: center;
    padding-top: 2mm;
}

.header img {
    position: absolute;
    top: 2mm;
    left: 2mm;
    width: 8mm;
    height: 8mm;
}

.header .title {
    font-size: 7px;
    font-weight: bold;
}

.header .college {
    font-size: 8px;
}

.header .year {
    font-size: 7px;
    font-weight: bold;
}

/* PHOTO */
.photo {
    position: absolute;
    top: 20mm;
    left: 19mm;
}
.photo img {
    width: 16mm;
    height: 16mm;
    border-radius: 50%;
    border: 0.5mm solid #000;
}

/* NAME */
.name {
    position: absolute;
    top: 38mm;
    width: 100%;
    text-align: center;
    font-size: 8px;
    font-weight: bold;
}

/* INFO */
.info {
    position: absolute;
    top: 44mm;
    left: 4mm;
    right: 4mm;
}
.info div { margin-bottom: 1mm; }

/* BARCODE */
.barcode {
    position: absolute;
    bottom: 8mm;
    left: 4mm;
    right: 4mm;
    text-align: center;
}

/* SIGN */
.sign {
    position: absolute;
    bottom: 3mm;
    right: 3mm;
    font-size: 6px;
}

/* BACK */
.page-break { page-break-after: always; }
.rules {
    padding: 6mm 4mm;
}
.rules h3 {
    text-align: center;
    margin-bottom: 3mm;
}
</style>
</head>

<body>

<!-- FRONT -->
<div class="card">

    <div class="header">
        <img src="<?= $logo ?>">
        <div class="title">Rayat Shikshan Sanstha's</div>
        <div class="college"><?= esc($college_name) ?></div>
        <div class="year"><?= esc($academic_year) ?></div>
    </div>

    <div class="photo">
        <img src="<?= $photo ?>">
    </div>

    <div class="name"><?= esc($full_name) ?></div>

    <div class="info">
        <div><b>Class:</b> <?= esc($class) ?></div>
        <div><b>DOB:</b> <?= esc($dob) ?></div>
        <div><b>Mob:</b> <?= esc($mobile) ?></div>
        <div><b>Rise No:</b> <?= esc($rise_no) ?></div>
        <div><b>Add:</b> <?= esc($address) ?></div>
    </div>

    <div class="barcode">
        <barcode code="<?= esc($rise_no) ?>" type="C128" size="0.8" height="6" />
    </div>

    <div class="sign">Principal’s Signature</div>

</div>

<div class="page-break"></div>

<!-- BACK -->
<div class="card rules">
    <h3>RULES</h3>
    <ul>
        <li>ID card is compulsory in college.</li>
        <li>This card is not transferable.</li>
        <li>If lost, inform librarian.</li>
    </ul>
</div>

</body>
</html>
