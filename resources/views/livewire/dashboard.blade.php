<div>
   <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
<x-header title="Dashboard"/>

    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="flex gap-3">
       <x-stat title="Messages" value="44" icon="o-envelope" tooltip="Hello" />
     
    <x-stat
        title="Sales"
        description="This month"
        value="22.124"
        icon="o-arrow-trending-up"
        tooltip-bottom="There" />
     
    <x-stat
        title="Lost"
        description="This month"
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

    <div class="grid grid-cols-4 gap-2">
        <div class="polararea">
            <x-card class="mt-3 h-80 shadow-lg"  id="custom-stats"  title="# of Invoices generated today " >
                <div class="" id="invoices-gen">
                    <x-progress-radial value="80" unit="" style="--size:14rem; --thickness: 8px" />
                </div>
            </x-card>
        </div>
        <div class="polar col-span-2">
            <x-card class="mt-3 h-80" title="Number Invoices"  shadow separator>
          
            </x-card>
        </div>
        <div class="h-80 ">
             <x-card class="mt-3 h-80 shadow-lg"  shadow separator>
                <div class=" flex justify-center items-center ">
                    <x-calendar/>
                </div>
             </x-card>
        </div>    
    </div>
    <div class="grid grid-cols-2 gap-2 mt-3">
        <div class="" >
            <x-card title="# of Ejaris Created Each Month ">
                <x-chart wire:model="myChart" />
            </x-card>
        </div>
        <div class="" >
            <x-card class="h-300" title="Task Assigned" id="task-assigned">
        
            </x-card>
        </div>
    </div>
</div>