<?php
if (isset($_POST['send'])) {
    // sending email to our sever.
    $to         = "pubgoinfo@gmail.com";
    $from       = ($_POST['contact_email']);
    $first_name = strip_tags($_POST['first_name']);
    $last_name  = strip_tags($_POST['last_name']);
    $subject    = strip_tags($_POST['subject']);
    $comment    = "Comment:" . '\n\n' . strip_tags($_POST['comment']);
    
    $dear    = "To: " . $to;
    $signoff = "From: " . $first_name . ' ' . $last_name . '\n\n' . $from;
    mail($to, $subject, $comment, $signoff);
}
header('location:about.php');
?>