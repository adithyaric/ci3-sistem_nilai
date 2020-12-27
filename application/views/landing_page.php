<nav class="navbar navbar-light text-light" style="background-color: #f0f0f0;">
    <a class="navbar-brand">
        <img width="100px" src="<?= base_url('assets/img/logo.png') ?>" class="" alt="...">
        <strong>SMA N 1 Grabag</strong>
    </a>
    <span class="small">126734, Susukan, Grabag, Kec. Grabag, Magelang, Jawa Tengah 56196 - sma1grb@sma1grb.sch.id - (0293) 3148143</span>

    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        <a class="btn btn-outline-primary my-2 my-sm-0 ml-2" type="submit" href="<?= base_url('auth') ?>">Login</a>
    </form>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
            <a class="nav-link ml-3" href="#">BERANDA <span class="sr-only">(current)</span></a>
            <a class="nav-link ml-3" href="#">TENTANG SEKOLAH</a>
            <a class="nav-link ml-3" href="#">INFORMASI</a>
            <a class="nav-link ml-3" href="#">FASILITAS</a>
            <a class="nav-link ml-3" href="#">GALLERY</a>
            <a class="nav-link ml-3" href="#">KONTAK</a>
        </div>
    </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('assets/img/slider3.jpg') ?>" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="card text-center m-3">
    <div class="card-header">
        <strong>TENTANG SEKOLAH</strong>
    </div>
    <div class="card-body">
        <p class="card-text">
            <!-- <?php foreach ($tentang as $ttg) : ?>
                <?= word_limiter($ttg->sejarah, 75); ?>
            <?php endforeach; ?> -->
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia voluptatum assumenda impedit? Error quo, impedit quod voluptatum quia deserunt iure accusamus natus iusto cumque quos mollitia enim suscipit ea id.
        </p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Selengkapnya...
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tentang SEKOLAH</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                <!-- <?php foreach ($tentang as $ttg) : ?>

                    <p><strong>Sejarah Universitas Pekanbaru</strong>
                        <?= $ttg->sejarah; ?></p>

                    <p><strong>Visi Universitas Pekanbaru</strong>
                        <?= $ttg->visi; ?></p>

                    <p><strong>Misi Universitas Pekanbaru</strong>
                        <?= $ttg->misi; ?></p>
                <?php endforeach; ?> -->
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet saepe culpa illum voluptatem unde eveniet autem dolores numquam quidem alias? Cum voluptas iure non quam rerum consequuntur aut fugiat tenetur?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row m-2">
    <?php foreach ($informasi as $info) : ?>
        <div class="col-md-3">
            <div class="card">
                <span class="display-2 text-center text-info">
                    <i class="<?= $info->icon; ?>"></i>
                </span>
                <div class="card-body text-center">
                    <h5 class="card-title badge badge-primary"><?= $info->judul_informasi; ?></h5>
                    <p class="card-text"><?= $info->isi_informasi; ?></p>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#informasiModal">
                        Selengkapnya...
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div> -->

<!-- <form action="<?= base_url('landing_page/kirim_pesan') ?>" method="post">
    <div class="row mt-5 mb-5 ml-2 mr-2 justify-content-md-center">
        <div class="col-md-8">
            <div class="alert alert-primary">
                <i class="fas fa-envelope-open-text"></i> HUBUNGI KAMI
            </div>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control">
                <?= form_error('nama', '<div class="text-danger small">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
                <?= form_error('email', '<div class="text-danger small">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="">Pesan</label>
                <textarea name="pesan" id="" cols="30" rows="3" class="form-control"></textarea>
                <?= form_error('pesan', '<div class="text-danger small">', '</div>') ?>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </div>
</form> -->