<div>
    {{-- Be like water. --}}
    <link rel="stylesheet" href="{{asset('css/make-invoice.css')}}">
    <x-header title="Make Invoice" />
        <div id="search-agent" >
                <x-card title="Search by Agent's Name" subtitle="eg, Agent T" separator progress-indicator>
                    <x-form wire:submit="searchForName">
                    <div class="w-1/5 flex  justify-between">
                            <x-input placeholder="search agent's name" wire:model="searchName"  required/>
                            <x-button label="search" class="btn-primary" type="submit" spinner="save" />
                    </div>
                    </x-form>
                </x-card>
        </div>
        <div id="invoice-form">
            <x-card title="Invoice" subtitle="Already Made Invoice" separator progress-indicator class="mb-2">
                <x-form wire:submit="storeInvoice">
                    <div class="grid grid-cols-4 grid-rows-2 gap-4">
                            @php
                                $config1 = ['altFormat' => 'd/m/Y'];
                            @endphp
                            @php
                                $currentDate = \Carbon\Carbon::now();
                                $dueDate = \Carbon\Carbon::now();
                                $dueDate = $dueDate->addDays(7);
                            @endphp
                            <div class="p-4">
                                <x-input label="Date:" wire:model="currentDate" icon="o-calendar"  hint="enter the date!" required/>
                            </div>
                            <div class=" p-4">
                                <x-input label="Invoice Number" wire:model="invoice_number" value="INV-BS-24"  required/>
                            </div>
                            <div class=" p-4">
                                <x-input label="Terms" wire:model="terms" value="CASH" required/>
                            </div>
                            <div class=" p-4">
                                <x-input label="Due Date"   wire:model="dueDate" required/>
                            </div>
                            <div class=" p-4">
                                <x-input label="Customer Agent" wire:model="customer_agent" :value="$searchName"  required/>
                            </div>
                            <div class=" p-4">
                                <x-input label="Address" wire:model="address" value="AL GHAROUD" required/>
                            </div>
                            <div class=" p-4">
                                <x-input label="Location" wire:model="location" value="DUBAI UAE" required/>
                            </div>
                            <div class=" p-4">
                                <x-input label="TRN Number" wire:model="trn" />
                            </div>
                    </div>
                        <div class="grid grid-cols-4 grid-row-1 gap-3">
                            <div class="p-4">
                                @foreach ($getEjari as $item  )
                                    <x-input label="Description" wire:model="description.{{ $loop->index }}" required/>
                                @endforeach
                            </div>
                            <div class="p-4">
                                @foreach ($getEjari as $item  )
                                     <x-input label="Quantity" wire:model="quantity"  required/>
                                @endforeach
                            </div>
                            <div class="p-4">
                                 @foreach ($getEjari as $item  )
                                    <x-input label="Selling Price" wire:model="selling_price.{{ $loop->index }}" required/>
                                @endforeach
                            </div>
                            <div class="p-4 mt-5">
                                <x-button type="submit" label="create invoice" class="btn-primary mt-2 w-80" />
                            </div>
                        </div>
                    </x-card>
                </x-form>
            </div>
</div>
