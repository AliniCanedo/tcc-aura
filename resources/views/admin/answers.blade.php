@extends('layouts.app')
@section('title', 'Listar Pergunta')

@section('content')
    <div class="row">
        <div class="col">
            <div class="table-responsive table-data-tables">
                <table class="table table-bordered table-striped table-hover" style="width: 100%;" id="the-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Matrícula</th>
                            <th>Criado em</th>
                            <th>Questão</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>
                </table> 
            </div>
        </div>
    </div>
@endsection
@section('css-includes')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@endsection
@section('javacript-includes')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.js" defer></script>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            var table = $('#the-table').DataTable({
                language: {
                    "url": "{{ asset('js/Portuguese-Brasil.json') }}"
                },
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.answers.list') !!}',
                columns: [{
                        data: 'id',
                        name: 'id',
                        className: 'text-center'
                    },
                    {
                        data: 'id_matricula',
                        name: 'id_matricula'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'classifications',
                        name: 'classifications'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        className: 'text-right'
                    }

                ],
                order: [
                    [1, 'desc']
                ],
                dom: '<"row mt-3"<"col-6"B><"col-6"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-4 mt-2"l><"col-sm-4"i><"col-sm-4 mt-2"p>>',
                // dom: '<"row mt-3"<"col-12"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
                scrollX: true,
                lengthMenu: [
                    [10, 25, 50, 100, 1000, 5000, 10000, 50000, -1],
                    ['10 linhas', '25 linhas', '50 linhas', '100 linhas', '1000 linhas', '5000 linhas',
                        '10000 linhas', '50000 linhas', 'Todos'
                    ]
                ],
                pageLength: 50,
                buttons: [{
                    'extend': 'print',
                    'text': 'Impressão',
                    'className': 'btn btn-primary btn-sm custom'
                }, {
                    'extend': 'excel',
                    'text': 'XLS',
                    'className': 'btn btn-primary btn-sm custom'
                }]
            });
        });
    </script>
@endsection
