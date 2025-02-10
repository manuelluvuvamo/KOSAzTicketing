<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" id="css-main" href="{{ asset('vendor/azticketing/css/dashmix.css')}}">
    <title>Erro Interno do Servidor</title>

    <meta name="description" content="Erro Interno do Servidor">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <!-- Icons -->

<body>
    <div id="page-container">
        <!-- Main Container -->
        <main id="main-container">
            <div id="page-container">

                <!-- Main Container -->
                <main id="main-container">

                    <!-- Page Content -->
                    <div class="bg-image"
                        style="background-image: url('{{ asset('vendor/azticketing/images/corridor-server-room-data-center.jpg') }}');">
                        <div class="hero bg-gd-sublime-op align-items-sm-end">
                            <div class="hero-inner">
                                <div class="content content-full">
                                    <div class="px-3 py-5 text-center text-sm-right">
                                        <div class="display-1 text-black font-w300">500</div>
                                        <h1 class="h2 font-w700 text-white mt-5 mb-3">Oops.. Ocorreu um erro no
                                            Servidor..</h1>
                                        <h2 class="h3 font-w400 text-white-75 mb-5">O seu pedido não pode ser satisfeito
                                            no momento...</h2>
                                        <a class="btn btn-hero-dark" href="{{ url('/') }}">
                                            <i class="fa fa-arrow-left mr-1"></i> Voltar
                                        </a>
                                        <a class="btn btn-hero-dark" href="{{ url('azticketing/report') }}" target="_blank">
                                            <i class="fa fa-bug mr-1"></i> Reportar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Page Content -->
                </main>
                <!-- END Main Container -->
            </div>
        </main>
        <!-- END Main Container -->
    </div>

    <script src="{{ asset('vendor/azticketing/js/dashmix.app.js') }}"></script>
</body>

</html>
