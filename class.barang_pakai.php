<?php
class barang_pakai{

    private $db;

    function __construct($DB_con)
	{
		$this->db = $DB_con;
    }
    

    public function tambah_barangpakai ($kode_barang,$nama_barang,$nomor_register,$merk,$ukuran,$bahan,$tahun_pembelian,$pabrik,$rangka,$mesin,$polisi,$bpkb,$asal_usul,$kondisi,$ruangan,$harga,$keterangan) 
    {
        $query = "INSERT INTO barang_pakai_habis (kode_barang,nama_barang,nomor_register,merk,ukuran,bahan,tahun_pembelian,pabrik,rangka,mesin,polisi,bpkb,asal_usul,kondisi,ruangan,harga,keterangan) VALUES ('".$kode_barang."','".$nama_barang."','".$nomor_register."','".$merk."','".$ukuran."','".$bahan."','".$tahun_pembelian."','".$pabrik."','".$rangka."','".$mesin."','".$polisi."','".$bpkb."','".$asal_usul."','".$kondisi."','".$ruangan."','".$harga."','".$keterangan."')";
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

    public function tampilBarangPakai()
    {
        $noUrut = 1;
        $query = "SELECT * FROM barang_pakai_habis";
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
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nama_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['merk']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
                    $outp .= "<td>".$row['tahun_pembelian']."</td>";
                    $outp .= "<td>".$row['pabrik']."</td>";
                    $outp .= "<td>".$row['rangka']."</td>";
                    $outp .= "<td>".$row['mesin']."</td>";
                    $outp .= "<td>".$row['polisi']."</td>";
                    $outp .= "<td>".$row['bpkb']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>".$row['kondisi']."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangBarang($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
                    $outp .= "<td><a href='../view/ubah_barang.php?id_barang=".$row['id_barang']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
                    $konddata = '"../modal/m.hapusbarang.php?id_barang='.$row['id_barang'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white'> <i class='fas fa-trash'></i></a></td>";
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

    public function tampilBarangPakai_pdf()
    {
        $noUrut = 1;
        $query = "SELECT * FROM barang_pakai_habis";
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
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nama_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['merk']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
                    $outp .= "<td>".$row['tahun_pembelian']."</td>";
                    $outp .= "<td>".$row['pabrik']."</td>";
                    $outp .= "<td>".$row['rangka']."</td>";
                    $outp .= "<td>".$row['mesin']."</td>";
                    $outp .= "<td>".$row['polisi']."</td>";
                    $outp .= "<td>".$row['bpkb']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>".$row['kondisi']."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangBarang($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
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

    public function format_uangBarang($data){
		return number_format($data,2,',','.');
	}

    public function hargaBarang() {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM barang_pakai_habis");

        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangBarang($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  

    }
    

 

    public function ubahBarang($id_barang,$kode_barang,$nama_barang,$nomor_register,$merk,$ukuran,$bahan,$tahun_pembelian,$pabrik,$rangka,$mesin,$polisi,$bpkb,$asal_usul,$kondisi,$ruangan,$harga,$keterangan)
    {
        $query = "UPDATE barang_pakai_habis SET kode_barang ='".$kode_barang."', nama_barang='".$nama_barang."',nomor_register='".$nomor_register."',merk='".$merk."',ukuran='".$ukuran."',bahan='".$bahan."',tahun_pembelian='".$tahun_pembelian."',pabrik='".$pabrik."',rangka='".$rangka."',mesin='".$mesin."',polisi='".$polisi."', bpkb='".$bpkb."', asal_usul='".$asal_usul."',kondisi='".$kondisi."',ruangan='".$ruangan."',harga='".$harga."', keterangan='".$keterangan."' WHERE id_barang ='".$id_barang."'";
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


    public function cetak_barang($kolom,$id_barang){
        $query = "SELECT ".$kolom." FROM barang_pakai_habis WHERE id_barang=".$id_barang." limit 1";
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

    public function hapusBarang($id_barang)
	{
		$query = "DELETE FROM barang_pakai_habis WHERE id_barang ='".$id_barang."' ";
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