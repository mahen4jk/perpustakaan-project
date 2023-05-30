@extends('halindex.temp_index')

@section('title')
    {{ 'Visi & Misi' }}
@endsection

@section('style')
    <style>
        .heading-container {
            padding-top: 100px;
            padding-left: 218px;
            padding-right: 218px;
        }
    </style>
@endsection

@section('jumbotron')
    <div class="jumbotron jumbotron-fluid jmb-vision">
        <div class="container">
            <h1 class="display-4">Visi & Misi</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-2">
            <div class="box">
                <a href="{{ url('profile') }}" class="list-group-item list-group-item-action">
                    Sejarah
                </a>
                <a href="{{ url('visimisi') }}"
                    class="list-group-item list-group-item-action {{ Request()->is('visimisi') ? 'active-list' : '' }}">Visi
                    dan Misi</a>
                <a href="#" class="list-group-item list-group-item-action">Struktur Organisasi</a>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="box-visimisi">
                <h1></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item {{ Request()->is('profile') ? 'active' : '' }}">
                        Profile
                    </li>
                </ol>
                <div class="row">
                    <div class="col-lg">
                        <div class="card-body card-visi">
                            <h5 class="card-title title-visi">
                                <i class="fa-regular fa-eye"></i>
                                &nbsp;Visi
                            </h5>
                            <p class="card-text text-visi">
                                <span>unggul dalam prestasi, iptek, berbudi pekerti luhur,
                                    berbudaya lingkungan dilandasi iman dan taqwa</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="card-body card-misi">
                            <h5 class="card-title title-misi">
                                <i class="fa-solid fa-rocket"></i>
                                &nbsp;Misi
                            </h5>
                            <p class="card-text text-misi">
                                <li class="list">
                                    Meningkatkan perolehan nilai ujian nasional (NUN) yang maksimal.
                                </li>
                                <li>
                                    Menumbuhkan daya saing yang tinggi dalam melanjutkan pendidikan ke jenjang satu tingkat
                                    lebih tinggi.
                                </li>
                                <li>
                                    Meraih10 besar tingkat kabupaten dalam lomba Olimpiade Sain dan Matematika (OSN).
                                </li>
                                <li>
                                    Meraih 5 besar tingkat kabupaten dalam lomba Olimpiade IPS.
                                </li>
                                <li>
                                    Meraih 5 besar tingkat kabupaten dalam lomba O2SN.
                                </li>
                                <li>
                                    Mempertahankan juara 1 FLS2N tingkat kabupaten bidang vokal grup dan baca puisi.
                                </li>
                                <li>
                                    Meraih 10 besar lomba kreatifitas tingkat kabupaten.
                                </li>
                                <li>
                                    Melaksanakan proses pembelajaran yang aktif, inovatif, kreatif, efektif dan menyenangkan
                                    (PAIKEM) dengan
                                    pendekatan saintifik.
                                </li>
                                <li>
                                    Melaksanakan pengembangan fasilitas dan sarana prasarana pendidikan yang memadai dan
                                    inovatif.
                                </li>
                                <li>
                                    Melaksanakan pengembangan kelembagaan dan management yang komprehensif.
                                </li>
                                <li>
                                    Melaksanakan pembiayaan pendidikan dengan prinsip berkeadilan secara transparan dan
                                    akuntabel.
                                </li>
                                <li>
                                    Meningkatkan kualitas sumber daya manusia yang profesional dan menguasai IPTEK.
                                </li>
                                <li>
                                    Mewujudkan warga sekolah yang bertaqwa kepada TuhanYang Maha Esa.
                                </li>
                                <li>
                                    Meningkatkan pelaksanaan pembiasaan aktifitas keagamaan secara optimal.
                                </li>
                                <li>
                                    Menumbuhkembangkan warga sekolah berkepedulian sosial tinggi, saling menghormati, saling
                                    menghargai,
                                    saling membantu, penuh toleransi, dan budaya 5 S.
                                </li>
                                <li>
                                    Mengkondisikan tatanan warga sekolah untuk berdisiplin dan berbudi pekerti luhur melalui
                                    keteladanan
                                    sikap, perilaku dan tindakan, serta dilaksanakan kantin kejujuran.
                                </li>
                                <li>
                                    Mengkondisikan warga sekolah yang peduli terhadap kelestarian, keserasian, dan
                                    kemanfaatan serta
                                    keseimbangan lingkungan.
                                </li>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
