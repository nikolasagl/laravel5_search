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
        </style>
    </head>
    <body>

      <div class="card header">

        <div class="card-header">
          <p><i class="fas fa-search"></i> Buscar</p>
        </div>

        <div class="card-body">
          <div class="row">

            <div class="input-group col-md-4">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>

              <input class="form-control" type="text" name="nome" value="" placeholder="Nome | CPF | Email">
            </div>

            <div class="input-group col-md-4">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-calendar-alt"></i>
                </span>
              </div>

              <input class="form-control" type="text" name="data_inicio" value="" placeholder="Data Inicio">
            </div>

            <div class="input-group col-md-4">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-calendar-alt"></i>
                </span>
              </div>

              <input class="form-control" type="text" name="data_dim" value="" placeholder="Data Fim">
            </div>

          </div>
        </div>

      </div>

      <div class="card content">

        <div class="card-header">
          <h1>Tabela</h1>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="tabela" class="table table-sm table-collapse table-hover table-striped table-bordered">

              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">CPF</th>
                  <th scope="col">Email</th>
                  <th scope="col">Data Nascimento</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($data as $key => $individuo)
                  <tr>
                    <th scope="row">{{ $individuo->id }}</th>
                    <td>{{ ucwords(mb_strtolower($individuo->nome)) }}</td>
                    <td>{{ $individuo->cpf }}</td>
                    <td>{{ $individuo->email }}</td>
                    <td>{{ $individuo->data_nascimento }}</td>
                  </tr>
                @endforeach
              </tbody>

            </table>

            <div class="text-center text-secondary border-top py-3">
              <h5>Paginação</h5>
            </div>

            {{ $data->links() }}

          </div>
        </div>

      </div>

      <div class="card footer">
        <h1>footer</h1>
      </div>

      <script src="{{ asset('resources/assets/plugins/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('resources/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('resources/assets/plugins/fontawesome/js/all.min.js') }}"></script>

      <script type="text/javascript">
        $(document).ready(function() {
          $('#tabela').DataTable()
        })
      </script>
    </body>
</html>
