<?php
Session::init();
session_destroy();
echo("<script>window.location.replace('http://127.0.0.1:3000/');</script>")
?>