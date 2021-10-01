<div class="container mt-5">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-lg-6">
		  <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Data</button>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-lg-6">
		  <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
			<div class="input-group">
			  <input type="text" class="form-control" placeholder="Cari Mahasiwa" name="keyword" id="keyword" autocomplete="off">
			  <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
			</div>
		  </form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<h3>Daftar Mahasiwa</h3>
			<ul class="list-group">
			<?php foreach( $data['mhs']as $mhs) :?>
			  <li class="list-group-item">
			  	<?= $mhs['nama']; ?>
			  		<a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger text-dark float-right ml-1" onclick = "return confirm('Yakin?')">Hapus</a>	
			  		<a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-warning text-dark float-right ml-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">Edit</a>
			  		<a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge bg-info text-dark float-right ml-1">Detail</a>
			  	</li>
			<?php endforeach;?>
			</ul>		
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-closed" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="<?= BASEURL;?>/mahasiswa/tambah" method="post">
        <input type="hidden" name="id" id="id">
        	<div class="form-group">
			    <label for="nama">Nama</label>
			    <input type="text" class="form-control" id="nama" name="nama">
			</div>
			<div class="form-group">
			    <label for="nrp">NRP</label>
			    <input type="number" class="form-control" id="nrp" name="nrp">
			</div>
			<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
			</div>
			<div class="form-group">
				<label for="jurusan">Jurusan</label>
				<select class="form-control" id="jurusan" name="jurusan">
					 <option value="Teknik Mesin">Teknik Mesin</option>
					 <option value="Teknik Kimia">Teknik Kimia</option>
					 <option value="Teknik Elektro">Teknik Elektro</option>
					 <option value="Teknik Informatika">Teknik Informatika</option>
					 <option value="Teknik Lingkungan">Teknik Lingkungan</option>
					 <option value="Teknik Industri">Teknik Industri</option>
				</select>
			</div>

      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    	</form>
      </div>
    </div>
  </div>
</div>