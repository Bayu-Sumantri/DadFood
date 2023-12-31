  <!-- Sidebar Start -->
  <div class="sidebar pe-4 pb-3">
      <nav class="navbar bg-secondary navbar-dark">
          <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">
              <h3 class="text-primary"><i class="fas fa-cloud-meatball me-2"></i>BudheFood</h3>
          </a>
          <div class="d-flex align-items-center ms-4 mb-4">
              <div class="position-relative">
                  @if (auth()->user()->Profile)
                      <img class="rounded-circle"
                          src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->Profile) }}" alt=""
                          style="width: 40px; height: 40px;">
                  @else
                      <img class="rounded-circle" src="{{ asset('/admin/img/user.jpg') }}" alt=""
                          style="width: 40px; height: 40px;">
                  @endif
                  <div
                      class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                  </div>
              </div>
              <div class="ms-3">
                  @auth
                      <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                      <span>
                          @if (auth()->user()->hasRole('admin'))
                              <span>Admin</span>
                          @elseif(auth()->user()->hasRole('user'))
                              <span>User</span>
                          @else
                              <span>No Role</span>
                          @endif

                          {{-- bisa juga menggunakan ini
                          ini lebih singkt tapi code di atas melakukan pengecekan dulu baru di eksekusi
                          {{ auth()->user()->getRoleNames()->first() }} --}}
                      </span>
                  @endauth
              </div>
          </div>
          <div class="navbar-nav w-100">
              <a href="{{ url('dashboard') }}" class="nav-item nav-link active"><i
                      class="fas fa-chart-line me-2"></i>Dashboard</a>
              @role('admin')
                  <div class="nav-item dropdown">
                      <a href="{{ url('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                              class="fas fa-bars me-2"></i>Admin</a>
                      <div class="dropdown-menu bg-transparent border-0">
                          <a href="{{ route('Users.index') }}" class="dropdown-item">User's</a>
                          <a href="{{ route('create_menu') }}" class="dropdown-item">Menu Makanan</a>
                          <a href="{{ route('promomenu') }}" class="dropdown-item">Menu Promo</a>
                          <a href="{{ route('menu_show') }}" class=

                          "dropdown-item">Menu
                              Detail</a>
                          <a href="{{ route('pemesanan_show') }}" class="dropdown-item">Detail All Pemesanan</a>
                          <a href="{{ route('all_transaksi') }}" class="dropdown-item">All TRANSAKSI</a>
                          <a href="{{ route('booking_admin') }}" class="dropdown-item">All BOOKING</a>
                      </div>
                  </div>
              @endrole
          </div>

          @hasanyrole('admin|user')
              <div class="navbar-nav w-100">
                  <div class="nav-item dropdown">
                      <a href="{{ url('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                          <i class="fas fa-bars me-2"></i>Menu {User}
                      </a>
                      <div class="dropdown-menu bg-transparent border-0">
                          @role('admin')
                              {{-- Tambahkan opsi menu yang hanya dilihat oleh admin --}}
                              <a href="" class="dropdown-item">Menu Admin</a>
                          @endrole

                          {{-- Menu yang terlihat oleh user dan admin --}}
                          <a href="{{ route('pembelian_show') }}" class="dropdown-item">Pembelian</a>
                          <a href="{{ route('pemesanan_user') }}" class="dropdown-item">Pemesanan</a>
                          <a href="{{ route('transaksi_user_show') }}" class="dropdown-item">Transaksi</a>
                          <a href="{{ route('booking') }}" class="dropdown-item">Booking</a>
                      </div>
                  </div>
              </div>
          @endhasanyrole

  </div>
  </nav>
  </div>
  <!-- Sidebar End -->
