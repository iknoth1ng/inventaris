<?php
class kib
{
    private $db;

    function __construct($DB_con)
	{
		$this->db = $DB_con;
    }
    
    public function ubah_tanggal($mydate)
	{
		return date("d-m-Y", strtotime($mydate) );
    }

   

    public function tambah_kibA($jenis_barang, $kode_barang, $nomor_register, $luas, $tahun_pengadaan,$letak,$hak,$tanggal,$nomor,$penggunaan,$asal_usul,$harga,$keterangan)
    {
        $query = "INSERT INTO kib_a (jenis_barang,kode_barang,nomor_register,luas,tahun_pengadaan,letak,hak,tanggal,nomor,penggunaan,asal_usul,harga,keterangan) VALUES ('".$jenis_barang."','".$kode_barang."','".$nomor_register."','".$luas."','".$tahun_pengadaan."','".$letak."','".$hak."','".$tanggal."','".$nomor."','".$penggunaan."','".$asal_usul."','".$harga."','".$keterangan."')";
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

    public function tampil_KIBA() 
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_a";
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
                    $outp .= "<td>".$row['nomor_register']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['tahun_pengadaan']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
                    $outp .= "<td>".$row['hak']."</td>";
                    $outp .= "<td>".$this->ubah_tanggal($row['tanggal'])."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
					$outp .= "<td>".$row['penggunaan']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibA($row['harga'])."</td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibA.php?id_kibA=".$row['id_kibA']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKIBA.php?id_kibA='.$row['id_kibA'].'"';
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

	public function tampil_KIBA_GET($data) 
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_a WHERE tahun_pengadaan = '$data'";
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
                    $outp .= "<td>".$row['nomor_register']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['tahun_pengadaan']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
                    $outp .= "<td>".$row['hak']."</td>";
                    $outp .= "<td>".$this->ubah_tanggal($row['tanggal'])."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
					$outp .= "<td>".$row['penggunaan']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibA($row['harga'])."</td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibA.php?id_kibA=".$row['id_kibA']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKIBA.php?id_kibA='.$row['id_kibA'].'"';
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

    public function tampil_pdf_KIBA() 
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_a";
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
					$outp .= "<td class='nomer' align='center'>".$noUrut++.".</td>";
					$outp .= "<td>".$row['jenis_barang']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
                    $outp .= "<td>".$row['nomor_register']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['tahun_pengadaan']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
                    $outp .= "<td>".$row['hak']."</td>";
                    $outp .= "<td>".$this->ubah_tanggal($row['tanggal'])."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
					$outp .= "<td>".$row['penggunaan']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibA($row['harga'])."</td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="15" align="center">data kosong</td></tr>';
			}
		}

		catch(PDOException $e)
			{
				$outp = '<tr><td colspan="15" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}

	public function tampil_pdf_KIBA_get($data) 
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_a WHERE tahun_pengadaan='$data'";
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
					$outp .= "<td class='nomer' align='center'>".$noUrut++.".</td>";
					$outp .= "<td>".$row['jenis_barang']."</td>";
                    $outp .= "<td>".$row['kode_barang']."</td>";
                    $outp .= "<td>".$row['nomor_register']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['tahun_pengadaan']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
                    $outp .= "<td>".$row['hak']."</td>";
                    $outp .= "<td>".$this->ubah_tanggal($row['tanggal'])."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
					$outp .= "<td>".$row['penggunaan']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibA($row['harga'])."</td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="15" align="center">data kosong</td></tr>';
			}
		}

		catch(PDOException $e)
			{
				$outp = '<tr><td colspan="15" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}
	
	public function format_uangkibA($data){
		return number_format($data,2,',','.');
	}

	public function hargaKIBA_get($tahun) {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM kib_a WHERE tahun_pengadaan='".$tahun."'");

        try{ 
			$query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangkibA($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  
    }

	public function hargaKIBA() {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM kib_a");

        try{ 
			$query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangkibA($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

    public function ubah_KIBA($id_kibA,$jenis_barang, $kode_barang, $nomor_register, $luas, $tahun_pengadaan,$letak,$hak,$tanggal,$nomor,$penggunaan,$asal_usul,$harga,$keterangan)
    {
        $query = "UPDATE kib_a SET jenis_barang ='".$jenis_barang."', kode_barang='".$kode_barang."',nomor_register='".$nomor_register."',luas='".$luas."',tahun_pengadaan='".$tahun_pengadaan."',letak='".$letak."',hak='".$hak."',tanggal='".$tanggal."',nomor='".$nomor."',penggunaan='".$penggunaan."',asal_usul='".$asal_usul."', harga='".$harga."', keterangan='".$keterangan."' WHERE id_kibA='".$id_kibA."'";
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
	
	public function cetak_kibA($kolom,$id_kibA){
        $query = "SELECT ".$kolom." FROM kib_a WHERE id_kibA=".$id_kibA." limit 1";
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
	
	
    public function hapus_KIBA($id_kibA)
	{
		$query = "DELETE FROM kib_a WHERE id_kibA ='".$id_kibA."' ";
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
	

    
    public function tambah_kibB($kode_barang,$nama_barang,$nomor_register,$merk,$ukuran,$bahan,$tahun_pembelian,$pabrik,$rangka,$mesin,$polisi,$bpkb,$asal_usul,$kondisi,$ruangan,$harga,$keterangan)
    {
        $query = "INSERT INTO kib_b (kode_barang,nama_barang,nomor_register,merk,ukuran,bahan,tahun_pembelian,pabrik,rangka,mesin,polisi,bpkb,asal_usul,kondisi,ruangan,harga,keterangan) VALUES ('".$kode_barang."','".$nama_barang."','".$nomor_register."','".$merk."','".$ukuran."','".$bahan."','".$tahun_pembelian."','".$pabrik."','".$rangka."','".$mesin."','".$polisi."','".$bpkb."','".$asal_usul."','".$kondisi."','".$ruangan."','".$harga."','".$keterangan."')";
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

    public function tampil_KIBB()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_b";
        $outp ='';

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
                    $outp .= "<td>Rp. ".$this->format_uangkibB($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibB.php?id_kibB=".$row['id_kibB']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKIBB.php?id_kibB='.$row['id_kibB'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="19" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="19" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;

	}

	public function tampil_KIBB_get($data)
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_b WHERE tahun_pembelian='$data'";
        $outp ='';

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
                    $outp .= "<td>Rp. ".$this->format_uangkibB($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibB.php?id_kibB=".$row['id_kibB']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKIBB.php?id_kibB='.$row['id_kibB'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="19" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="19" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;

	}

	public function format_uangkibB($data){
		return number_format($data,2,',','.');
	}

	public function hargaKIBB() {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM kib_b");

        try{ 
			$query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangkibA($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  

	}
	
	public function hargaKIBB_get($tahun) {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM kib_b WHERE tahun_pembelian='".$tahun."'");

        try{ 
			$query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangkibA($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  
    }
	
	public function ubah_KIBB($id_kibB,$kode_barang,$nama_barang,$nomor_register,$merk,$ukuran,$bahan,$tahun_pembelian,$pabrik,$rangka,$mesin,$polisi,$bpkb,$asal_usul,$kondisi,$ruangan,$harga,$keterangan)
    {
        $query = "UPDATE kib_b SET kode_barang ='".$kode_barang."', nama_barang='".$nama_barang."',nomor_register='".$nomor_register."',merk='".$merk."',ukuran='".$ukuran."',bahan='".$bahan."',tahun_pembelian='".$tahun_pembelian."',pabrik='".$pabrik."',rangka='".$rangka."',mesin='".$mesin."',polisi='".$polisi."', bpkb='".$bpkb."', asal_usul='".$asal_usul."',kondisi='".$kondisi."',ruangan='".$ruangan."',harga='".$harga."', keterangan='".$keterangan."' WHERE id_kibB='".$id_kibB."'";
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
	
	public function cetak_kibB($kolom,$id_kibB){
        $query = "SELECT ".$kolom." FROM kib_b WHERE id_kibB=".$id_kibB." limit 1";
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


    public function hapus_KIBB($id_kibB)
	{
		$query = "DELETE FROM kib_b WHERE id_kibB ='".$id_kibB."' ";
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

	public function tampil_pdf_KIBB()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_b";
        $outp ='';
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
					$outp .= "<td>".$row['harga']."</td>";
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

	public function tampil_pdf_KIBB_get($data)
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_b WHERE tahun_pembelian='$data'";
        $outp ='';
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
					$outp .= "<td>".$row['harga']."</td>";
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

	public function cetak_pdf_KIBB()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_b limit 150";
        $outp ='';
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
					$outp .= "<td>".$row['harga']."</td>";
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
	
	public function tambah_kibC($jenis_barang,$kode_barang,$nomor_register,$kondisi_bangunan,$bertingkat,$beton,$luas_lantai,$letak,$tanggal,$nomor,$luas,$status_tanah,$nomor_tanah,$asal_usul,$harga,$keterangan)
    {
        $query = "INSERT INTO kib_c (jenis_barang,kode_barang,nomor_register,kondisi_bangunan,bertingkat,beton,luas_lantai,letak,tanggal,nomor,luas,status_tanah,nomor_tanah,asal_usul,harga,keterangan) VALUES ('".$jenis_barang."','".$kode_barang."','".$nomor_register."','".$kondisi_bangunan."','".$bertingkat."','".$beton."','".$luas_lantai."','".$letak."','".$tanggal."','".$nomor."','".$luas."','".$status_tanah."','".$nomor_tanah."','".$asal_usul."','".$harga."','".$keterangan."')";
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
	
	public function tampil_KIBC()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_c";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['kondisi_bangunan']."</td>";
                    $outp .= "<td>".$row['bertingkat']."</td>";
                    $outp .= "<td>".$row['beton']."</td>";
                    $outp .= "<td>".$row['luas_lantai']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
					$outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_tanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibC($row['harga'])."</td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibC.php?id_kibC=".$row['id_kibC']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKIBC.php?id_kibC='.$row['id_kibC'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="18" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="18" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}

	public function tampil_KIBC_get($data)
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_c WHERE tanggal='$data'";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['kondisi_bangunan']."</td>";
                    $outp .= "<td>".$row['bertingkat']."</td>";
                    $outp .= "<td>".$row['beton']."</td>";
                    $outp .= "<td>".$row['luas_lantai']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
					$outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_tanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibC($row['harga'])."</td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibC.php?id_kibC=".$row['id_kibC']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKIBC.php?id_kibC='.$row['id_kibC'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="18" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="18" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}

	public function format_uangkibC($data){
		return number_format($data,2,',','.');
	}

	public function hargaKIBC() {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM kib_c");
        try { 
			$query->execute();     
			$rows =  $query->fetch();
         return $this->format_uangkibC($rows['jumlah']);

		 } catch (PDOException $e)
		 	{
				 die($e->getMessage());}  

	}
	
	public function hargaKIBC_get($tahun) {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM kib_c WHERE tanggal='".$tahun."'");

        try{ 
			$query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangkibC($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  
    }

	public function ubah_KIBC($id_kibC,$jenis_barang,$kode_barang,$nomor_register,$kondisi_bangunan,$bertingkat,$beton,$luas_lantai,$letak,$tanggal,$nomor,$luas,$status_tanah,$nomor_tanah,$asal_usul,$harga,$keterangan)
    {
        $query = "UPDATE kib_c SET jenis_barang ='".$jenis_barang."', kode_barang='".$kode_barang."',nomor_register='".$nomor_register."' ,kondisi_bangunan='".$kondisi_bangunan."',bertingkat='".$bertingkat."',beton='".$beton."',luas_lantai='".$luas_lantai."',letak='".$letak."',tanggal='".$tanggal."',nomor='".$nomor."',luas='".$luas."', status_tanah='".$status_tanah."', nomor_tanah='".$nomor_tanah."',asal_usul='".$asal_usul."' ,harga='".$harga."', keterangan='".$keterangan."' WHERE id_kibC='".$id_kibC."'";
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

	public function cetak_kibC($kolom,$id_kibC){
        $query = "SELECT ".$kolom." FROM kib_c WHERE id_kibC=".$id_kibC." limit 1";
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
	
	
    public function hapus_KIBC($id_kibC)
	{
		$query = "DELETE FROM kib_c WHERE id_kibC ='".$id_kibC."' ";
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

	public function tampil_pdf_KIBC()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_c";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['kondisi_bangunan']."</td>";
                    $outp .= "<td>".$row['bertingkat']."</td>";
                    $outp .= "<td>".$row['beton']."</td>";
                    $outp .= "<td>".$row['luas_lantai']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
					$outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_tanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibC($row['harga'])."</td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="18" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="18" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}

	public function tampil_pdf_KIBC_get($data)
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_c WHERE tanggal = '$data'";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['kondisi_bangunan']."</td>";
                    $outp .= "<td>".$row['bertingkat']."</td>";
                    $outp .= "<td>".$row['beton']."</td>";
                    $outp .= "<td>".$row['luas_lantai']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
					$outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_tanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibC($row['harga'])."</td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="18" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="18" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}

	public function tambah_kibD($jenis_barang,$kode_barang,$nomor_register,$konstruksi,$panjang,$lebar,$luas,$letak,$tanggal,$nomor,$status_tanah,$nomor_kodetanah,$asal_usul,$harga,$keterangan)
    {
        $query = "INSERT INTO kib_d (jenis_barang,kode_barang,nomor_register,konstruksi,panjang,lebar,luas,letak,tanggal,nomor,status_tanah,nomor_kodetanah,asal_usul,harga,keterangan) VALUES ('".$jenis_barang."','".$kode_barang."','".$nomor_register."','".$konstruksi."','".$panjang."','".$lebar."','".$luas."','".$letak."','".$tanggal."','".$nomor."','".$status_tanah."','".$nomor_kodetanah."','".$asal_usul."','".$harga."','".$keterangan."')";
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

	public function tampil_KIBD()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_d";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['konstruksi']."</td>";
                    $outp .= "<td>".$row['panjang']."</td>";
                    $outp .= "<td>".$row['lebar']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
					$outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_kodetanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibD($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibD.php?id_kibD=".$row['id_kibD']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKID.php?id_kibD='.$row['id_kibD'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="17" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="17" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}

	public function tampil_KIBD_get($data)
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_d WHERE tanggal='$data'";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['konstruksi']."</td>";
                    $outp .= "<td>".$row['panjang']."</td>";
                    $outp .= "<td>".$row['lebar']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
					$outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_kodetanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibD($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibD.php?id_kibD=".$row['id_kibD']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKID.php?id_kibD='.$row['id_kibD'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="17" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="17" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}


	public function format_uangkibD($data){
		return number_format($data,2,',','.');
	}

	public function hargaKIBD() {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM kib_d");
        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangkibD($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  

	}
	
	public function hargaKIBD_get($tahun) {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM kib_d WHERE tanggal='".$tahun."'");

        try{ 
			$query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangkibC($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  
    }

	public function ubah_KIBD($id_kibD,$jenis_barang,$kode_barang,$nomor_register,$konstruksi,$panjang,$lebar,$luas,$letak,$tanggal,$nomor,$status_tanah,$nomor_kodetanah,$asal_usul,$harga,$keterangan)
    {
        $query = "UPDATE kib_d SET jenis_barang ='".$jenis_barang."', kode_barang='".$kode_barang."',nomor_register='".$nomor_register."' ,konstruksi='".$konstruksi."',panjang='".$panjang."',lebar='".$lebar."',luas='".$luas."',letak='".$letak."',tanggal='".$tanggal."',nomor='".$nomor."', status_tanah='".$status_tanah."', nomor_kodetanah='".$nomor_kodetanah."',asal_usul='".$asal_usul."' ,harga='".$harga."', keterangan='".$keterangan."' WHERE id_kibD='".$id_kibD."'";
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

	public function cetak_kibD($kolom,$id_kibD){
        $query = "SELECT ".$kolom." FROM kib_d WHERE id_kibD=".$id_kibD." limit 1";
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
	

	public function hapus_KIBD($id_kibD)
	{
		$query = "DELETE FROM kib_d WHERE id_kibD ='".$id_kibD."' ";
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


	public function tampil_pdf_KIBD()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_d";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['konstruksi']."</td>";
                    $outp .= "<td>".$row['panjang']."</td>";
                    $outp .= "<td>".$row['lebar']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
					$outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_kodetanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibD($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="17" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="17" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}

	public function tampil_pdf_KIBD_get($data)
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_d WHERE tanggal = '$data'";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['konstruksi']."</td>";
                    $outp .= "<td>".$row['panjang']."</td>";
                    $outp .= "<td>".$row['lebar']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
					$outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_kodetanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibD($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="17" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="17" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}
	
	public function tambah_kibE($nama_barang,$kode_barang,$nomor_register,$judul,$spesifikasi,$asal_daerah,$pencipta,$bahan,$jenis,$ukuran,$jumlah,$tahun_cetak,$asal_usul,$harga,$keterangan)
    {
        $query = "INSERT INTO kib_e (nama_barang,kode_barang,nomor_register,judul,spesifikasi,asal_daerah,pencipta,bahan,jenis,ukuran,jumlah,tahun_cetak,asal_usul,harga,keterangan) VALUES ('".$nama_barang."','".$kode_barang."','".$nomor_register."','".$judul."','".$spesifikasi."','".$asal_daerah."','".$pencipta."','".$bahan."','".$jenis."','".$ukuran."','".$jumlah."','".$tahun_cetak."','".$asal_usul."','".$harga."','".$keterangan."')";
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

	public function tampil_KIBE()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_e";
        $outp ='';
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
					$outp .= "<td>".$row['nama_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['judul']."</td>";
                    $outp .= "<td>".$row['spesifikasi']."</td>";
                    $outp .= "<td>".$row['asal_daerah']."</td>";
                    $outp .= "<td>".$row['pencipta']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
					$outp .= "<td>".$row['jenis']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['jumlah']."</td>";
                    $outp .= "<td>".$row['tahun_cetak']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibE($row['harga'])."</td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibE.php?id_kibE=".$row['id_kibE']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKIBE.php?id_kibE='.$row['id_kibE'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="17" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="17" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}

	public function format_uangkibE($data){
		return number_format($data,2,',','.');
	}

	public function hargaKIBE() {

        $query = $this->db->prepare("SELECT sum(harga) as jumlah FROM kib_e");
        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangkibE($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

	public function ubah_KIBE ($id_kibE,$nama_barang,$kode_barang,$nomor_register,$judul,$spesifikasi,$asal_daerah,$pencipta,$bahan,$jenis,$ukuran,$jumlah,$tahun_cetak,$asal_usul,$harga,$keterangan)
    {
        $query = "UPDATE kib_e SET nama_barang ='".$nama_barang."', kode_barang='".$kode_barang."',nomor_register='".$nomor_register."' ,judul='".$judul."', spesifikasi='".$spesifikasi."' ,asal_daerah='".$asal_daerah."' ,pencipta='".$pencipta."' ,bahan='".$bahan."',jenis='".$jenis."',ukuran='".$ukuran."', jumlah='".$jumlah."', tahun_cetak='".$tahun_cetak."' ,asal_usul='".$asal_usul."' ,harga='".$harga."' ,keterangan='".$keterangan."' WHERE id_kibE='".$id_kibE."'";
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

	public function cetak_kibE($kolom,$id_kibE){
        $query = "SELECT ".$kolom." FROM kib_e WHERE id_kibE=".$id_kibE." limit 1";
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
	

	public function hapus_KIBE($id_kibE)
	{
		$query = "DELETE FROM kib_e WHERE id_kibE ='".$id_kibE."' ";
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

	public function tampil_pdf_KIBE()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_e";
        $outp ='';
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
					$outp .= "<td>".$row['nama_barang']."</td>";
					$outp .= "<td>".$row['kode_barang']."</td>";
					$outp .= "<td>".$row['nomor_register']."</td>";
					$outp .= "<td>".$row['judul']."</td>";
                    $outp .= "<td>".$row['spesifikasi']."</td>";
                    $outp .= "<td>".$row['asal_daerah']."</td>";
                    $outp .= "<td>".$row['pencipta']."</td>";
                    $outp .= "<td>".$row['bahan']."</td>";
					$outp .= "<td>".$row['jenis']."</td>";
                    $outp .= "<td>".$row['ukuran']."</td>";
                    $outp .= "<td>".$row['jumlah']."</td>";
                    $outp .= "<td>".$row['tahun_cetak']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibE($row['harga'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="16" align="center">data kosong</td></tr>';
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

	public function tambah_kibF($jenis_barang,$bangunan,$bertingkat,$beton,$luas,$letak,$tanggal,$nomor,$tahun_mulai,$status_tanah,$nomor_kodetanah,$asal_usul,$nilai_kontrak,$keterangan)
    {
        $query = "INSERT INTO kib_f (jenis_barang,bangunan,bertingkat,beton,luas,letak,tanggal,nomor,tahun_mulai,status_tanah,nomor_kodetanah,asal_usul,nilai_kontrak,keterangan) VALUES ('".$jenis_barang."','".$bangunan."','".$bertingkat."','".$beton."','".$luas."','".$letak."','".$tanggal."','".$nomor."','".$tahun_mulai."','".$status_tanah."','".$nomor_kodetanah."','".$asal_usul."','".$nilai_kontrak."','".$keterangan."')";
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


	public function tampil_KIBF()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_f";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['bangunan']."</td>";
					$outp .= "<td>".$row['bertingkat']."</td>";
					$outp .= "<td>".$row['beton']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
                    $outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
					$outp .= "<td>".$row['tahun_mulai']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_kodetanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibF($row['nilai_kontrak'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a href='../view/ubah_kibF.php?id_kibF=".$row['id_kibF']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusKIBF.php?id_kibF='.$row['id_kibF'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="17" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="16" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}

	public function format_uangkibF($data){
		return number_format($data,2,',','.');
	}

	public function hargaKIBF() {

        $query = $this->db->prepare("SELECT sum(nilai_kontrak) as jumlah FROM kib_f");
        try{ $query->execute();     

         $rows =  $query->fetch();
         return $this->format_uangkibF($rows['jumlah']);

         } catch (PDOException $e){die($e->getMessage());}  

    }

	public function ubah_KIBF ($id_kibF,$jenis_barang,$bangunan,$bertingkat,$beton,$luas,$letak,$tanggal,$nomor,$tahun_mulai,$status_tanah,$nomor_kodetanah,$asal_usul,$nilai_kontrak,$keterangan)
    {
        $query = "UPDATE kib_f SET jenis_barang ='".$jenis_barang."', bangunan='".$bangunan."',bertingkat='".$bertingkat."' ,beton='".$beton."', luas='".$luas."' ,letak='".$letak."' ,tanggal='".$tanggal."' ,nomor='".$nomor."',tahun_mulai='".$tahun_mulai."',status_tanah='".$status_tanah."', nomor_kodetanah='".$nomor_kodetanah."',asal_usul='".$asal_usul."' ,nilai_kontrak='".$nilai_kontrak."' ,keterangan='".$keterangan."' WHERE id_kibF='".$id_kibF."'";
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

	public function cetak_kibF($kolom,$id_kibF){
        $query = "SELECT ".$kolom." FROM kib_f WHERE id_kibF=".$id_kibF." limit 1";
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
	
	public function hapus_KIBF($id_kibF)
	{
		$query = "DELETE FROM kib_f WHERE id_kibF ='".$id_kibF."' ";
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

	public function tampil_pdf_KIBF()
    {
		$noUrut = 1;
        $query = "SELECT * FROM kib_f";
        $outp ='';
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
					$outp .= "<td>".$row['jenis_barang']."</td>";
					$outp .= "<td>".$row['bangunan']."</td>";
					$outp .= "<td>".$row['bertingkat']."</td>";
					$outp .= "<td>".$row['beton']."</td>";
                    $outp .= "<td>".$row['luas']."</td>";
                    $outp .= "<td>".$row['letak']."</td>";
                    $outp .= "<td>".$row['tanggal']."</td>";
                    $outp .= "<td>".$row['nomor']."</td>";
					$outp .= "<td>".$row['tahun_mulai']."</td>";
                    $outp .= "<td>".$row['status_tanah']."</td>";
                    $outp .= "<td>".$row['nomor_kodetanah']."</td>";
                    $outp .= "<td>".$row['asal_usul']."</td>";
                    $outp .= "<td>Rp. ".$this->format_uangkibF($row['nilai_kontrak'])."</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "</tr>";
				}
			} else{
				$outp = '<tr><td colspan="16" align="center">data kosong</td></tr>';
			}
		}

	    catch(PDOException $e)
			{
				$outp = '<tr><td colspan="16" align="center">data error</td></tr>';
				return $outp;
				// echo $e->getMessage();
			}
		return $outp;
	}


	


}
?>