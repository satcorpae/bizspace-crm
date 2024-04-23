<div>
    {{-- Stop trying to control. --}}
        <x-header title="Verify ejari entry status"/>
       <div id="search-content" class="flex gap-2" >
        <x-input wire:model.live="search" placeholder="Search..." clearable />
        <div>
            <x-dropdown label="Filter" icon="o-funnel" id="filter-btn" class="btn-primary">
                {{-- By default any click closes dropdown --}}
                <x-menu-item title="Today's Date" />
            
                <x-menu-separator />
            
                {{-- Use `@click.STOP` to stop event propagation --}}
                <x-menu-item title="Pick the date" />
            

            </x-dropdown>
        </div>
        <div>
            <x-dropdown label="Sort" icon="o-adjustments-horizontal" id="filter-btn" class="btn-primary ">
                {{-- By default any click closes dropdown --}}
                <x-menu-item title="Today's Date" />
            
                <x-menu-separator />
            
                {{-- Use `@click.STOP` to stop event propagation --}}
                <x-menu-item title="Pick the date" />
            

            </x-dropdown>
        </div>

    </div>
       <div id="show-table">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3 mb-3">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer Agent
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Selling Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Cost
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $item )
                
            <tr class="bg-white -b dark:bg-gray-800 dark:-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->dater}}
                </th>
                <td class="px-6 py-4">
                    {{$item->customer_agent}}
                </td>
                <td class="px-6 py-4">
                    {{$item->description}}
                </td>
                <td class="px-6 py-4">
                    {{$item->selling_price}}
                </td>
                <td class="px-6 py-4">
                    {{$item->cost}}
                </td>
                <td class="px-6 py-4">
                    <div class="inline-block bg-blue-500 text-white text-sm font-semibold px-2 py-1 rounded-full ">
                        {{$item->status}}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <a href={{"ejari-editor/" .$item['id']}}>
                        <x-button  icon="o-pencil-square" />    
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$results->links()}}

       </div>
</div>
