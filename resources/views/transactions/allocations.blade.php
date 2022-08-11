@extends('layouts.app')
<div class="flex h-screen antialiased">
    @include('layouts.letfbar')
    <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
    @include('layouts.topnav')
    <div class="container p-3">
      <div class="card-header p-3 bg-orange-300 mb-4 rounded-full w-3/12 text-center">
        <h5 class="font-semibold">Product Allocations</h5>
      </div>
    <table class="cell-border table mt-3" id="example">
      <thead>
        <tr>
          <th>Date</th>
          <th>Transaction Code</th>
          <th>Product  Code</th>
          <th>Quantity</th>
          <th>Value</th>
          <th>User</th>
          <th>Origin</th>
          <th>Destination</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          @foreach ($transactions as $transaction )
        <tr class="even:bg-green-400 odd:bg-green-100 even:text-white">
          <td>{{$transaction->date}}</td>
          <td>{{$transaction->transaction_code}}</td>
          <td>{{$transaction->product_code}}</td>
          <td>{{$transaction->count}}</td>
          <td>{{$transaction->value}}</td>
          <td>{{$transaction->user}}</td>
          <td>{{$transaction->origin}}</td>
          <td>{{$transaction->dest}}</td>
          <td><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Explore
          </button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.dataTables.js"></script>
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
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollY":        "700px",
        "scrollCollapse": true
        
        });
});
</script>