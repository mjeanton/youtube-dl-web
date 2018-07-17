<!DOCTYPE html>
<html>
	<?php

		ob_start();

		echo "something";
		echo "else";

		ob_get_clean();

		echo "new thing";

		/*
		https://www.youtube.com/watch?v=IWDI6EbZZL4
		*/

	?>
</html>

