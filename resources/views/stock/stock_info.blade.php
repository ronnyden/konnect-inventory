@extends('layouts.app')
<div class="flex h-screen">
    @include('layouts.letfbar')
<div class="flex-1 h-full overflow-x-hidden overflow-y-scroll">
    @include('layouts.topnav')
    <div class="container mt-3 p-3">
        <table class="cell-border table" id="example">
            <thead>
              <tr>
                <th>Region</th>
                <th>Product  Name</th>
                <th>Brand</th>
                <th>Available stock</th>
                <th>Stock value</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($available_stock as $stock )
              <tr class="even:bg-green-200 odd:bg-white shadow-lg p-4">
                <td>{{$stock->region}}</td>
                <td>{{$stock->product}}</td>
                <td>{{$stock->brand}}</td>
                <td>{{$stock->count}}</td>
                <td>{{$stock->stock_worth}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
  </div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
$( document ).ready(function() {
$('#example').DataTable({
    order: [[1, 'desc']],
    
		 "processing": true,
		 "dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel',
                    'csv'
                ]
            }
        ],
        "lengthMenu": [[5, 10,25, 50, -1], [5,10, 25, 50, "All"]],
        "scrollY":        "700px",
        "scrollCollapse": true
        
        });
});
</script>
