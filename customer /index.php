<?php
if (!isset($_COOKIE['Customer-Login'])){
    header('location:login.php');
} else {
    header('location:dashboard.php');
}