    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    @if (config('backpack.base.meta_robots_content'))<meta name="robots" content="{{ config('backpack.base.meta_robots_content', 'noindex, nofollow') }}"> @endif

    <meta name="csrf-token" content="{{ csrf_token() }}" /> {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <title>{{ isset($title) ? $title.' :: '.config('backpack.base.project_name') : config('backpack.base.project_name') }}</title>

    @yield('before_styles')
    @stack('before_styles')

    <style type="text/css">
        .login-container { width: 1000px; margin: auto; display: flex; flex-wrap: wrap; flex-direction: row !important }
        .login-container .card-body { display: flex; }
        .col-left { width: 40%; border-right: 1px solid #455a64; }
        .col-right { width: 60%; }
        .login-container .box-body { padding: 20px 40px; }
        .login-container .box { margin-bottom: 0; }
        .login-title { font-size: 24px; font-weight: bold; }
        .login-caption { padding-left: 15px; }
        .logo-admin { text-align: center; }
        .logo-admin img { max-width: 100%; }
        .col-left-browser { width: 30%; border-right: 1px solid #455a64; }
        .col-right-browser { width: 70%; }
        @media (max-width: 1100px) {
            .login-container {
                margin-left: 24px;
                margin-right: 24px;
            }
        }
        @media (max-width: 700px) {
            .login-container .card-body { display: block; }
            .col-left { width: 100% !important; border-right: 0px solid #455a64; }
            .col-right { width: 100% !important; }
            .col-left-browser { width: 100% !important; border-right: 0px solid #455a64; }
            .col-right-browser { width: 100% !important; }
        }
    </style>

    @if (config('backpack.base.styles') && count(config('backpack.base.styles')))
        @foreach (config('backpack.base.styles') as $path)
        <link rel="stylesheet" type="text/css" href="{{ asset($path).'?v='.config('backpack.base.cachebusting_string') }}">
        @endforeach
    @endif

    @if (config('backpack.base.mix_styles') && count(config('backpack.base.mix_styles')))
        @foreach (config('backpack.base.mix_styles') as $path => $manifest)
        <link rel="stylesheet" type="text/css" href="{{ mix($path, $manifest) }}">
        @endforeach
    @endif

    @yield('after_styles')
    @stack('after_styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
