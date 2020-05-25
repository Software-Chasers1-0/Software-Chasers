
<?php
/**
 * @coversDefaultClass SoftwareChasers10\SoftwareChasers\signin
 */
class signinTest extends PHPUnit\Framework\TestCase{
	protected $result;

	public function setUp(){//this part of the code initiates the hello variable
		$this->result = new \SoftwareChasers10\SoftwareChasers\signin();
		$link = mysqli_connect("localhost","user","password","rovhol0_database1");
		mysqli_query($link,"CREATE TABLE users (user_id int NOT NULL,user_name varchar(255),user_password varchar(255),user_email varchar(255),user_role varchar(255))");
		mysqli_query($link,"INSERT INTO users (user_id,user_name,user_password,user_email,user_role) values('46','Pfariso','Pfar','mpfumbapfariso@gmail.com','NULL')");
	}
	/**
	 * @covers ::singin
	 */
	public function testsingin(){//this part of the code checks if the value returned by the world() method is equal to word
		$password = "Pfar";
		$this->assertTrue( json_decode( $this->result->sign("Pfariso"),true )[0]['user_password'] == $password );
		$this->assertTrue( count( json_decode( $this->result->sign("") ) ) == 0 );
	}
}
?>
