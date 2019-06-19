<?php
class login 
{
    private $db;

    function __construct($DB_con)
	{
		$this->db = $DB_con;
    }
    public function level_tolak($userstatus,$parameter){
        $arrlength = count($userstatus);
        for($x = 0; $x < $arrlength; $x++) {
            if($userstatus[$x] == $_SESSION['level']){
                header('Location: ../view/'.$parameter.'.php');
            }
        }
    }
    public function login_user($username,$password){
        $query = "SELECT * FROM user WHERE username='".$username."' AND  password=MD5('".$password."') limit 1";
		$outp = '';
		try
			{
                $stmt = $this->db->prepare($query);
				$stmt->execute();
		        if($stmt->rowCount()>0)
			    {
			        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			        {
                    //     // $outp = $row[$kolom];
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['jabatan'] = $row['jabatan'];
                    $_SESSION['level'] = $row['level'];
                    $_SESSION['iduser'] = $row['id_user'];
                    $_SESSION['nip'] = $row['nip'];
                    }
                    $outp = true;
				}else{
					$outp = false;
				}
			}
		catch(PDOException $e)
			{
				$outp = false;
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
    }

    public function logout()
	{
        session_destroy();
        $_SESSION['user'] = $row['username'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['jabatan'] = $row['jabatan'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['iduser'] = $row['id_user'];
        $_SESSION['nip'] = $row['nip'];
	}

    public function login_status()
	{
        if(empty($_SESSION['user']) ){
            header('Location: ../view/index.php');
        }
        
    }


}