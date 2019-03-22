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
