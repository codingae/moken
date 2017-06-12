create view `view_ceksopken` AS select 
`peminjaman`.`id_peminjaman` AS `id_peminjaman`,
`peminjaman`.`nipeg` AS `nipeg`,
`peminjaman`.`berangkat` AS `berangkat`,
`peminjaman`.`jam_berangkat` AS `jam_berangkat`,
`peminjaman`.`kembali` AS `kembali`,
`peminjaman`.`jam_kembali` AS `jam_kembali`,
`peminjaman`.`status` AS `status`,
`sopir`.`id_sopir` AS `id_sopir`,
`sopir`.`nama` AS `nama`,
`mobil`.`id_mobil` AS `id_mobil`,
`mobil`.`nopol` AS `nopol`
from (`kendaraan` join `peminjaman` on(`kendaraan`.`id_peminjaman` = `peminjaman`.`id_peminjaman`)
			 	   join `sopir` on(`kendaraan`.`id_sopir` = `sopir`.`id_sopir`)
			 	   join `mobil` on(`kendaraan`.`id_mobil` = `mobil`.`id_mobil`));