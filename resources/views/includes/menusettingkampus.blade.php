<div class="row">
      <div class="col-lg-12">
        <p>                        
            <a href="{{route('settings.kampus.general')}}" class="btn {{(\Request::route()->getName() == 'settings.kampus.general') ? '' : 'btn-outline'}} btn-success btn-bitbucket">
                <i class="fa fa-institution"></i> Umum
            </a>
            <a href="{{route('settings.kampus.jurusan')}}" class="btn {{(\Request::route()->getName() == 'settings.kampus.jurusan') ? '' : 'btn-outline'}} btn-success btn-bitbucket">
                <i class="fa fa-book"></i> Program Studi
            </a>
            <a href="{{route('settings.kampus.pembayaran')}}" class="btn {{(\Request::route()->getName() == 'settings.kampus.pembayaran') ? '' : 'btn-outline'}} btn-success btn-bitbucket">
                <i class="fa fa-money"></i> Pembayaran
            </a>
        </p>
      </div>
    </div>