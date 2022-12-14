@extends('layouts.app')
<div class="flex h-screen antialiased">
    @include('layouts.letfbar')
    <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
      @include('layouts.topnav')
    <div class="container p-3">
    <table class="cell-border table" id="example">
      <thead>
        <tr>
          <th>Product Code</th>
          <th>Product  Name</th>
          <th>Brand</th>
          <th>Quantity</th>
          <th>Unit Cost</th>
          <th>Available Stock</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          @foreach ($products as $product )
        <tr class="even:bg-green-400 odd:bg-green-100 even:text-white">
          <td>{{$product->code}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->brand}}</td>
          <td>{{$product->quantity.$product->units}}</td>
          <td>{{$product->unit_cost}}</td>
          @if($product->category == 'Grocery')
          <td>{{$product->quantity}}</td>
          @else
          <td>{{$product->count}}</td>
          @endif
          <td><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Edit
          </button></td>
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
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollY":        "700px",
        "scrollCollapse": true
        
        });
});
</script>