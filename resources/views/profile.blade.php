@extends('layouts.app')
@section('content')
<table id="example" class="stripe hover table table-bordered table-striped" style="width:100%; padding-top: 1em;  padding-bottom: 1em;" class="table table-striped">
    <thead>
        <tr>
            <th data-priority="1">Name</th>
            <th data-priority="2">Position</th>
            <th data-priority="3">Office</th>
            <th data-priority="4">Age</th>
            <th data-priority="5">Start date</th>
            <th data-priority="6">Salary</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>

        <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->

        <tr>
            <td>Donna Snider</td>
            <td>Customer Support</td>
            <td>New York</td>
            <td>27</td>
            <td>2011/01/25</td>
            <td>$112,000</td>
        </tr>
    </tbody>

</table>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
      $('#example').DataTable();
  } )
   </script>
