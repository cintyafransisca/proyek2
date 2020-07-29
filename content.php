<?php
if (!file_exists($mod.'.php')) {
	echo "Halaman Tidak di Temukan";
} else {
	include $mod.'.php';
}
?>