@extends('layouts.app')
<div class="flex h-screen antialiased">
    @include('layouts.letfbar')
    <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
    @include('layouts.topnav')
    <div class="container p-3">
      <div class="card-header p-3 shadow-lg mb-4 rounded-full w-3/12 text-center">
        <h5 class="font-semibold uppercase text-orange-300">Procurement History</h5>
      </div>
    <table class="cell-border table mt-3" id="example">
      <thead>
        <tr>
          <th>Date</th>
          <th>Transaction Code</th>
          <th>Product  Code</th>
          <th>Product  name</th>
          <th>Quantity</th>
          <th>Stock Value</th>
          <th>User</th>
          <th>Origin</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          @foreach ($inventory as $transaction )
        <tr class="even:bg-gray-400 odd:bg-green-100 even:text-white">
          <td>{{$transaction->date}}</td>
          <td>{{$transaction->transaction_code}}</td>
          <td>{{$transaction->product_code}}</td>
          <td>{{$transaction->brand." ".$transaction->name}}</td>
          <td>{{$transaction->count}}</td>
          <td>{{$transaction->value}}</td>
          <td>{{$transaction->user}}</td>
          <td>{{$transaction->origin}}</td>
          <td><button class="px-6
            py-2.5
            bg-white
            text-green-400
            font-medium
            text-xs
            leading-tight
            uppercase
            rounded-full
            shadow-lg
            hover:bg-blue-700 hover:shadow-lg
            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
            active:bg-blue-800 active:shadow-lg
            transition
            duration-150
            ease-in-out" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
$('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
  editor.inline( this );
} );
</script>

<script>
$(document ).ready(function() {
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
        "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50, "All"]],
        "scrollY":        "700px",
        "scrollCollapse": true
        
        });
});
</script>