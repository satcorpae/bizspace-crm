<div>
    <link rel="stylesheet" href="{{asset('css/ejari-tracksheet.css')}}">
    {{-- @include('livewire.sidebar')     --}}
    <x-header title="Ejari Tracksheet"/>
    
    {{-- create ejari --}}
    <div id="create-ejari" class="">
        <x-drawer wire:model="showDrawer2" class="w-11/12 lg:w-1/3" right>
            <div>

                <x-form wire:submit="save">
                    @php
                        $config1 = ['altFormat' => 'd/m/Y'];
                       
                    @endphp
                    
                    <x-datepicker label="Date:" wire:model="dater" icon="o-calendar" hint="enter the date!" :config="$config1" required/>
                
                    <x-input label="Customer Agent" wire:model="ca" required/>
                    <x-input label="Description" wire:model="description" required/>
                    <x-input label="Selling Price" wire:model="sp" required/>
                    <x-input label="Mode" wire:model="mode" required />
                    <x-input label="Cost of Ejari" wire:model="coe" required/>
                    <x-input label="Sales Ref" wire:model="sr" required/>
                
                    <x-slot:actions>
                        <x-button label="submit" class="btn-primary" type="submit" spinner="save" />
                    </x-slot:actions>
                </x-form>

            </div>
            <x-button label="Close" @click="$wire.showDrawer2 = false" />
        </x-drawer>
        <x-button  label="Add" icon="o-plus" class="btn-primary" wire:click="$toggle('showDrawer2')" />
    </div>

    {{-- stats --}}
    <div id="stats" class="">
        <x-stat title="Cutomers" value="44" icon="o-user-group" tooltip="Hello" />
        <x-stat
            title="Total # of Entries"
            description="This month"
            value="22"
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

    <div id="search-content" class="w-1/3" >
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
        @php
          $headers = [
            ['key' => 'id' , 'label' => 'SL #'],
            ['key' => 'dater' , 'label' => 'Date'],
            ['key' => 'customer_agent' , 'label' => 'Customer Agent'],
            ['key' => 'description' , 'label' => 'Description'],
            ['key' => 'selling_price' , 'label' => 'Selling Price'],
            ['key' => 'cost' , 'label' => 'Cost Of Ejari'],
            ['key' => 'sales_ref' , 'label' => 'Sales Ref'],
            ['key' => 'mode' , 'label' => 'Mode'],
            ['key' => 'status' , 'label' => 'status'],
        ];
        @endphp

        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 mb-3">
            <x-table :headers="$headers" :rows="$results" :sort-by="$sortBy" striped >
                 {{-- @scope('status', $results) --}}
                    {{-- <x-badge :value="$results->status" class="badge-info" /> --}}
           
                {{-- @endscope --}}
            </x-table>
        </div>
        {{$results->links()}}


    </div>

</div>
