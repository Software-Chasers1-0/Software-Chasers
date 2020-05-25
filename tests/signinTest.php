
<?php
/**
 * @coversDefaultClass SoftwareChasers10\SoftwareChasers\signin
 */
class signinTest extends PHPUnit\Framework\TestCase{
	protected $result;

	public function setUp() : void {//this part of the code initiates the hello variable
		$this->result = new \SoftwareChasers10\SoftwareChasers\signin();
		$link = mysqli_connect("localhost","user","password","database1");
		mysqli_query($link,"CREATE TABLE users (user_id int NOT NULL,user_name varchar(255),user_password varchar(255),user_email varchar(255),user_role varchar(255))");
		mysqli_query($link,"INSERT INTO users (user_id,user_name,user_password,user_role,user_email) values('46','pfariso','Pfariso.@1','null','mpfumbapfariso@gmail.com')");
	}
	/**
	 * @covers ::sign
	 */
	public function testsingin(){//this part of the code checks if the value returned by the world() method is equal to word
		$password = "Pfariso.@2";
		echo "this" . $this->result->sign("pfariso");
		echo "that" . json_decode( $this->result->sign("pfariso"),true )[0];
		echo "now" . json_decode( $this->result->sign("pfariso"),true )[0]['user_password'];
		$this->assertSame( json_decode( $this->result->sign("pfariso"),true )[0]['user_password'], $password );
		#$this->assertTrue( count( json_decode( $this->result->sign("") ) ) == 0 );
	}
}
?>
