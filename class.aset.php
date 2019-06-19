<?php
class aset{

    private $db;

    function __construct($DB_con)
	{
		$this->db = $DB_con;
    }
    

    public function tambah_asetlain ($kode_barang,$nama_barang,$nomor_register,$merk,$ukuran,$bahan,$tahun_pembelian,$pabrik,$rangka,$mesin,$polisi,$bpkb,$asal_usul,$kondisi,$ruangan,$harga,$keterangan) 
    {
        $query = "INSERT INTO aset_lain (kode_barang,nama_barang,nomor_register,merk,ukuran,bahan,tahun_pembelian,pabrik,rangka,mesin,polisi,bpkb,asal_usul,kondisi,ruangan,harga,keterangan) VALUES ('".$kode_barang."','".$nama_barang."','".$nomor_register."','".$merk."','".$ukuran."','".$bahan."','".$tahun_pembelian."','".$pabrik."','".$rangka."','".$mesin."','".$polisi."','".$bpkb."','".$asal_usul."','".$kondisi."','".$ruangan."','".$harga."','".$keterangan."')";
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

    public function tampilasetlain()
    {
        $noUrut = 1;
        $query = "SELECT * FROM aset_lain";
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
                    $outp .= "<td>Rp. ".$this->format_uangAsetLain($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";     
                    $outp .= "<td><a href='../view/ubah_asetlain.php?id_asetlain=".$row['id_asetlain']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
                    $konddata = '"../modal/m.hapusasetlain.php?id_asetlain='.$row['id_asetlain'].'"';
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

    public function format_uangAsetLain($data){
		return number_format($data,2,',','.');
	}

    public function hargaAsetLain() {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM aset_lain");

        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangAsetLain($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

    public function ubahasetlain($id_asetlain,$kode_barang,$nama_barang,$nomor_register,$merk,$ukuran,$bahan,$tahun_pembelian,$pabrik,$rangka,$mesin,$polisi,$bpkb,$asal_usul,$kondisi,$ruangan,$harga,$keterangan)
    {
        $query = "UPDATE aset_lain SET kode_barang ='".$kode_barang."', nama_barang='".$nama_barang."',nomor_register='".$nomor_register."',merk='".$merk."',ukuran='".$ukuran."',bahan='".$bahan."',tahun_pembelian='".$tahun_pembelian."',pabrik='".$pabrik."',rangka='".$rangka."',mesin='".$mesin."',polisi='".$polisi."', bpkb='".$bpkb."', asal_usul='".$asal_usul."',kondisi='".$kondisi."',ruangan='".$ruangan."',harga='".$harga."', keterangan='".$keterangan."' WHERE id_asetlain ='".$id_asetlain."'";
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


    public function cetak_asetlain($kolom,$id_asetlain){
        $query = "SELECT ".$kolom." FROM aset_lain WHERE id_asetlain=".$id_asetlain." limit 1";
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

    public function tampilasetlain_pdf()
    {
        $noUrut = 1;
        $query = "SELECT * FROM aset_lain";
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
                    $outp .= "<td>".$this->format_uangAsetLain($row['harga'])."</td>";
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

    public function hapusasetlain($id_asetlain)
	{
		$query = "DELETE FROM aset_lain WHERE id_asetlain ='".$id_asetlain."' ";
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


    public function tambah_asettakberwujud ($kode_barang,$nama_barang,$tahun_pembelian,$asal_usul,$harga,$amortisasi,$akm_amortisasi_2016,$beban_amortisasi,$akm_amortisasi_2017,$nilai_buku,$keterangan) 
    {
        $query = "INSERT INTO aset_tak_berwujud (kode_barang,nama_barang,tahun_pembelian,asal_usul,harga,amortisasi,akm_amortisasi_2016,beban_amortisasi,akm_amortisasi_2017,nilai_buku,keterangan) VALUES ('".$kode_barang."','".$nama_barang."','".$tahun_pembelian."','".$asal_usul."','".$harga."','".$amortisasi."','".$akm_amortisasi_2016."','".$beban_amortisasi."','".$akm_amortisasi_2017."','".$nilai_buku."','".$keterangan."')";
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


    public function tampil_asettakberwujud()
    {
        $noUrut = 1;
        $query = "SELECT * FROM aset_tak_berwujud";
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
					$outp .= "<td>".$row['tahun_pembelian']."</td>";
					$outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_harga($row['harga'])."</td>";
                    $outp .= "<td>Rp. ".$this->format_amortisasi($row['amortisasi'])."</td>";
                    $outp .= "<td>Rp. ".$this->format_amortisasi_2016($row['akm_amortisasi_2016'])."</td>";
                    $outp .= "<td>Rp. ".$this->format_bebanamortisasi($row['beban_amortisasi'])."</td>";
                    $outp .= "<td>Rp. ".$this->format_amortisasi_2017($row['akm_amortisasi_2017'])."</td>";
                    $outp .= "<td>Rp. ".$this->format_niaibuku($row['nilai_buku'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
                    $outp .= "<td><a href='../view/ubah_asettak.php?id_aset=".$row['id_aset']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
                    $konddata = '"../modal/m.hapusasettak.php?id_aset='.$row['id_aset'].'"';
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

    public function format_harga($data){
		return number_format($data,2,',','.');
	}

    public function harga() {

        $query = $this->db->prepare("SELECT sum(harga) as total FROM aset_tak_berwujud");

        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_harga($rows['total']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

    public function format_amortisasi($data){
		return number_format($data,2,',','.');
	}


    public function amortisasi() {

        $query = $this->db->prepare("SELECT sum(amortisasi) as total FROM aset_tak_berwujud");

        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_amortisasi($rows['total']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

    public function format_amortisasi_2016($data){
		return number_format($data,2,',','.');
	}

    public function amortisasi_2016() {

        $query = $this->db->prepare("SELECT sum(akm_amortisasi_2016) as total FROM aset_tak_berwujud");

        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_amortisasi_2016($rows['total']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

    public function format_bebanamortisasi($data){
		return number_format($data,2,',','.');
	}

    public function beban_amortisasi() {

        $query = $this->db->prepare("SELECT sum(beban_amortisasi) as total FROM aset_tak_berwujud");

        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_bebanamortisasi($rows['total']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

    public function format_amortisasi_2017($data){
		return number_format($data,2,',','.');
    }
    

    public function amortisasi_2017() {

        $query = $this->db->prepare("SELECT sum(akm_amortisasi_2017) as total FROM aset_tak_berwujud");

        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_amortisasi_2017($rows['total']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

    public function format_niaibuku($data){
		return number_format($data,2,',','.');
	}

    public function nilai_buku() {

        $query = $this->db->prepare("SELECT sum(nilai_buku) as jumlah FROM aset_tak_berwujud");

        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_niaibuku($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

    public function ubah_asettakberwujud($id_aset,$kode_barang,$nama_barang,$tahun_pembelian,$asal_usul,$harga,$amortisasi,$akm_amortisasi_2016,$beban_amortisasi,$akm_amortisasi_2017,$nilai_buku,$keterangan)
    {
        $query = "UPDATE aset_tak_berwujud SET kode_barang ='".$kode_barang."', nama_barang='".$nama_barang."',tahun_pembelian='".$tahun_pembelian."',asal_usul='".$asal_usul."',harga='".$harga."',amortisasi='".$amortisasi."',akm_amortisasi_2016='".$akm_amortisasi_2016."',beban_amortisasi='".$beban_amortisasi."',akm_amortisasi_2017='".$akm_amortisasi_2017."',nilai_buku='".$nilai_buku."',keterangan='".$keterangan."' WHERE id_aset ='".$id_aset."'";
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

    public function cetak_asettakberwujud($kolom,$id_aset){
        $query = "SELECT ".$kolom." FROM aset_tak_berwujud WHERE id_aset=".$id_aset." limit 1";
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

    public function hapus_asettakberwujud($id_aset)
	{
		$query = "DELETE FROM aset_tak_berwujud WHERE id_aset ='".$id_aset."' ";
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

    public function tampil_asettakberwujud_pdf()
    {
        $noUrut = 1;
        $query = "SELECT * FROM aset_tak_berwujud";
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
					$outp .= "<td>".$row['tahun_pembelian']."</td>";
					$outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>".$this->format_harga($row['harga'])."</td>";
                    $outp .= "<td>".$this->format_amortisasi($row['amortisasi'])."</td>";
                    $outp .= "<td>".$this->format_amortisasi_2016($row['akm_amortisasi_2016'])."</td>";
                    $outp .= "<td>".$this->format_bebanamortisasi($row['beban_amortisasi'])."</td>";
                    $outp .= "<td>".$this->format_amortisasi_2017($row['akm_amortisasi_2017'])."</td>";
                    $outp .= "<td>".$this->format_niaibuku($row['nilai_buku'])."</td>";
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



}
?>