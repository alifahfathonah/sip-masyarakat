<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pengajuan <?= $ajuan_byid['nama_lengkap']; ?></h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="p-3">
        <a href="<?=base_url('pengajuan');?>" class="btn btn-secondary btn-icon-split btn-sm float-left">
            <span class="icon text-white-50">
                <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <?php if($ajuan_byid['status']=='Pengajuan'): ?>
        <a href="<?=base_url('pengajuan/proses/'.$ajuan_byid['idpengajuansurat']);?>"
            class="btn btn-primary btn-icon-split btn-sm float-right">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Proses</span>
        </a>
        <?php else: ?>
        <a href="<?=base_url('pengajuan/selesai/'.$ajuan_byid['idpengajuansurat']);?>"
            class="btn btn-success btn-icon-split btn-sm float-right">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Selesai</span>
        </a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td width="300">NIK</td>
                <td width="5">:</td>
                <td><?= $ajuan_byid['nik']; ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?= $ajuan_byid['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $ajuan_byid['tempat_lahir'].', '.date('d F Y,',strtotime($ajuan_byid['tanggal_lahir'])); ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $ajuan_byid['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?= $ajuan_byid['agama']; ?></td>
            </tr>
            <tr>
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td><?= $ajuan_byid['alamat']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                    <?php if($ajuan_byid['status']=='Buat'): ?>
                    <span class="badge badge-light"><?= $ajuan_byid['status']; ?></span>
                    <?php elseif($ajuan_byid['status']=='Pengajuan'): ?>
                    <span class="badge badge-info"><?= $ajuan_byid['status']; ?></span>
                    <?php elseif($ajuan_byid['status']=='Proses'): ?>
                    <span class="badge badge-primary"><?= $ajuan_byid['status']; ?></span>
                    <?php else: ?>
                    <span class="badge badge-success"><?= $ajuan_byid['status']; ?></span>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50">NO</th>
                        <th>PERSYARATAN</th>
                        <th>BERKAS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach(syarat_by_ajuan($ajuan_byid['idpengajuansurat']) as $row): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $row['nama_syarat']; ?></td>
                        <td>
                            <a href="<?=base_url('uploads/').$row['nama_berkas'];?>" target="_blank"
                                class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Lihat</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>