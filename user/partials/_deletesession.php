<?php
session_start();

if (isset($_SESSION['sys_true'])) {
   unset($_SESSION['sys_true']);
}