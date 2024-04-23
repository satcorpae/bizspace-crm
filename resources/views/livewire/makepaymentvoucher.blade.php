<div>
    {{-- In work, do what you enjoy. --}}
    <x-header title="Make Payment Voucher" />
    <x-form wire:submit="save">
    <x-card>
            <div class="grid grid-cols-3 grid-rows-3 gap-2">
                <div class="">
                    @php
                     $todaysDate = \Carbon\Carbon::now();
                     $formattedDate = $todaysDate->format('d-m-YYYY');
                    @endphp

                    <x-input label="Date" wire:model="dater" required />
                </div>
                <div class="">
                    <x-input label="Payment Number" wire:model="payment_number"  required/>
                </div>
                <div class="">
                    <x-input label="Terms" wire:model="terms"  required/>
                </div>
                <div class="">
                    <x-input label="Customer Agent" wire:model="customer_agent"  required/>

                </div>
                <div class="">
                    <x-input label="Address" wire:model="address"  required/>
                </div>
                <div class="">
                    <x-input label="Location" wire:model="location"  required/>
                </div>
                 <div class="">
                    <x-input label="trn" wire:model="trn" placeholder="Optional" />
                </div>
            </div>
        </x-card>
        <x-card>
       <div>
           
           @foreach($descriptions as $index => $description)
            <div class="grid grid-cols-3 grid-rows-1 gap-2">
                <div>
                    <x-input label="Description {{$index + 1}}" wire:model="descriptions.{{$index}}" required/>
                </div>
                <div>
                    <x-input label="quantity {{$index + 1}}" wire:model="quantities.{{$index}}" required/>
                </div>
                <div>
                    <x-input label="selling price {{$index + 1}}" wire:model="selling_prices.{{$index}}" required/>
                </div>
                <button wire:click="removeDescription({{ $index }})">Remove</button>
            </div>
            @endforeach
        </div>
        
    </x-card>
    <x-button class="mb-2" type="submit">create payment voucher</x-button>
</x-form>

<x-button wire:click="addDescription">Add Description</x-button>
<!-- resources/views/livewire/multiple-entries-form.blade.php -->



</div>

