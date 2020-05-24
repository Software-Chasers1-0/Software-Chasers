<?php
	use PHPUnit\Framework\TestCase;

	/**
	 * 
	 */
	class signupTest extends TestCase
	{
		
		function sign()
		{
			$servername = "localhost";
			$username = "rovho10";
			$password = "Differ123*cpanel";
			
			$link = new \mysqli($servername,$username,$password,"rovhol0_database1");
			
			return $link;
		}
	}
?>
