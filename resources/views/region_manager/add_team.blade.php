@extends('layouts.app')
<div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
    @include('layouts.letfbar')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
    @include('layouts.topnav')
<div class="bg-grey-light min-h-screen flex flex-col p-3">
   <div class="container  mx-auto flex-2 flex   justify-items-center px-3">
       <div class="bg-white px-6 py-8 rounded shadow-md items-center border border-top-green-400 text-black w-full">
           <h1 class="mb-8 text-3xl text-center">New Delivery Pesrsonel</h1>
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

           <form action="{{route('new_deliveryteam')}}" method="POST">
               @csrf
           <input 
               type="text"
               class="block border border-grey-light w-7/12 p-3 rounded mb-4 form-control "
               name="fname"
               placeholder="First Name" />
               @error('fname')
               <div class="bg-red-200 p-1 mb-2">{{$message}}</div>
               @enderror
           <input 
               type="text"
               class="block border border-grey-light  w-7/12 p-3 rounded mb-4 form-control "
               name="lname"
               placeholder="Last Name" />
               @error('lname')
               <div class="bg-red-200 p-1 mb-2">{{$message}}</div>
               @enderror

           <input 
               type="text"
               class="block border border-grey-light w-7/12 p-3 rounded mb-4"
               name="email"
               placeholder="Email"/>
               @error('email')
               <div class="bg-red-200 p-1 mb-2">{{$message}}</div>
               @enderror
          <input 
               type="text"
               class="block border border-grey-light w-7/12 p-3 rounded mb-4"
               name="idnumber"
               pattern="[0-9]{8}"
               placeholder="ID Number"/>
               
           <input 
               type="phone"
               pattern="[0-9]{10}"
               class="block border border-grey-light w-7/12 p-3 rounded mb-4"
               name="phone"
               placeholder="phone number" />
               @error('phone')
               <div class="bg-red-200 p-1 mb-2">{{$message}}</div>
               @enderror
               
                <div class="mb-3 xl:w-full">
                  <select class="form-select appearance-none
                    block
                    w-7/12
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

        
                   <button type="submit" class="bg-orange-700 hover:bg-blue-500 text-white font-bold py-2 px-4 justify-item-center mt-5 ml-5 rounded-full w-4/12">
                       Submit
                     </button>
           </form>
       </div>

       
   </div>
</div>