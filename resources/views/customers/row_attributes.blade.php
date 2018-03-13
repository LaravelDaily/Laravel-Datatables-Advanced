@extends('layouts.app')

@section('content')
    <div class="panel-heading">Row details</div>
    <div class="panel-body">
        <table class="table table-bordered" id="customers-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@section('javascript')

    <script>
          $('#customers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('api.row_attributes') }}',
            columns: [
              { data: 'id', name: 'id' },
              { data: 'first_name', name: 'first_name' },
              { data: 'last_name', name: 'last_name' },
              { data: 'email', name: 'email' },
              { data: 'created_at', name: 'created_at' },
              { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
          });
    </script>
@endsection
