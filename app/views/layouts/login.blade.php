<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DMS-P</title>
        <link rel="stylesheet" href="/css/foundation.css" />
        <link rel="stylesheet" href="/css/custom.css" />
        <script src="/js/vendor/modernizr.js"></script>
    </head>
    <body>

        <div class="contain-to-grid">
            <nav class="top-bar" data-topbar data-options="is_hover: false">
                <ul class="title-area">
                    <li class="name">
                        <h1><a href="/">DMS-P</a></h1>
                    </li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
                </ul>
                <section class="top-bar-section">
                </section>
            </nav>
        </div>  

        <div class="row">

            <div class="small-12 columns">
                <ul class="breadcrumbs">
                    @yield('breadcrumbs')
                </ul>
            </div>

            <div class="small-12 columns">
                @yield('content')
            </div>
            
        </div>

        <script src="/js/vendor/jquery.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/foundation/foundation.abide.js"></script>
        <script src="/js/foundation/foundation.equalizer.js"></script>
        <script>
            $(document).foundation();
        </script>

        @yield('scripts')

    </body>
</html>
