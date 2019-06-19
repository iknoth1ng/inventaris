<?php
class user{

    private $db;

    function __construct($DB_con)
	{
		$this->db = $DB_con;
    }
    

    public function tambah_user ($username, $password, $level) 
    {
        $query = "INSERT INTO user (username, password, level) VALUES ('".$username."', MD5('".$password."'), '".$level."')";
        $outp = '';
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            
            if($stmt->rowCount()>0)
            {
                $outp = true;
            }else{
                $outp = false;
            }
        }
        catch(PDOException $e)
        {
             $outp = false;
             return $outp;
            //return $e->getMessage();
        }
         return $outp;
    }
	
    public function ganti_pass($lama,$baru1)
	{
        $query = "UPDATE user SET password= MD5('".$baru1."') WHERE id_user = '".$_SESSION['iduser']."' and password = MD5('".$lama."')";
        $outp = '';
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            
            if($stmt->rowCount()>0)
            {
                $outp = true;
            }else{
                $outp = false;
            }
        }
        catch(PDOException $e)
        {
             $outp = false;
             return $outp;
            //return $e->getMessage();
        }
         return $outp;
	}
	
	public function daftar_pengguna(){
        $query = "SELECT * FROM user";
		$outp = '';
		try
			{
                $stmt = $this->db->prepare($query);
				$stmt->execute();
		        if($stmt->rowCount()>0)
			    {
			        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			        {
				        $outp .= '<div class="col-4">';
				        $outp .= '<div class="card shadow-sm p-3 mb-5 border border-dark">';
						$outp .=  '<div class="card-header py-1">';
						 $outp .=  '<h6 class= "font-weight-bold text-primary">ID User : '.$row['id_user'].'</h6>';
						 $outp .= '</div>';
						$outp .=  '<div class="card-body">';
						$outp .= 	'<h6 class="text-gray-900">Nama :  '.$row['fullname'].'</h6>';
						$outp .= 	'<h6 class="text-gray-900">Nip :  '.$row['nip'].'</h6>';
						$outp .= 	'<h6 class="text-gray-900">Jabatan :  '.$row['jabatan'].'</h6>';
						$outp .= 	'<h6  class="text-gray-900">Username : '.$row['username'].'</h6>';
						$outp .= 	'<h6 class="text-gray-900">Level :  '.$row['level'].'</h6>';
						$konddata = '"../modal/m.hapus_user.php?id_user='.$row['id_user'].'"';
						$outp .= 	"<a onclick='myhapus(".$konddata.")' class='btn btn-primary btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a>";
						$outp .= '</div>';
						$outp .= '</div>';
						$outp .= '</div>';
				        
					}
				}else{
					$outp = '';
				}
			}
		catch(PDOException $e)
			{
				$outp = '';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
    }


    public function tampil_user($mysource, $myid)
    {
        $query = "SELECT ".$mysource." FROM user WHERE id_user = ".$myid." limit 1";
        $outp = '';
        try 
        {
            $stmt = $this->db->prepare($query);
			$stmt->execute();
			if($stmt->rowCount()>0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
					$outp = $row[$mysource];
				}
			} else{
				$outp = '';
			}
		}

		catch(PDOException $e)
			{
				$outp = '';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
    }


    public function edit_profile($id_user, $fullname, $username, $nip, $jabatan, $foto)
    {
		if($foto != ""){
			$scpoto = ", foto='".$foto."'";
		}else{
			$scpoto = "";
		}
        $query = "UPDATE user SET fullname ='".$fullname."' , username='".$username."' ,nip='".$nip."',jabatan='".$jabatan."' ".$scpoto." WHERE id_user = '".$id_user."'";
        $outp ='';
        try
        {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            
            if($stmt->rowCount()>0)
            {
                $outp = true;
            }else{
                $outp = false;
            }
        }
        catch(PDOException $e)
        {
             $outp = false;
             return $outp;
            // return $e->getMessage();
        }
        return $outp;
	}
	

    public function cetak_user($kolom,$id_user){
        $query = "SELECT ".$kolom." FROM user WHERE id_user=".$id_user." limit 1";
		$outp = '';
		try
			{
                $stmt = $this->db->prepare($query);
				$stmt->execute();
		        if($stmt->rowCount()>0)
			    {
			        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			        {
				        $outp = $row[$kolom];
				        
					}
				}else{
					$outp = '';
				}
			}
		catch(PDOException $e)
			{
				$outp = '';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
    }

    public function hapus_user($id_user)
	{
		$query = "DELETE FROM user WHERE id_user ='".$id_user."' ";
		$outp = '';
		try
			{
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                
		        if($stmt->rowCount()>0)
			    {
					$outp = true;
				}else{
					$outp = false;
				}
			}
		catch(PDOException $e)
			{
				 $outp = false;
				 return $outp;
				//return $e->getMessage();
			}
		return $outp;
    }
}

?>