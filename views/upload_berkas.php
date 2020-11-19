<script>
function upload(id) {
    // alert(id);
    $("#form" + id).on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?=base_url('pengajuan/berkas');?>',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    title: 'Berhasil',
                    text: response,
                    icon: 'success',
                    allowOutsideClick: false
                });
                $('#berkas' + id).prop('disabled', true);
                $('#' + id).hide();
            }
        });
    });
}
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Unggah Berkas Persyaratan</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Perysaratan <?= $surat_byid['nama_surat']; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50">NO</th>
                        <th>PERSYARATAN</th>
                        <th width="400"></th>
                        <th width="120">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach(syarat_by_surat($surat_byid['surat_id']) as $row): ?>
                    <tr>
                        <form method="post" enctype="multipart/form-data" id="form<?=$row['idsurat_syarat'];?>">
                            <td><?= $n++; ?></td>
                            <td><?= $row['nama_syarat']; ?></td>
                            <td>
                                <input type="hidden" name="pengajuan_surat_id" value="<?=$this->uri->segment(3);?>">
                                <input type="hidden" name="surat_syarat_id" value="<?=$row['idsurat_syarat'];?>">
                                <input type="file" name="berkas" class="form-control"
                                    id="berkas<?=$row['idsurat_syarat'];?>"
                                    accept="image/png, image/jpg, image/jpeg, application/pdf"
                                    <?= (check_file($this->uri->segment(3),$row['idsurat_syarat'])==0)?'':'disabled'; ?>
                                    required>
                                <span class="text-danger" style="font-size:10pt;">Format file <b>.pdf .jpg .jpeg
                                        .png</b>,ukuran maksimal <b>2 MB</b></span>
                            </td>
                            <td>
                                <?php if(check_file($this->uri->segment(3),$row['idsurat_syarat'])==0): ?>
                                <button type="submit" class="btn btn-sm btn-primary" id="<?=$row['idsurat_syarat'];?>"
                                    onclick="upload(this.id)"><i class="fas fa-upload"></i> Unggah</button>
                                <?php endif; ?>
                            </td>
                        </form>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?=base_url('pengajuan/send_ajuan');?>" method="post">
                <input type="hidden" name="pengajuan_surat_id" value="<?=$this->uri->segment(3);?>">
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-paper-plane"></i> Kirim
                    Pengajuan</button>
            </form>
        </div>
    </div>
</div>