<?php

use Mailgun\Mailgun;

$botToken = '5983100808:AAEZqid9wn_qc2zkb5dFPtkHoVfBLIT0-Bg';
$mgClient = Mailgun::create('c8cf6bc0cdfb2b2348dee09c0f77c0bd-135a8d32-869f3ed8');

// Define the email parameters
$domain = "sandboxad0ab553d20a460d87bffc3e8bb1c320.mailgun.org";
$from = 'ezakat@uitmperlis.edu.my';
$to = 'Irfan irfanhafizi2000@gmail.com';
$subject = 'Hello from Mailgun';

$msg_submited = "anda telah mohon. tunggu, semakan dibuat";
$msg_correction = "permohonan perlu pembetulan";
$msg_validated = "permohonan lulus semakan";
$msg_reject ="permohonan ditolak";
$msg_app_assign = "anda telah ditugaskan penemuduga";
$msg_inter_assign = " orang pemohon telah ditugaskan kepada anda. sila semak e-ZAKAT";
$msg_success = "permohonan berjaya";
$msg_fail = "permohonan gagal";

?>