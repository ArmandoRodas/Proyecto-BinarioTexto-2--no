<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor Binario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="header-container">
        <!-- Logo -->
        <img class="logo" src="https://umgnaranjo.com/wp-content/uploads/2020/05/UMG-logotipo.png" alt="Logo" class="logo"> 

        <!-- Título principal -->
        <h1  class="main-title" >Convertidor de Texto a Binario y Viceversa</h1>
    </div>

    <style>

    .header-container {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #99ffff; /* Color de fondo del div */
    padding: 20px;
    border-radius: 8px; /* Bordes redondeados, opcional */
    }

    .logo {
    margin-right: 15px; /* Espacio entre el logo y el título */
    max-height: 60px; /* Ajusta la altura máxima del logo */
    }

    .main-title {
    font-size: 24px;
    color: #333; /* Color del título */
    margin: 0; /* Elimina el margen del h1 */
    text-align: center;
    }
    </style>





    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        Ingrese el Texto o Binario
                    </div>
                    <div class="card-body">
                        <form id="convertForm" method="POST" action="{{ route('convert') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="inputText" class="form-label">Texto o Binario</label>
                                <textarea class="form-control" id="inputText" name="inputText" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="conversionType" class="form-label">Tipo de Conversión</label>
                                <select class="form-select" id="conversionType" name="conversionType" required>
                                    <option value="text-to-binary">Texto a Binario</option>
                                    <option value="binary-to-text">Binario a Texto</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Convertir</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div id="outputText" class="mt-3">
                            @if(isset($outputText))
                                <div class="alert alert-info" role="alert">
                                    Resultado: {{ $outputText }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
