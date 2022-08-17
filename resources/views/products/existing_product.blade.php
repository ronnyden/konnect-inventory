@extends('layouts.app')
<div class="flex h-screen">
    @include('layouts.letfbar')
<div class="flex-1 h-full overflow-x-hidden overflow-y-scroll">
    @include('layouts.topnav')
<div class="block card p-6 rounded-lg shadow-lg bg-white  w-full">
    <div class="card-body justify-items-center">
        @if(session()->has('success'))
        <div class="card-header text-center bg-green-200 p-3">
            <h5 class="font-bold">{{session()->get('success')}}</h5>
        </div>
        @else
        <div class="card-header text-center bg-green-800 p-3">
            <h5 class="font-bold text-white uppercase">Add to Stock</h5>
        </div>
        @endif
    <form action="{{route('new_product')}}" method="POST">
        @csrf
     <div class="flex p-4 mt-3 ml-5">
         <div class="flex mr-3 p-2">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Category</label>
            <select  class="
            bg-gray-50 
            border 
            border-gray-300 
            text-gray-900 
            text-sm rounded-lg 
            focus:ring-blue-500 
            focus:border-blue-500 
            block w-full p-2.5 
            dark:bg-gray-700 
            dark:border-gray-600 
            dark:placeholder-gray-400
            dark:text-white 
            dark:focus:ring-blue-500 
            dark:focus:border-blue-500" name="category">
                      @foreach ($categories as $category)
                        <option value={{$category}}>{{$category}}</option>
                      @endforeach
        </select>
         </div>
         <div class="flex p-2 ml-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">UNITS</label>
            <select  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="units">
                @foreach ($units as $unit )
                    <option value="{{$unit}}">{{$unit}}</option>
                @endforeach
              </select>
         </div>
     </div>
     <div class="flex p-4 justify-items-center">
        <div class="flex">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">CHOOSE PRODUCT</label>
            <select  class="
            bg-gray-50 
            border 
            border-gray-300 
            text-gray-900 
            text-sm rounded-lg 
            focus:ring-blue-500 
            focus:border-blue-500 
            block w-full p-2.5 
            dark:bg-gray-700 
            dark:border-gray-600 
            dark:placeholder-gray-400
            dark:text-white 
            dark:focus:ring-blue-500 
            dark:focus:border-blue-500" name="product">
                      @foreach ($products as $product)
                        <option value={{$product->name}}>{{$product->name}}</option>
                      @endforeach
        </select>
            
        </div>
        <div class="flex ml-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">choose brand</label>
            <input type="text" class="form-control
            ml-2
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
            name="brand"
            placeholder="Product brand">
            
        </div>
     </div>
    
        <div class="flex ml-4 ">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Unit Cost</label>
            <input type="text" class="form-control
            ml-3
            block
            w-3/12
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
            name="unit_cost"
            placeholder="unit cost of product">
            
        </div>
        <div class="flex ml-4 mt-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Product count</label>
            <input type="text" class="form-control
            ml-3
            block
            w-3/12
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
            name="count"
            placeholder="Number of products">
            
        </div>
     </div>
      <button type="submit" class="
        align-content-center
        w-3/12
        mt-6
        px-6
        py-3
        bg-red-600
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
        ease-in-out">Add Product</button>
    </form>
    </div>
    <div class="border border-white-300 mb-2"></div>
    <div class="container shadow-md">
        <table class="cell-border table" id="example">
            <thead>
              <tr>
                <th>Code</th>
                <th>Product  Name</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Number of products</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
              <tr class="even:bg-amber-100 odd:bg-blue-100">
                <td>{{$product->code}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->brand}}</td>
                <td>{{$product->quantity.$product->units}}</td>
                <td>{{$product->unit_cost}}</td>
                <td>{{$product->count}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
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
