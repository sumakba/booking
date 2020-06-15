<?php

require_once("reservation.php");
$reservation = new Reservation(1, 12, 23424, 1, [1,3,4], date("H:i:s"));
$reservation->addNewSession(3,4); // $par1 (key) $par2 (value) olacak şekilde yeni oturum ekler.
echo json_encode($reservation->getSessions(),JSON_FORCE_OBJECT); // Oturumları json formatında döndürür.

?>