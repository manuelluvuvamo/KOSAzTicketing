<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportar um problema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .select2-container .select2-selection--multiple {
            height: auto !important;
            min-height: calc(3.5rem + calc(var(--bs-border-width)* 2))!important;
            line-height: 1.25!important;
        }

        .glass-card {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(209, 213, 219, 0.3);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #212529;
            box-shadow: none;
        }

        .form-floating label {
            color: #6c757d;
        }

        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label {
            color: #212529;
        }

    </style>
</head>

<body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center p-4">
        <div class="glass-card rounded-4 p-5 w-100" style="max-width: 42rem;">
            <div class="text-center mb-4">
                <h1 class="display-6 fw-semibold mb-2">Reportar um problema</h1>
                <p class="text-muted">Ajude-nos a melhorar, comunicando quaisquer problemas que encontre.</p>
            </div>

            <form id="bugReportForm" action="{{ route('azticketing.create') }}" class="needs-validation" novalidate method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" name="title" placeholder=" " required>
                    <label for="title">Titulo</label>
                    <div class="invalid-feedback">Indique um título.</div>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" id="exception" name="exceptionMessage" placeholder=" " style="height: 120px" readonly></textarea>
                    <label for="exception">Mensagem de exceção</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" id="observations" name="observations" placeholder=" " style="height: 120px"></textarea>
                    <label for="observations">Observações</label>
                </div>

                <button type="submit" class="btn btn-dark w-100 py-3">Enviar</button>
            </form>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toast" class="toast align-items-center text-white bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
