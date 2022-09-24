<header class="navigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.html"><img src="{{ asset('frontDist/images/logo.png') }}" alt="Egen"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item anasayfa">


                    <a class="nav-link" href="{{ route('front.anasayfa') }}" id="anasayfaBtn">Anasayfa</a>
                </li>

                @if (Route::current()->getName() != 'front.blog')
                    <li class="nav-item hizmetlerimiz">
                        <a id="hizmetlerimizBtn" class="nav-link">Hizmetlerimiz</a>
                    </li>
                    <li class="nav-item hakkimizda">
                        <a id="hakkimizdaBtn" class="nav-link">Hakkımızda</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.iletisim') }}">İletişim</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- /navigation -->
