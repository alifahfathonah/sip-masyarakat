<script>
// File type validation
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<?php if(__session('level')=='admin'): ?>
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pengajuan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count_ajuan() ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pengajuan Baru</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count_ajuan('Pengajuan') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-plus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Pengajuan Dalam Proses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count_ajuan('Proses'); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-spinner fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pengajuan Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count_ajuan('Selesai'); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Content Row -->
<div class="row">
    <?php foreach(list_surat() as $row): ?>
    <div class="col-md-6">
        <div class="card mb-4 py-3 border-bottom-info">
            <form action="<?=base_url('pengajuan/create_ajuan');?>" method="post">
                <div class="card-body">
                    <h4><?= $row['nama_surat']; ?></h4>
                    <p><?= $row['keterangan']; ?></p>
                    <button class="btn btn-info btn-sm" type="button" data-toggle="collapse"
                        data-target="#syarat<?=$row['idsurat'];?>" aria-expanded="false"
                        aria-controls="syarat<?=$row['idsurat'];?>"><i class="fas fa-list"></i> Lihat
                        Syarat</button>
                    <div class="collapse mt-2 mb-4" id="syarat<?=$row['idsurat'];?>">
                        <div class="card card-body">
                            <ol>
                                <?php foreach(syarat_by_surat($row['idsurat']) as $syarat): ?>
                                <li><?= $syarat['nama_syarat']; ?></li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                    <input type="hidden" name="surat_id" value="<?=$row['idsurat'];?>">
                    <button type="submit" class="btn btn-primary btn-sm float-right" name="buat_ajuan"><i
                            class="fas fa-plus"></i>
                        Buat Ajuan</button>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
</div>