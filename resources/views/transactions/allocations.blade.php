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
          <th>Product  name</th>
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
          <td>{{$transaction->brand." ".$transaction->name}}</td>
          <td>{{$transaction->count}}</td>
          <td>{{$transaction->value}}</td>
          <td>{{$transaction->user}}</td>
          <td>{{$transaction->origin}}</td>
          <td>{{$transaction->dest}}</td>
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
          <!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
    <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
      <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Modal title</h5>
      <button type="button"
        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
        data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body relative p-4">
      Modal body text goes here.
    </div>
    <div
      class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
      <button type="button" class="px-6
        py-2.5
        bg-purple-600
        text-white
        font-medium
        text-xs
        leading-tight
        uppercase
        rounded
        shadow-md
        hover:bg-purple-700 hover:shadow-lg
        focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0
        active:bg-purple-800 active:shadow-lg
        transition
        duration-150
        ease-in-out" data-bs-dismiss="modal">Close</button>
      <button type="button" class="px-6
    py-2.5
    bg-blue-600
    text-white
    font-medium
    text-xs
    leading-tight
    uppercase
    rounded
    shadow-md
    hover:bg-blue-700 hover:shadow-lg
    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
    active:bg-blue-800 active:shadow-lg
    transition
    duration-150
    ease-in-out
    ml-1">Save changes</button>
    </div>
  </div>
</div>
</div>
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
$(document).ready(function() {
  editor = new $.fn.dataTable.Editor( {
      ajax: "../php/staff.php",
      table: "#example",
      fields: [ {
              label: "First name:",
              name: "first_name"
          }, {
              label: "Last name:",
              name: "last_name"
          }, {
              label: "Position:",
              name: "position"
          }, {
              label: "Office:",
              name: "office"
          }, {
              label: "Extension:",
              name: "extn"
          }, {
              label: "Start date:",
              name: "start_date",
              type: "datetime"
          }, {
              label: "Salary:",
              name: "salary"
          }
      ]
  } );
 
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