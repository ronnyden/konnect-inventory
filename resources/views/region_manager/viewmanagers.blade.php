@extends('layouts.app')
<div class="flex h-screen antialiased">
    @include('layouts.letfbar')
    <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
        @include('layouts.topnav')
    <div class="container p-3">
    <table class="cell-border table" id="example">
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>ID No.</th>
          <th>Region</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          @foreach ($region_managers as $manager )
        <tr class="even:white odd:bg-gray-100 even:text-black-300">
          <td>{{$manager->fname."  ".$manager->lname}}</td>
          <td>{{$manager->phone}}</td>
          <td>{{$manager->email}}</td>
          <td>{{$manager->idnumber}}</td>
          <td>{{$manager->region}}</td>
          <td><button class="bg-orange-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
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