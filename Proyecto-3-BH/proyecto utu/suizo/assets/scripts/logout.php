<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /proyecto-3-BH/proyecto%20utu/suizo/index.php');
?>