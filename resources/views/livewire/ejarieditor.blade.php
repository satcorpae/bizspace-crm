<div>
    {{-- The best athlete wants his opponent at his best. --}}
    {{-- {{$findEntry}} --}}
    @foreach ($findEntry as $item )
    <x-form wire:submit="save">
        <div class="grid ">
            <x-card>
            <div class="grid grid-cols-3 gap-4">
                    <!-- Row 1 -->
                    <div class="">
                        <x-input label="dater" wire:model="dater"  />
                    </div>
                    <div class="">
                        <x-input label="Name" wire:model="customer_agent" />
                    </div>
                    <div class="">
                        <x-input label="Description" wire:model="description"  />

                    </div>
                    
                    <!-- Row 2 -->
                    <div class="">
                        <x-input label="Selling Price" wire:model="selling_price"  />
                    </div>
                    <div class="">
                        <x-input label="Cost" wire:model="cost"  />
                    </div>
                    <div class="">
                        <x-input label="Sales Ref" wire:model="sales_ref"  />
                    </div>
                    
                    <!-- Row 3 -->
                    <div class="">
                        <x-input label="mode" wire:model="mode"  />

                    </div>
                    <div class="">
                        @php
                            $users = [

                                [
                                    'id' => "BLANK",
                                    'name' => 'KEEP BLANK',
                                ],
                                 [
                                    'id' => "UNCHECKED",
                                    'name' => 'unchecked',
                                ],

                                [
                                 
                                    'id' => "VALID",
                                    'name' => 'valid',
                                ],
                                [
                                    'id' => "INVALID",
                                    'name' => 'Invalid',
                                ]
                            ];
                        @endphp
 
                        <x-select label="status" :options="$users" wire:model="status" />

                    </div>

            </div>
        </div>
       
    </x-card>
        
        <x-slot:actions>
            <x-button label="Update" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
    @endforeach
</div>
