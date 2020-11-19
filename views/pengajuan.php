<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengajuan</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right">
            <span class="icon text-white-50">
                <i class="fas fa-print"></i>
            </span>
            <span class="text">Cetak</span>
        </a>
    </div> -->
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
                            <a href="<?=base_url('pengajuan/ubah/').$row['idpengajuansurat'];?>"
                                class="btn btn-sm btn-info btn-circle" data-toggle="tooltip" data-placement="top"
                                title="Ubah"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>