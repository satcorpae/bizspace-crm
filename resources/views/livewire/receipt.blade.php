<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-header title="Receipts" />
    <div>


    {{-- stats --}}
    <div id="stats" class="flex gap-2 mt-3 mb-3 ">
        <x-stat title="Customers" value="{{}}" icon="o-user-group" tooltip="Hello" />
        <x-stat
            title="Total # of Entries"
            description="This month"
            value="{{}}"
            icon="o-arrow-trending-up"
            tooltip-bottom="There" />
         
        <x-stat
            title="Today's Ejari Price"
            description="Current Price"
            value="34"
            icon="o-arrow-trending-down"
            tooltip-left="Ops!" />
         
        <x-stat
            title="Sales"
            description="This month"
            value="22.124"
            icon="o-arrow-trending-down"
            class="text-orange-500"
            color="text-pink-500"
            tooltip-right="Gosh!" />
    </div>

    <div id="search-content" class="w-1/2 flex gap-2">
        <x-input wire:model.live="search" placeholder="Search..." clearable />
        <div>
            <x-dropdown label="Filter" icon="o-funnel" id="filter-btn" class="btn-primary">
                {{-- By default any click closes dropdown --}}
                <x-menu-item title="Today's Date" wire:click="todaysDate" />
            
                <x-menu-separator />
            
                {{-- Use `@click.STOP` to stop event propagation --}}
                <x-menu-item title="Pick the date" />
            

            </x-dropdown>
        </div>
        <div>
            <x-dropdown label="Sort By" icon="o-adjustments-horizontal" id="filter-btn" class="btn-primary ">
                {{-- By default any click closes dropdown --}}
                <x-menu-item title="Invoice Number" />
            
                <x-menu-separator />
            
                {{-- Use `@click.STOP` to stop event propagation --}}
                <x-menu-item title="Date" />
            

            </x-dropdown>
        </div>

    </div>
       {{-- @foreach ($allInvoices as $item )
            {{$item->dater}}
       @endforeach --}}
       <div id="show-table">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3 mb-3">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Reciept Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Invoice Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>
                <th>
                    Customer Agent
                </th>
                <th>
                    Terms
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
                @foreach ($allreceipts as $item )

                <tr class="bg-white -b dark:bg-gray-800 dark:-gray-700">
                    <td class="px-6 py-4">
                        {{$item->receipt_number}}
                    </td>
                    <td class="px-6 py-4">
       
                          @php
                                     $unserializedDescription = unserialize($item->invoice_number);
                              @endphp
                        @foreach ($unserializedDescription as $data)
                            <ol>
                                <li>
                                    
                                    {{ $data }}
                                </li>
                            </ol>    
                     @endforeach
                    </td>
         
          
                    <td class="px-6 py-4">
                                         @php
                                     $unserializedDescription = unserialize($item->amount);
                                     $totalAmount = 0;
                              @endphp
                        @foreach ($unserializedDescription as $data)
                            <ol>
                                <li>
                                    @php
                                        $numData = intval($data);
                                        $totalAmount += $numData;
                                       
                                        @endphp
                               
                                </li>
                            </ol>    
                            @endforeach
                            {{ $totalAmount}}
                    </td>
                    <td>
                        {{$item->customer_agent}}
                    </td>
                    <td>
                        {{$item->terms}}
                    </td>
                    <td class="px-6 py-4">
                        <a href={{"view-receipt/" .$item['receipt_number']}}>
                            <x-button  icon="o-eye" class="btn-primary"/>    
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</div>
{{-- Care about people's approval and you will be their prisoner. --}}
</div>

</div>
