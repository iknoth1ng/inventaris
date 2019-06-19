<?php
class rekapitulasi
{
    private $db;

    function __construct($DB_con)
	{
		$this->db = $DB_con;
    }

    public function tambah_rekapitulasi($nama_barang, $merk, $no_seri, $ukuran, $bahan,$tahun_pembelian,$kode_lokasi,$kode_barang,$jumlah_barang,$harga,$keadaan,$keterangan,$ruangan)
    {
        $query = "INSERT INTO rekapitulasi (nama_barang,merk,no_seri,ukuran,bahan,tahun_pembelian,kode_lokasi,kode_barang,jumlah_barang,harga,keadaan,keterangan,ruangan) VALUES ('".$nama_barang."','".$merk."','".$no_seri."','".$ukuran."','".$bahan."','".$tahun_pembelian."','".$kode_lokasi."','".$kode_barang."','".$jumlah_barang."','".$harga."','".$keadaan."','".$keterangan."','".$ruangan."')";
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

    public function tampil_rekapitulasi() 
    {
        $noUrut = 1;
        $query = "SELECT * FROM rekapitulasi";
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
					$outp .= "<td align='center'>".$noUrut++."</td>";
					$outp .= "<td>".$row['nama_barang']."</td>";
                    $outp .= "<td>".$row['merk']."</td>";
                    $outp .= "<td>".$row['no_seri']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
                    $outp .= "<td>".$row['tahun_pembelian']."</td>";
                    $outp .= "<td>".$row['kode_lokasi']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['jumlah_barang']."Unit</td>";
                    $outp .= "<td> Rp.".$this->format_uang($row['harga'])."</td>";
                    $outp .= "<td>".$row['keadaan']."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
					$outp .= "<td><a href='../view/ubah_rekapitulasi.php?id_rekapitulasi=".$row['id_rekapitulasi']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusrekapitulasi.php?id_rekapitulasi='.$row['id_rekapitulasi'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
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
	

	public function cetak_rekapitulasipdf() 
    {
        $noUrut = 1;
        $query = "SELECT * FROM rekapitulasi LIMIT 200";
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
					$outp .= "<td align='center'>".$noUrut++."</td>";
					$outp .= "<td>".$row['nama_barang']."</td>";
                    $outp .= "<td>".$row['merk']."</td>";
                    $outp .= "<td>".$row['no_seri']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
                    $outp .= "<td>".$row['tahun_pembelian']."</td>";
                    $outp .= "<td>".$row['kode_lokasi']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['jumlah_barang']."Unit</td>";
                    $outp .= "<td> Rp.".$this->format_uang($row['harga'])."</td>";
                    $outp .= "<td>".$row['keadaan']."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
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
	
	public function cetak_rekapitulasiruangan($data) 
    {
        $noUrut = 1;
        $query = "SELECT * FROM rekapitulasi WHERE ruangan= '$data'";
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
					$outp .= "<td align='center'>".$noUrut++."</td>";
					$outp .= "<td>".$row['nama_barang']."</td>";
                    $outp .= "<td>".$row['merk']."</td>";
                    $outp .= "<td>".$row['no_seri']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
                    $outp .= "<td>".$row['tahun_pembelian']."</td>";
                    $outp .= "<td>".$row['kode_lokasi']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['jumlah_barang']."Unit</td>";
                    $outp .= "<td> Rp.".$this->format_uang($row['harga'])."</td>";
                    $outp .= "<td>".$row['keadaan']."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
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


    public function tampil_rekapitulasi_get($data) 
    {
        $noUrut = 1;
        $query = "SELECT * FROM rekapitulasi where ruangan = '$data'";
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
					$outp .= "<td align='center'>".$noUrut++."</td>";
					$outp .= "<td>".$row['nama_barang']."</td>";
                    $outp .= "<td>".$row['merk']."</td>";
                    $outp .= "<td>".$row['no_seri']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
                    $outp .= "<td>".$row['tahun_pembelian']."</td>";
                    $outp .= "<td>".$row['kode_lokasi']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['jumlah_barang']." Unit</td>";
                    $outp .= "<td> Rp.".$this->format_uang($row['harga'])."</td>";
                    $outp .= "<td>".$row['keadaan']."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
					$outp .= "<td><a href='../view/ubah_rekapitulasi.php?id_rekapitulasi=".$row['id_rekapitulasi']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$outp .= "<td><a href='../modal/m.hapusrekapitulasi.php?id_rekapitulasi=".$row['id_rekapitulasi']."' class='btn btn-danger btn-circle btn-mb'> <i class='fas fa-trash'></i></a></td>";
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

    public function tampil_rekapitulasiadmin() 
    {
        $noUrut = 1;
        $query = "SELECT * FROM rekapitulasi";
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
					$outp .= "<td align='center'>".$noUrut++."</td>";
					$outp .= "<td>".$row['nama_barang']."</td>";
                    $outp .= "<td>".$row['merk']."</td>";
                    $outp .= "<td>".$row['no_seri']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
                    $outp .= "<td>".$row['tahun_pembelian']."</td>";
                    $outp .= "<td>".$row['kode_lokasi']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['jumlah_barang']." Unit</td>";
                    $outp .= "<td> Rp.".$this->format_uang($row['harga'])."</td>";
                    $outp .= "<td>".$row['keadaan']."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
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

    public function tampil_rekapitulasiadmin_get($data) 
    {
        $noUrut = 1;
        $query = "SELECT * FROM rekapitulasi where ruangan = '$data'";
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
					$outp .= "<td align='center'>".$noUrut++."</td>";
					$outp .= "<td>".$row['nama_barang']."</td>";
                    $outp .= "<td>".$row['merk']."</td>";
                    $outp .= "<td>".$row['no_seri']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
                    $outp .= "<td>".$row['tahun_pembelian']."</td>";
                    $outp .= "<td>".$row['kode_lokasi']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['jumlah_barang']." Unit</td>";
                    $outp .= "<td> Rp.".$this->format_uang($row['harga'])."</td>";
                    $outp .= "<td>".$row['keadaan']."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
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
    
    public function format_uang($data){
		return number_format($data,2,',','.');
    }  
    

    public function total_unit() {

        $query = $this->db->prepare("SELECT sum(jumlah_barang) as jumlah FROM rekapitulasi");

        try{ 
			$query->execute();     

         $rows =  $query->fetch();
         return $rows[0];

         } catch (PDOException $e){die($e->getMessage());}  

	}
	
	public function total_unitruangan($dataopd) {

        $query = $this->db->prepare("SELECT sum(jumlah_barang) as jumlah FROM rekapitulasi WHERE ruangan='".$dataopd."'");

        try{ 
			$query->execute();     

         $rows =  $query->fetch();
         return $rows[0];

         } catch (PDOException $e){die($e->getMessage());}  

    }

    public function ubah_rekapitulasi($nama_barang, $merk, $no_seri, $ukuran, $bahan,$tahun_pembelian,$kode_lokasi,$kode_barang,$jumlah_barang,$harga,$keadaan,$keterangan,$ruangan, $id_rekapitulasi)
    {
        $query = "UPDATE rekapitulasi SET nama_barang ='".$nama_barang."', merk='".$merk."',no_seri='".$no_seri."',ukuran='".$ukuran."',bahan='".$bahan."',tahun_pembelian='".$tahun_pembelian."',kode_lokasi='".$kode_lokasi."',ruangan='".$ruangan."',kode_barang='".$kode_barang."',jumlah_barang='".$jumlah_barang."',harga='".$harga."', keadaan='".$keadaan."', keterangan='".$keterangan."' WHERE id_rekapitulasi='".$id_rekapitulasi."'";
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
    
    public function cetak_rekapitulasi($kolom,$id_rekapitulasi){
        $query = "SELECT ".$kolom." FROM rekapitulasi WHERE id_rekapitulasi=".$id_rekapitulasi." limit 1";
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

    public function hapus_rekapitulasi($id_rekapitulasi)
	{
		$query = "DELETE FROM rekapitulasi WHERE id_rekapitulasi ='".$id_rekapitulasi."' ";
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