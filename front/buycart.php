<?php
if (isset($_SESSION['mem'])) {
} else {
  to("index.php?do=login");
}
?>