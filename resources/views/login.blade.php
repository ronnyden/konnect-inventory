@extends('layouts.app')
<section class="h-full gradient-form bg-gray-200 md:h-screen">
    <div class="container py-12 px-6 h-full">
      <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
        <div class="xl:w-86">
          <div class="block bg-white shadow-lg rounded-lg">
            <div class="lg:flex lg:flex-wrap g-0">
              <div class="lg:w-full px-4 md:px-0">
                <div class="md:p-12 md:mx-6">
                  @if(session()->has('error'))
                  <div class="bg-red-100 border border-red-400 text-red-700 text-center py-4 lg:px-3">
                      <span class="font-semibold">{{session()->get('error')}}</span>
                  </div>
                  @endif
                  <div class="text-center">
                    <img
                      class="mx-auto w-48"
                      src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                      alt="logo"
                    />
                    <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">Konnect Stock Management Platform</h4>
                  </div>
                  <form action="{{route('login')}}" method="POST">
                    <p class="mb-4"></p>
                    <div class="mb-4">
                      @csrf
                      <input
                        type="text"
                        class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="email"
                        placeholder="Email"
                      />
                    </div>
                    <div class="mb-4">
                      <input
                        type="password"
                        class="form-control block w-full px-6 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        name="password"
                        placeholder="Password"
                      />
                    </div>
                    <div class="text-center pt-1 mb-12 pb-1">
                      <button
                        class="inline-block px-6 py-3 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3 rounded-full"
                        type="submit"
                        data-mdb-ripple="true"
                        data-mdb-ripple-color="light"
                        style="
                          background: linear-gradient(
                            to right,
                            #ee7724,
                            #d8363a,
                            #dd3675,
                            #b44593
                          );
                        "
                      >
                        Log in
                      </button>
                      <a class="text-gray-500" href="#!">Forgot password?</a>
                    </div>
                    <div class="flex items-center justify-between pb-6"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>