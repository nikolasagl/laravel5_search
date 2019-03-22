<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Busca</title>

        <link rel="stylesheet" href="{{ asset('resources/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('resources/assets/plugins/fontawesome/css/all.min.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: auto;
                width: 900px;
            }

            .header {
              margin-top:100px;
            }

            .footer {
              margin-bottom: 25px;
            }
        </style>
    </head>
    <body>

      <div class="card header">

        <div class="card-header">
          <h1><i class="fas fa-search"></i> Buscar</h1>
        </div>

        <div class="card-body">

          <form id="filterForm" action="{{ url('/search') }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">

              <div class="input-group col-md-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-user"></i>
                  </span>
                </div>

                <input class="form-control nome" type="text" name="nome" value="" placeholder="Nome | CPF | Email">
              </div>

              <div class="input-group col-md-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </span>
                </div>

                <input class="form-control data_inicio" type="text" name="data_inicio" value="" placeholder="Data Inicio">
              </div>

              <div class="input-group col-md-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </span>
                </div>

                <input class="form-control data_fim" type="text" name="data_fim" value="" placeholder="Data Fim">
              </div>

              <button class="col-md-2 btn btn-dark" id="filterFormSubmit" type="submit" name="filterFormSubmit">Buscar</button>

            </div>

          </form>

        </div>

      </div>

      <br>

      <div class="card content">

        @include('table')

      </div>

      <br>

      <div class="card footer">
        <h1>footer</h1>
      </div>

      <script src="{{ asset('resources/assets/plugins/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('resources/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('resources/assets/plugins/fontawesome/js/all.min.js') }}"></script>

      <script type="text/javascript">
        $(document).ready(function(e) {
          $('.data_inicio').mask('99/99/9999')
          $('.data_fim').mask('99/99/9999')
        })
      </script>

      <script type="text/javascript">
        $('#filterFormSubmit').click(function(e) {
          e.preventDefault()

          var url = $('#filterForm').attr('action')
          $.ajax({
            url: url,
            data: {
              nome: $('.nome').val(),
              data_inicio: $('.data_inicio').val(),
              data_fim: $('.data_fim').val()
            },
            success: function(data) {
              console.log(data);
              $('.content').html(data)
            }
          })
        })
      </script>

    </body>
</html>
