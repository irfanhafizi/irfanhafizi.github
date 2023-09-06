<?php
// Retrieve the values from the database and store them in PHP variables
$query_amt = $conn->query("SELECT * FROM zakatamt WHERE amt_id=1");
$row = mysqli_fetch_assoc($query_amt);

$amt_fakir_diploma_0 = $row['amt_fakir_diploma_0'];
$amt_fakir_diploma_1 = $row['amt_fakir_diploma_1'];
$amt_fakir_ijazah_0 = $row['amt_fakir_ijazah_0'];
$amt_fakir_ijazah_1 = $row['amt_fakir_ijazah_1'];
$amt_fakir_master_0 = $row['amt_fakir_master_0'];
$amt_fakir_master_1 = $row['amt_fakir_master_1'];
$amt_miskin_diploma_0 = $row['amt_miskin_diploma_0'];
$amt_miskin_diploma_1 = $row['amt_miskin_diploma_1'];
$amt_miskin_ijazah_0 = $row['amt_miskin_ijazah_0'];
$amt_miskin_ijazah_1 = $row['amt_miskin_ijazah_1'];
$amt_miskin_master_0 = $row['amt_miskin_master_0'];
$amt_miskin_master_1 = $row['amt_miskin_master_1'];
$amt_yatim = $row['amt_yatim'];

// Echo the PHP variables into JavaScript code
echo "<script>
  var amt_fakir_diploma_0 = $amt_fakir_diploma_0;
  var amt_fakir_diploma_1 = $amt_fakir_diploma_1;
  var amt_fakir_ijazah_0 = $amt_fakir_ijazah_0;
  var amt_fakir_ijazah_1 = $amt_fakir_ijazah_1;
  var amt_fakir_master_0 = $amt_fakir_master_0;
  var amt_fakir_master_1 = $amt_fakir_master_1;
  var amt_miskin_diploma_0 = $amt_miskin_diploma_0;
  var amt_miskin_diploma_1 = $amt_miskin_diploma_1;
  var amt_miskin_ijazah_0 = $amt_miskin_ijazah_0;
  var amt_miskin_ijazah_1 = $amt_miskin_ijazah_1;
  var amt_miskin_master_0 = $amt_miskin_master_0;
  var amt_miskin_master_1 = $amt_miskin_master_1;
  var amt_yatim = $amt_yatim;
</script>";
?>