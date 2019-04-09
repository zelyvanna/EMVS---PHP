<?php
	function autoLoad($class) {
		require "classes/$class.class.php";
	}

	spl_autoload_register("autoLoad");
