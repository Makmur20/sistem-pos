					<?php 
						error_reporting(0);
						$b=$brg->row_array();
					?>
					<table>
						<tr>
		                    <th style="width:200px;"></th>
		                    <th>Nama Barang</th>		                   
		                    <th>Stok</th>
		                    <th>Harga(Rp)</th>
		                    <th>Diskon(Rp)</th>
		                    <th>Jumlah</th>
		                </tr>
						<tr>
							<td style="width:210px;margin-left:5px;"></th>
							<td><input type="text" name="nabar" value="<?php echo $b['nama_barang'];?>" style="width:250px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    
		                    <td><input type="text" name="stok" value="<?php echo $b['stok_barang'];?>" style="width:55px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="harjul" value="<?php echo number_format($b['harga_jual_barang']);?>" style="width:130px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
		                    <td><input type="number" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" style="width:130px;margin-right:5px;" required></td>
		                    <td><input type="number" name="qty" id="qty" value="1" min="1" max="<?php echo $b['stok_barang'];?>" class="form-control input-sm" style="width:100px;margin-right:5px;" required></td>
		                    <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
						</tr>
					</table>
					