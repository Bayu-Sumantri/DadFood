@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
@endif

@if(session('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('error') }}
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


{{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> --}}
