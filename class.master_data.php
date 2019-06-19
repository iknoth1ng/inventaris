<?php
class master_data{

    private $db;

    function __construct($DB_con)
	{
		$this->db = $DB_con;
    }
    
    public function cetak_id($kolom,$id_master){
        $query = "SELECT ".$kolom." FROM master_data WHERE id_master=".$id_master." limit 1";
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

    public function tambah_masterData($golongan, $bidang, $kelompok, $sub_kelompok, $sub_sub_kelompok, $kode_barang, $uraian, $masa_manfaat, $nilai_penyusutan, $tahun) 
    {
        $query = "INSERT INTO master_data (golongan, bidang, kelompok, sub_kelompok, sub_sub_kelompok, kode_barang, uraian, masa_manfaat, nilai_penyusutan, tahun) VALUES ('".$golongan."', '".$bidang."', '".$kelompok."', '".$sub_kelompok."', '".$sub_sub_kelompok."', '".$kode_barang."', '".$uraian."', '".$masa_manfaat."', '".$nilai_penyusutan."', '".$tahun."')";
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

    public function tampilMaster()
    {
        $noUrut = 1;
        $query = "SELECT * FROM master_data";
        $outp = '';
        try 
        {
            $stmt = $this->db->prepare($query);
			$stmt->execute();
			if($stmt->rowCount()>0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
					$outp .= "<tr>";
					$outp .= "<td align='center'>".$noUrut++.".</td>";
					$outp .= "<td>".$row['golongan']."</td>";
                    $outp .= "<td>".$row['bidang']."</td>";
                    $outp .= "<td>".$row['kelompok']."</td>";
                    $outp .= "<td>".$row['sub_kelompok']."</td>";
                    $outp .= "<td>".$row['sub_sub_kelompok']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
                    $outp .= "<td>".$row['uraian']."</td>";
                    $outp .= "<td>".$row['masa_manfaat']."</td>";
                    $outp .= "<td>".$row['nilai_penyusutan']."</td>";
                    $outp .= "<td>".$row['tahun']."</td>";
                    $outp .= "<td><a href='../view/ubah_master.php?id_master=".$row['id_master']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
                    $konddata = '"../modal/m.hapus_master.php?id_master='.$row['id_master'].'"';
                    $outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'><i class='fas fa-trash'></i></a></td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="3" align="center">data kosong</td></tr>';
			}
		}

		catch(PDOException $e)
			{
				$outp = '<tr><td colspan="3" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
    }

    public function ubahMaster($id_master,$golongan, $bidang, $kelompok, $sub_kelompok, $sub_sub_kelompok,$kode_barang,$uraian,$masa_manfaat,$nilai_penyusutan,$tahun)
    {
        $query = "UPDATE master_data SET golongan ='".$golongan."', bidang='".$bidang."',kelompok='".$kelompok."',sub_kelompok='".$sub_kelompok."',sub_sub_kelompok='".$sub_sub_kelompok."',kode_barang='".$kode_barang."',uraian='".$uraian."',masa_manfaat='".$masa_manfaat."',nilai_penyusutan='".$nilai_penyusutan."', tahun='".$tahun."' WHERE id_master='".$id_master."'";
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
            //return $e->getMessage();
        }
        return $outp;
    }

    public function hapusMaster($id_master)
	{
		$query = "DELETE FROM master_data WHERE id_master ='".$id_master."' ";
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

    public function cetak_json($kolom,$char){
        $query = "SELECT ".$kolom." FROM master_data WHERE ".$kolom." LIKE '%".$char."%' limit 5";
		$outp = '';
		try
			{
                $stmt = $this->db->prepare($query);
				$stmt->execute();
		        if($stmt->rowCount()>0)
			    {
			        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			        {
                        if($outp != ""){
                            $outp .= ",";
                        }
				        $outp .= '{"item" : '.json_encode($row[$kolom]).'}';
				        
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
		return '['.$outp.']';
    }
}

?>