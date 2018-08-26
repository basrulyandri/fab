<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">                                
                            <a href="{{route('aplikan.saya')}}"><h5>Aplikan Saya</h5></a>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{jmlAplikanSaya()}}</h1>                                
                            <small>Orang</small>
                        </div>
                    </div>
                </div>                   

                <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                                <h5>Aplikan</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{\App\Aplikan::count()}}</h1>
                                
                                <small>Orang</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                                <h5>Daftar</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">75</h1>
                                
                                <small>Sudah bayar</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                                <h5>Registrasi</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">24</h1>
                                
                                <small>Orang</small>
                            </div>
                        </div>
            </div>
            </div>
        </div>
    </div>
</div>
