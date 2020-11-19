<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Persyaratan Surat</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#persyaratan">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50">NO</th>
                        <th>NAMA SURAT</th>
                        <th>PERSYARATAN</th>
                        <th width="50">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($persyaratan_all as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $row['nama_surat']; ?></td>
                        <td><?= $row['nama_syarat']; ?></td>
                        <td>
                            <a href="<?=site_url('master/persyaratan/delete/'.$row['idsurat_syarat']);?>"
                                class="btn btn-sm btn-danger btn-circle btn-hapus" data-toggle="tooltip"
                                data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="persyaratan" tabindex="-1" role="dialog" aria-labelledby="persyaratan" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?=site_url('master/persyaratan/add');?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="persyaratan">Tambah Persyaratan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="surat_id">Nama Surat <span class="text-danger">*</span></label>
                                <select name="surat_id" id="surat_id" class="form-control select2" style="width:100%;"
                                    required>
                                    <?php foreach(list_surat() as $row): ?>
                                    <option value="<?=$row['idsurat'];?>"><?= $row['nama_surat']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="nama_syarat">Nama Syarat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_syarat" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>