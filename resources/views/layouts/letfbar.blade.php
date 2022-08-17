<aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
    <div class="flex flex-col h-full">
      <!-- Sidebar links -->
      <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
        <!-- Dashboards links -->
        <div x-data="{ isActive: true, open: true}">
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          
           
              
            
            <span class="ml-2 text-bold text-indigo-300">
              @if (Auth::user()->user == 'admin')
              <a
              href="{{'/admin/dashboard'}}"
              class="block 
                     p-2 
                     text-sm 
                     text-blue-600 
                     transition-colors 
                     duration-200 
                     rounded-md 
                     dark:text-gray-400 
                     dark:hover:text-light 
                     hover:text-gray-700"> DASHBOARD </a>
              @endif
              @if (Auth::user()->user == 'regional_manager')
             <a href="{{'/admin/dashboard'}}"
              class="block 
                     p-2 
                     text-sm 
                     text-blue-600 
                     transition-colors 
                     duration-200 
                     rounded-md 
                     dark:text-gray-400 
                     dark:hover:text-light 
                     hover:text-gray-700"> DASHBOARD </span>
              </a>
              @endif
          
         
        </div>

        <!-- Region Managers -->
        @if(Auth::user()->user == 'admin')
        <div x-data="{ isActive: false, open: false }">
          <!-- active classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <i class="fa fa-users text-green-400"></i>
            </span>
            <span class="ml-2 text-bold"> Regional Managers</span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
              href="{{'/new_region_manager'}}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              <i class="fa fa-user-circle text-blue-400"></i><span class="ml-2"></span> Add New
            </a>
            <a
              href="{{'/regions/managers'}}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              <i class="fa fa-user-circle text-blue-400"></i>View
            </a>
          </div>

          {{-- Suppliers --}}
          <div x-data="{ isActive: false, open: false }">
            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
            <a
              
              @click="$event.preventDefault(); open = !open"
              class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
              :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
              role="button"
              aria-haspopup="true"
              :aria-expanded="(open || isActive) ? 'true' : 'false'"
            >
              <span aria-hidden="true">
                <i class="fa fa-users text-green-400"></i>
              </span>
              <span class="ml-2 text-bold"> Suppliers</span>
              <span aria-hidden="true" class="ml-auto">
                <!-- active class 'rotate-180' -->
                <svg
                  class="w-4 h-4 transition-transform transform"
                  :class="{ 'rotate-180': open }"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </a>
            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
              <!-- active & hover classes 'text-gray-700 dark:text-light' -->
              <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
              <a
                href="{{'/add_delivery_team'}}"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
              >
                <i class="fa fa-user-circle text-blue-400"></i><span class="ml-2"></span> Add New
              </a>
              <a
                href="{{'/deliveryteam/all'}}"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
              >
                <i class="fa fa-user-circle text-blue-400"></i>View
              </a>
            </div>
        </div>
          @endif
          {{-- Delivery Team --}}
          <div x-data="{ isActive: false, open: false }">
            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
            <a
              
              @click="$event.preventDefault(); open = !open"
              class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
              :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
              role="button"
              aria-haspopup="true"
              :aria-expanded="(open || isActive) ? 'true' : 'false'"
            >
              <span aria-hidden="true">
                <i class="fa fa-users text-green-400"></i>
              </span>
              <span class="ml-2 text-bold"> Delivery Personnel</span>
              <span aria-hidden="true" class="ml-auto">
                <!-- active class 'rotate-180' -->
                <svg
                  class="w-4 h-4 transition-transform transform"
                  :class="{ 'rotate-180': open }"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </a>
            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
              <!-- active & hover classes 'text-gray-700 dark:text-light' -->
              <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
              <a
                href="{{'/add_delivery_team'}}"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
              >
                <i class="fa fa-user-circle text-blue-400"></i><span class="ml-2"></span> Add New
              </a>
              <a
                href="{{'/deliveryteam/all'}}"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
              >
                <i class="fa fa-user-circle text-blue-400"></i>View
              </a>
            </div>
        </div>
        <div x-data="{ isActive: false, open: false }">
          <!-- active classes 'bg-primary-100 dark:bg-primary' -->
          <a
            
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <i class="fa fa-users text-green-400"></i>
            </span>
            <span class="ml-2 text-bold"> Products</span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
              href="{{'/products/add_product'}}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              <i class="fa fa-user-circle text-blue-400"></i><span class="ml-2"></span> Add New Product
            </a>
          <a
          href="{{'/products/addto_product'}}"
          role="menuitem"
          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
          >
          <i class="fa fa-user-circle text-blue-400"></i><span class="ml-2"></span> Add to Existing Product
        </a>
            <a
              href="{{'/products/all_products'}}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              <i class="fa fa-user-circle text-blue-400"></i>View Products
            </a>
            <a
              
              href="{{'/products/allocate'}}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              <i class="fa fa-arrow-right text-blue-400" ></i>Allocate Products
            </a>
          </div>
        </div>
        <!-- Pages links -->
        <div x-data="{ isActive: false, open: false }">
          <!-- active classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <svg
                class="w-5 h-5"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                />
              </svg>
            </span>
            <span class="ml-2 text-semibold"> Transactions </span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
             @if(Auth::user()->user == 'admin')
            <a
              href="#"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              Purchases
            </a>
            <a
              href="pages/404.html"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
            >
              Sales
            </a>
            <a
            href="{{'/transactions/allocations'}}"
            role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                  >
                  <i class="fa fa-cart-arrow-down fa-2x text-orange-300"></i><span class="ml-2">Product Allocations</span>
                  </a>
            @endif
            @if(Auth::user()->user == 'regional_manager')
              <a
                href="{{'/transactions/allocations'}}"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                  >
                  <i class="fa fa-cart-arrow-down fa-2x text-orange-300"></i><span class="ml-2">Allocations</span>
                  </a>
                  <a
                    href="pages/404.html"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                  >
                  <i class="fa fa-shopping-basket fa-2x text-orange-300"></i><span class="ml-2">Sales</span>
                  </a>
            @endif
          </div>
        </div>

        <!-- Authentication links -->
        <div x-data="{ isActive: false, open: false}">
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
          <span aria-hidden="true" class="">
            <!-- active class 'rotate-180' -->
            <i class="fa fa-building"></i>
          </span>
            <span class="ml-2 text-semibold"> Stock </span>
            
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
            href="{{'/stock/new_stock'}}"
            role="menuitem"
            class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
          >
            Add Stock
          </a>
            <a
              href="{{'/add_stock'}}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Available(Stock at hand)
            </a>
            <a
              href="auth/login.html"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Sold Stock
            </a>
          
          </div>
        </div>

        <!-- Layouts links -->
        <div x-data="{ isActive: false, open: false}">
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <svg
                class="w-5 h-5"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                />
              </svg>
            </span>
            <span class="ml-2 text-semibold">Regions</span>
          </a>
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >Orders
          </a>
          
          
      </nav>

      <!-- Sidebar footer -->
    
    </div>
  </aside>