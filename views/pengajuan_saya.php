<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengajuan Saya</h1>
</div>
<p class="text-danger border-left-primary p-2">Jika status pengajuan surat anda telah <b>Selesai</b> maka surat dapat di
    ambil di
    kantor
</p>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50">NO</th>
                        <th>NIK</th>
                        <th>NAMA LENGKAP</th>
                        <th>NAMA SURAT</th>
                        <th>STATUS</th>
                        <th width="50">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($pengajuan_all as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $row['nik']; ?></td>
                        <td><?= $row['nama_lengkap']; ?></td>
                        <td><?= $row['nama_surat']; ?></td>
                        <td>
                            <?php if($row['status']=='Buat'): ?>
                            <span class="badge badge-dark"><?= $row['status']; ?></span>
                            <?php elseif($row['status']=='Pengajuan'): ?>
                            <span class="badge badge-info"><?= $row['status']; ?></span>
                            <?php elseif($row['status']=='Proses'): ?>
                            <span class="badge badge-primary"><?= $row['status']; ?></span>
                            <?php else: ?>
                            <span class="badge badge-success"><?= $row['status']; ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($row['status']=='Buat'): ?>
                            <a href="<?=base_url('pengajuan/upload_file/').$row['idpengajuansurat'];?>"
                                class="btn btn-sm btn-info btn-circle" data-toggle="tooltip" data-placement="top"
                                title="Selesaikan"><i class="fas fa-edit"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>