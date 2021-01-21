@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table" id="playerTable">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">No</th>
                        <th class="c-table__cell c-table__cell--head">Name</th>
                        <th class="c-table__cell c-table__cell--head">Total Point</th>
                        <th class="c-table__cell c-table__cell--head">Date</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#playerTable').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url:"{{route('admin_dashboard_datatable')}}",
                type:"GET",
            },
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false },
                {data: 'user.name', name: 'user.name', orderable: true },
                {data: 'total_point', name: 'total_point', orderable: true },
                {data: 'created_at', name: 'created_at', orderable: true },
            ]
        });

    </script>
@stop
