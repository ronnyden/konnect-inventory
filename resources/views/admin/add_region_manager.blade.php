@extends('layouts.app')
 <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
    @include('layouts.letfbar')
    <div class="flex-1  h-full overflow-x-hidden overflow-y-auto">
        @include('layouts.topnav')
<div class="bg-grey-light min-h-screen flex  conyainer">
   <div class="container w-full max-w-lg flex-col mx-auto flex-1 flex  items-center justify-center px-2">
       <div class="bg-white px-6 py-8 rounded shadow-md border-top-green-400 text-black w-full">
           <h1 class="mb-8 text-3xl text-center">New Regional Manager</h1>
           @if(session()->has('success'))
               <div class="bg-green-100 border border-green-400 text-blue-700 text-center py-4 lg:px-3 mb-3">
                   <span class="font-semibold">{{session()->get('success')}}</span>
               </div>
           @endif
           @if (session()->has('error'))
           <div class="bg-green-100 border border-red-400 text-red-700 text-center py-4 lg:px-3 mb-3">
               <span class="font-semibold">{{session()->get('error')}}</span>
           </div>
           @endif

           <form action="{{route('add_region_manager')}}" method="POST">
               @csrf
           <input 
               type="text"
               class="block border border-grey-light w-full p-3 rounded mb-4 form-control "
               name="fname"
               placeholder="First Name" />
               @error('fname')
               <div class="bg-red-200 p-1 mb-2">{{$message}}</div>
               @enderror
           <input 
               type="text"
               class="block border border-grey-light  w-full p-3 rounded mb-4 form-control "
               name="lname"
               placeholder="Last Name" />
               @error('lname')
               <div class="bg-red-200 p-1 mb-2">{{$message}}</div>
               @enderror

           <input 
               type="text"
               class="block border border-grey-light w-full p-3 rounded mb-4"
               name="email"
               placeholder="Email"/>
               @error('email')
               <div class="bg-red-200 p-1 mb-2">{{$message}}</div>
               @enderror

           <input 
               type="phone"
               pattern="[0-9]{10}"
               class="block border border-grey-light w-full p-3 rounded mb-4"
               name="phone"
               placeholder="phone number" />
               @error('phone')
               <div class="bg-red-200 p-1 mb-2">{{$message}}</div>
               @enderror
               
                <div class="mb-3 xl:w-96">
                  <select class="form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Select Region" name="region">
                      @foreach ($regions as $region)
                        <option value={{$region}}>{{$region}}</option>
                      @endforeach
                  </select>
                </div>

        
                   <button type="submit" class="bg-orange-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full w-60">
                       Create User
                     </button>
           </form>
       </div>
   </div>
</div>
</div>
</div>