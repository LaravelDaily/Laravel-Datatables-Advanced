@extends('layouts.app')

@section('content')
    <div class="panel-heading">Column search</div>
    <div class="panel-body">
        <table class="table table-bordered" id="customers-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td class="non_searchable"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('javascript')
    <script>
      $('#customers-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('api.column_search') }}',
        columns: [
          { data: 'id', name: 'id' },
          { data: 'first_name', name: 'first_name' },
          { data: 'last_name', name: 'last_name' },
          { data: 'email', name: 'email' },
          { data: 'created_at', name: 'created_at' },
          { data: 'updated_at', name: 'updated_at' },
        ],
        initComplete: function () {
          this.api().columns().every(function () {
            var column = this;

            //example for removing search field
            if (column.footer().className !== 'non_searchable') {
              var input = document.createElement("input");
              $(input).appendTo($(column.footer()).empty())
              .keyup(function () {
                column.search($(this).val(), false, false, true).draw();
              });
            }
          });
        }
      });
    </script>
@endsection
