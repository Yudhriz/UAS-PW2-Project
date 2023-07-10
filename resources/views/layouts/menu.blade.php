	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					@if (!Auth::check())
                        <marquee class="left-top-bar" behavior="scroll" direction="left">
                            Diharapkan untuk Login / Register terlebih dahulu.
                        </marquee>
                    @else
                        <div class="left-top-bar">
                            Happy shopping
                        </div>
                    @endif

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('admin/dashboard') }}" class="flex-c-m trans-04 p-lr-25">My Account</a>
                            @else
                                <a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="flex-c-m trans-04 p-lr-25">Register</a>
                                @endif
                            @endauth
                        @endif
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="{{ url('/') }}" class="logo">
						<img src="{{ asset('home/images/icons/logo.png') }}" alt="IMG-LOGO">
                        <h3 style="font-family: 'EB Garamond'; color: black;">Suntronic Store</h3>
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
                            <li <?php echo (Request::is('/') ? 'class="active-menu"' : ''); ?>>
                                <a href="{{ url('/') }}">Home</a>
                            </li>

                            <li <?php echo (Request::is('products*') ? 'class="active-menu"' : ''); ?> class="label1" data-label1="hot">
                                <a href="{{ route('products.loadMore', ['page' => $produk->currentPage() + 1]) }}">Shop</a>
                            </li>

                            {{-- <li class="label1" data-label1="hot">
                                <a href="shoping-cart.html">Features</a>
                            </li> --}}

                            <li <?php echo (Request::is('about*') ? 'class="active-menu"' : ''); ?>>
                                <a href="/about">About</a>
                            </li>

                            <li <?php echo (Request::is('contact*') ? 'class="active-menu"' : ''); ?>>
                                <a href="/contact">Contact</a>
                            </li>
                        </ul>

					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="0">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>

                        <script>
                            // Fungsi untuk memperbarui nilai data-notify
                            function updateCartNotification(count) {
                                var cartIcon = document.querySelector('.js-show-cart');
                                cartIcon.setAttribute('data-notify', count);
                            }

                            @if (Auth::check())
                                updateCartNotification({{ $cart ? count($cart) : 0 }});
                            @else
                                updateCartNotification(0);
                            @endif
                        </script>

						<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="{{ url('/') }}">
				<img src="{{ asset('home/images/icons/logo.png') }}" alt="IMG-LOGO"></a>
                <a href="{{ url('/') }}">
				<h3 style="font-family: 'EB Garamond'; color: black;">Suntronic Store</h3></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="0">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

                <script>
                    // Fungsi untuk memperbarui nilai data-notify
                    function updateCartNotification(count) {
                        var cartIcon = document.querySelector('.js-show-cart');
                        cartIcon.setAttribute('data-notify', count);
                    }

                    @if (Auth::check())
                        updateCartNotification({{ $cart ? count($cart) : 0 }});
                    @else
                        updateCartNotification(0);
                    @endif
                </script>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					@if (!Auth::check())
                        <marquee class="left-top-bar" behavior="scroll" direction="left">
                            Diharapkan untuk Login / Register terlebih dahulu.
                        </marquee>
                    @else
                        <div class="left-top-bar">
                            Happy shopping
                        </div>
                    @endif

				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						@if (Route::has('login'))
                            @auth
                                <a href="{{ url('admin/dashboard') }}" class="flex-c-m trans-04 p-lr-25">My Account</a>
                            @else
                                <a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="flex-c-m trans-04 p-lr-25">Register</a>
                                @endif
                            @endauth
                        @endif
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
                <li <?php echo (Request::is('/') ? 'class="active-menu-m"' : ''); ?>>
                    <a href="{{ url('/') }}">Home</a>
                    {{-- <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span> --}}
                </li>

                <li <?php echo (Request::is('products*') ? 'class="active-menu-m"' : ''); ?>>
                    <a href="{{ route('products.loadMore', ['page' => $produk->currentPage() + 1]) }}" class="label1 rs1" data-label1="hot">Shop</a>
                </li>

                {{-- <li>
                    <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
                </li> --}}

                <li <?php echo (Request::is('about*') ? 'class="active-menu-m"' : ''); ?>>
                    <a href="/about">About</a>
                </li>

                <li <?php echo (Request::is('contact*') ? 'class="active-menu-m"' : ''); ?>>
                    <a href="/contact">Contact</a>
                </li>
            </ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{ asset('home/images/icons/icon-close2.png') }}" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
                    @if($cart !== null)
                        @foreach($cart as $c)
                            <li class="header-cart-item flex-w flex-t m-b-12">
                                <div class="header-cart-item-img">
                                    <img src="{{ asset('home/images/' . $c->produk->foto_produk) }}" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt p-t-8">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        {{ $c->produk->nama }}
                                    </a>

                                    <span class="header-cart-item-info">
                                        {{ $c->jumlah }} x {{ number_format($c->produk->harga, 0, ',', '.') }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    @endif

				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: Rp
                        @php
                            $total = 0;
                        @endphp
                        @if($cart !== null)
                        @foreach($cart as $c)
                            @php
                                $total += $c->jumlah * $c->produk->harga;
                            @endphp
                        @endforeach
                        {{ number_format($total, 0, ',', '.') }}
					</div>

					<div class="header-cart-buttons flex-w w-full">
                        @php
                            $lastUserId = null;
                        @endphp
                        @foreach($cart as $c)
                            @if($lastUserId !== $c->user_id)
                                <a href="{{ route('cart.show', $c->user_id) }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                    View Cart
                                </a>
                                <a href="{{ route('cart.show', $c->user_id) }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                    Check Out
                                </a>
                                @php
                                    $lastUserId = $c->user_id;
                                @endphp
                            @endif
                        @endforeach
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
