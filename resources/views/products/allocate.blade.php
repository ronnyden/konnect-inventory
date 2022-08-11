@extends('layouts.app')
<div class="flex h-screen container">
    @include('layouts.letfbar')
    <div class="card p-3 w-full">
        @if(session()->has('success'))
        <div class="card-header p-3 text-center bg-green-200">{{session()->get('success')}}</div>
        @else
        <div class="card-header p-3 text-center bg-green-200">Product Allocation</div>
        @endif
        <div class="card-body w-full">
            <form action="{{route('products/allocate')}}" method="POST">
                @csrf
                <div class="flex p-4">
                    <label class="block uppercase  tracking-wide text-gray-700 text-xs font-bold mb-2" >Choose Product</label>
                    <select 
                        name="code"
                        class="form-select appearance-none
                               ml-3
                                block
                                w-5/12
                                px-5
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
                      @foreach ($products as $product)
                        <option value={{$product->code}}>{{$product->name." ".$product->brand."-".$product->quantity.$product->units}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-2 p-4">
                    <div class="flex">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >from</label>
                        <select 
                            name="from"
                            class="form-select appearance-none
                                    block
                                    w-5/12
                                    ml-2
                                    px-5
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
                    <div class="flex mt-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >to</label>
                        <select 
                            name="to"
                            class="form-select appearance-none
                                    block
                                    w-5/12
                                    ml-5
                                    px-5
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
                </div>
                <div class="flex">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Quantity</label>
                    <input name="count"
                           class="
                           w-5/12
                           ml-3
                           appearance-none 
                           block w-full 
                           bg-gray-200 
                           text-gray-700 
                           border 
                           border-gray-200 
                           rounded py-3 
                           px-4 leading-tight 
                           focus:outline-none 
                           focus:bg-white 
                           focus:border-gray-500" 
                           id="grid-city" type="number" 
                           placeholder="quantity">
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-3" type="submit">
                    ALLOCATE
                </button>

            </form>
        </div>
    </div>
</div>