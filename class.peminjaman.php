<?php
class peminjaman{

    private $db;

    function __construct($DB_con)
	{
		$this->db = $DB_con;
    }
    
    public function tanggal($mydate)
	{
		return date("d-m-Y", strtotime($mydate) );
    }

    public function tambah_peminjaman($id_peminjam,$nama_peminjam, $merk_id, $ruangan, $tanggal_peminjaman, $kondisi_awal, $tanggal_pengembalian, $jumlah, $keterangan) 
    {
        $query = "INSERT INTO list_peminjaman (id_peminjam, nama_peminjam, merk_id, ruangan, tanggal_peminjaman, kondisi_awal, tanggal_pengembalian, jumlah, keterangan) VALUES ('".$id_peminjam."','".$nama_peminjam."','".$merk_id."', '".$ruangan."', '".$tanggal_peminjaman."', '".$kondisi_awal."', '".$tanggal_pengembalian."', '".$jumlah."' , '".$keterangan."')";
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
            //  $outp = false;
            //  return $outp;
            return $e->getMessage();
        }
         return $outp;
    }


    public function generateRandomString($length = 5) 
    {
      $characters = '0123456789';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString; 
    }

    public function tampil_peminjamanAdmin()
    {
        $noUrut = 1;
        $query = "SELECT * FROM list_peminjaman";
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
					$outp .= "<td>".$row['nama_peminjam']."</td>";
					$outp .= "<td>".$this->cetak_stok('nama_barang',$row['merk_id'])."</td>";
					$outp .= "<td>".$this->cetak_stok('merk',$row['merk_id'])."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
					$outp .= "<td>".$this->tanggal($row['tanggal_peminjaman'])."</td>";
                    $outp .= "<td>".$row['kondisi_awal']."</td>";
					$outp .= "<td>".$this->tanggal($row['tanggal_pengembalian'])."</td>";
					$outp .= "<td>".$row['jumlah']." Unit </td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td><a class='btn btn-primary' href='../view/detail.php?id_peminjam=".$row['id_peminjam']."' role='button'>Detail</a></td>";
					$outp .= "<td><a href='../view/ubah_peminjaman.php?id_peminjam=".$row['id_peminjam']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapuspeminjaman.php?id_peminjam='.$row['id_peminjam'].'"';
					$outp .= "<td><a onclick='myhapus(".$konddata.")' class='btn btn-danger btn-circle btn-mb' style='color:white;'> <i class='fas fa-trash'></i></a></td>";
					$outp .= "<td>".$row['status']."</td>";
					$outp .= "<td><a href='./pdf/document/cetak_surat.php?id_peminjam=".$row['id_peminjam']."' class='btn btn-primary btn-circle btn-mb'> <i class='fas fa-print'></i></a></td>";
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
	
	public function cetak_peminjamanAdmin()
    {
        $noUrut = 1;
        $query = "SELECT * FROM list_peminjaman";
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
					$outp .= "<td>".$row['nama_peminjam']."</td>";
					$outp .= "<td>".$this->cetak_stok('nama_barang',$row['merk_id'])."</td>";
					$outp .= "<td>".$this->cetak_stok('merk',$row['merk_id'])."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
					$outp .= "<td>".$this->tanggal($row['tanggal_peminjaman'])."</td>";
                    $outp .= "<td>".$row['kondisi_awal']."</td>";
					$outp .= "<td>".$this->tanggal($row['tanggal_pengembalian'])."</td>";
					$outp .= "<td>".$row['jumlah']." Unit </td>";
					$outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td>".$row['status']."</td>";
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


    public function tampil_peminjamanUser()
    {
        $noUrut = 1;
        $query = "SELECT * FROM list_peminjaman";
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
					$outp .= "<td>".$row['nama_peminjam']."</td>";
					$outp .= "<td>".$this->cetak_stok('nama_barang',$row['merk_id'])."</td>";
					$outp .= "<td>".$this->cetak_stok('merk',$row['merk_id'])."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
					$outp .= "<td>".$this->tanggal($row['tanggal_peminjaman'])."</td>";
                    $outp .= "<td>".$row['kondisi_awal']."</td>";
					$outp .= "<td>".$this->tanggal($row['tanggal_pengembalian'])."</td>";
					$outp .= "<td>".$row['jumlah']." Unit</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td>".$row['status']."</td>";
					$outp .= "<td><a href='' class='btn btn-primary btn-circle btn-mb'> <i class='fas fa-print'></i></a></td>";
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

    public function tampil_peminjaman2()
    {
        $noUrut = 1;
        $query = "SELECT * FROM list_peminjaman";
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
					$outp .= "<td>".$row['nama_peminjam']."</td>";
					$outp .= "<td>".$this->cetak_stok('nama_barang',$row['merk_id'])."</td>";
					$outp .= "<td>".$this->cetak_stok('merk',$row['merk_id'])."</td>";
                    $outp .= "<td>".$row['ruangan']."</td>";
					$outp .= "<td>".$this->tanggal($row['tanggal_peminjaman'])."</td>";
                    $outp .= "<td>".$row['kondisi_awal']."</td>";
					$outp .= "<td>".$this->tanggal($row['tanggal_pengembalian'])."</td>";
					$outp .= "<td>".$row['jumlah']." Unit</td>";
                    $outp .= "<td>".$row['keterangan']."</td>";
					$outp .= "<td>".$row['status']."</td>";
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


    public function edit_peminjaman($id_peminjam,$nama_peminjam, $merk_id, $ruangan, $tanggal_peminjaman, $kondisi_awal, $tanggal_pengembalian, $jumlah, $keterangan)
    {
        $query = "UPDATE list_peminjaman SET nama_peminjam ='".$nama_peminjam."', merk_id='".$merk_id."',ruangan='".$ruangan."' , tanggal_peminjaman='".$tanggal_peminjaman."',kondisi_awal='".$kondisi_awal."',tanggal_pengembalian='".$tanggal_pengembalian."', jumlah ='".$jumlah."', keterangan='".$keterangan."' WHERE id_peminjam ='".$id_peminjam."'";
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
	
	public function tampil_detail($mysource, $id_peminjam)
    {
        $query = "SELECT ".$mysource." FROM list_peminjaman WHERE id_peminjam = ".$id_peminjam." limit 1";
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


    public function cetak_peminjaman($kolom,$id_peminjam){
        $query = "SELECT ".$kolom." FROM list_peminjaman WHERE id_peminjam=".$id_peminjam." limit 1";
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

    public function hapus_peminjaman($id_peminjam)
	{
		$query = "DELETE FROM list_peminjaman WHERE id_peminjam ='".$id_peminjam."' ";
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

    public function tambah_stok($id_stok, $jumlah, $nama_barang, $merk, $kondisi) 
    {
        $query = "INSERT INTO stok_barang (id_stok,jumlah, nama_barang, merk, kondisi) VALUES ('".$id_stok."','".$jumlah."','".$nama_barang."', '".$merk."', '".$kondisi."')";
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
            //  $outp = false;
            //  return $outp;
            return $e->getMessage();
        }
         return $outp;
    }

    public function tampil_stok()
    {
        $noUrut = 1;
        $query = "SELECT * FROM stok_barang";
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
					$outp .= "<td>".$row['nama_barang']."</td>";
					$outp .= "<td>".$row['merk']."</td>";
                    $outp .= "<td>".$row['jumlah']." Unit</td>";
                    $outp .= "<td>".$row['kondisi']."</td>";
					$outp .= "<td><a href='../view/ubah_stok.php?id_stok=".$row['id_stok']."' class='btn btn-primary btn-circle btn-mb'><i class='fas fa-edit'></i></a></td>";
					$konddata = '"../modal/m.hapusStok.php?id_stok='.$row['id_stok'].'"';
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
	

	public function tampil_barang()
    {
        $query = "SELECT * FROM stok_barang";
        $outp = '';
        try 
        {
            $stmt = $this->db->prepare($query);
			$stmt->execute();
			if($stmt->rowCount()>0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
                    $outp .= '<option value="'.$row['id_stok'].'">'.$row['nama_barang'].' ('.$row['merk'].')</option>';
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
	
	public function tampil_merk()
    {
        $query = "SELECT * FROM stok_barang";
        $outp = '';
        try 
        {
            $stmt = $this->db->prepare($query);
			$stmt->execute();
			if($stmt->rowCount()>0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
                    $outp .= '<option>'.$row['merk'].'</option>';
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


    public function edit_stok($id_stok,$jumlah,$nama_barang,$merk,$kondisi)
    {
        $query = "UPDATE stok_barang SET jumlah ='".$jumlah."', nama_barang='".$nama_barang."',merk='".$merk."',kondisi='".$kondisi."' WHERE id_stok ='".$id_stok."'";
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

	public function nama_barang($kolom){
        $query = "SELECT ".$kolom." FROM stok_barang";
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


    public function cetak_stok($target,$id_stok){
        $query = "SELECT ".$target." FROM stok_barang WHERE id_stok='".$id_stok."' limit 1";
		$outp = '';
		try
			{
                $stmt = $this->db->prepare($query);
				$stmt->execute();
		        if($stmt->rowCount()>0)
			    {
			        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			        {
				        $outp = $row[$target];
				        
					}
				}else{
					$outp = 'tidak ada';
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

    public function hapus_stok($id_stok)
	{
		$query = "DELETE FROM stok_barang WHERE id_stok ='".$id_stok."' ";
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
	
    public function update_pinjaman($peminjam,$barang,$statusdata) 
    {
        $query = "UPDATE list_peminjaman set status='".$statusdata."' where id_peminjam='".$peminjam."' and merk_id='".$barang."'";
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
            //  $outp = false;
            //  return $outp;
            return $e->getMessage();
        }
         return $outp;
    }
	
    public function update_stok($jumlah,$barang) 
    {
        $query = "UPDATE stok_barang set jumlah='".$jumlah."' where  id_stok='".$barang."'";
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
            //  $outp = false;
            //  return $outp;
            return $e->getMessage();
        }
         return $outp;
	}
	
	public function count_data($kondisi,$cetak, $tabledata){
        $query = "SELECT ".$kondisi." FROM ".$tabledata;
		$outp = '';
		try
			{
                $stmt = $this->db->prepare($query);
				$stmt->execute();
		        if($stmt->rowCount()>0)
			    {
			        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			        {
				        $outp = $row[$cetak];
				        
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

}
?>