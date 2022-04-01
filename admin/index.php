<?php
if (!isset($_COOKIE['Admin-Login'])){
    header('location:login.php');
} else {
    header('location:dashboard.php');
}
