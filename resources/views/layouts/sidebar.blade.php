<ul class="nav">
    <li class="nav-item nav-profile">
        <div class="nav-link">
            <div class="user-wrapper">
                <div class="profile-image">
                    @if(Auth::user()->gambar == '')

                    <img src="{{asset('images/user/default.png')}}" alt="profile image">
                    @else

                    <img src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
                    @endif
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{Auth::user()->name}}</p>
                    <div>
                        <small class="designation text-muted"
                            style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                        <span class="status-indicator online"></span>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item {{ setActive(['/', 'home']) }}">
        <a class="nav-link" href="{{url('/')}}">
            <i class="menu-icon mdi mdi-television"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->level == 'admin')
    <li class="nav-item {{ setActive(['anggota*', 'user*', 'data_utama*', 'jenis_data*', 'input_data*']) }}">
        <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-content-copy"></i>
            <span class="menu-title">Data</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ setShow(['anggota*', 'user*', 'data_um*']) }}" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['user*']) }}" href="{{route('user.index')}}">Data User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['anggota*']) }}" href="{{route('anggota.index')}}">Data Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['data_um*']) }}" href="{{route('data_um.index')}}">Data UM</a>
                </li>
            </ul>
        </div>
    </li>
    @endif
    @if(Auth::user()->level == 'kepala bidang um')
    <li class="nav-item {{ setActive(['anggota*', 'user*', 'data_utama*', 'jenis_data*', 'input_data*']) }}">
        <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-content-copy"></i>
            <span class="menu-title">Data</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ setShow(['anggota*', 'user*', 'data_um*']) }}" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['data_um*']) }}" href="{{route('data_um.index')}}">Data UM</a>
                </li>
            </ul>
        </div>
    </li>
    @endif
    @if(Auth::user()->level == 'kepala dinas')
    <li class="nav-item {{ setActive(['anggota*', 'user*', 'data_utama*', 'jenis_data*', 'input_data*']) }}">
        <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-content-copy"></i>
            <span class="menu-title">Data</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ setShow(['anggota*', 'user*', 'data_um*']) }}" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['data_um*']) }}" href="{{route('data_um.index')}}">Data UM</a>
                </li>
            </ul>
        </div>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-surat_survei" aria-expanded="false" aria-controls="ui-surat_survei">
            <i class="menu-icon mdi mdi-email-outline"></i>
            <span class="menu-title">Surat Survei</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-surat_survei">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                    <a class="nav-link {{ setActive(['surat_survei*']) }}" href="{{route('surat_survei.index')}}">Surat Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['surat_keluar*']) }}" href="{{route('surat_keluar.index')}}">Surat Keluar</a>
                </li>
                
</div>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
            <i class="menu-icon mdi mdi-table"></i>
            <span class="menu-title">Laporan Data</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-laporan">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('laporan/data')}}">Cetak Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('rekap/data')}}">Rekap Data</a>
                </li>
            </ul>
        </div>
    </li>
</ul>