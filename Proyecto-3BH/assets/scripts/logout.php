<?php
session_start();

session_unset();

session_destroy();

header('Location: /proyecto-3BH/');
