<?php
session_start();
session_destroy();

print "<br><br><br> Deconnexion en cours...";

print "<html><head>";
print "<SCRIPT LANGUAGE=\"JavaScript\">document.location.href=\"./index.php\"</SCRIPT>";
print "</head><body>";
print "</body></html>";
?>