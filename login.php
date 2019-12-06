<?php
$inputUsername = $_POST["username"];
$inputPassword = $_POST["password"];
$inputGuest = $_POST["guest"];

if($_POST['sign-in']) {
  //User hit the save button, handle accordingly
  $customerVerification = "SELECT CID, Cpassword FROM Customers WHERE (CID = '$inputUsername' AND Cpassword = '$inputPassword')";
  $managerVerification = "SELECT MID, Mpassword FROM Managers WHERE (MID = '$inputUsername' AND Cpassword = '$inputPassword')";
  $StaffVerification = "SELECT StaffID, Spassword FROM Staff WHERE (MID = '$inputUsername' AND Cpassword = '$inputPassword')";

  if($customerVerification != null){
    return($inputUsername);
    return('Welcome valued customer!');}

  elseif($managerVerification != null){
    return($inputUsername);
    return('Welcome manager!');}

  else if($managerVerification != null){
    return($inputUsername);
    return('Welcome staff member!');}

  else {
    return('invalid credentials');}
}
?>

