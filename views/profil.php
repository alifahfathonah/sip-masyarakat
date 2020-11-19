<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil Saya</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?=base_url('dashboard/update_profil');?>" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="hidden" name="idprofil" value="<?=$profil['iduser_profile'];?>">
                        <input type="hidden" name="iduser" value="<?=$profil['idusers'];?>">
                        <input type="text" class="form-control" name="nik" id="nik" value="<?=$profil['nik'];?>"
                            readonly>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                            value="<?=$profil['nama_lengkap'];?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                            value="<?=$profil['tempat_lahir'];?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                            value="<?=$profil['tanggal_lahir'];?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="Pria" <?=$profil['jenis_kelamin']=='Pria'?'selected':'';?>>Laki-Laki</option>
                            <option value="Wanita" <?=$profil['jenis_kelamin']=='Wanita'?'selected':'';?>>Perempuan
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="Islam" <?=$profil['agama']=='Islam'?'selected':'';?>>Islam</option>
                            <option value="Kristen Protestan" <?=$profil['agama']=='Kristen Protestan'?'selected':'';?>>
                                Kristen Protestan</option>
                            <option value="Kristen Katholik" <?=$profil['agama']=='Kristen Katholik'?'selected':'';?>>
                                Kristen Katholik</option>
                            <option value="Hindu" <?=$profil['agama']=='Hindu'?'selected':'';?>>Hindu</option>
                            <option value="Budha" <?=$profil['agama']=='Budha'?'selected':'';?>>Budha</option>
                            <option value="Konghucu" <?=$profil['agama']=='Konghucu'?'selected':'';?>>Konghucu</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="5"
                            class="form-control"><?=$profil['alamat'];?></textarea>
                    </div>
                </div>
                <hr>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="<?=$profil['username'];?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" minlength="6">
                        <span class="text-danger" style="font-size:10pt;">Biarkan kosong jika tidak ingin merubah
                            password</span>
                    </div>
                </div>
                <div class="p-3 float-right">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan
                        Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>