@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-4">Edit Events</h1>
                    <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                       {{-- Title --}}
                           <div class="mb-4">
                               <x-input-label for="title" value="Title" />
                               <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required  value="{{ $event->title }}"/>
                              <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                    
                        {{-- Location --}}
                       <div class="mb-4">
                       <x-input-label for="location" value="Location" />
                         <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" value="{{ $event->location }}"/>
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                       </div>

                        {{-- City --}}
                        <div class="mb-4">
                            <x-input-label for="city" value="City" />
                            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" value="{{ $event->city }}"/>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                         {{-- Date --}}
                        <div class="mb-4">
                             <x-input-label for="date" value="Date" />
                           <x-text-input id="date" name="date" type="datetime-local" class="mt-1 block w-full" required value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') }}"/>
                              <x-input-error :messages="$errors->get('date')" class="mt-2" />
                           </div>

                            {{-- Flyer Image --}}
                         <div class="mb-4">
                             <x-input-label for="flyer_image" value="Flyer Image" />
                             <input id="flyer_image" name="flyer_image" type="file" class="mt-1 block w-full"/>
                               @if($event->flyer_image)
                                <img src="{{ asset('storage/' . $event->flyer_image) }}" alt="Current Flyer" style="max-width: 200px;">
                               @endif
                            <x-input-error :messages="$errors->get('flyer_image')" class="mt-2" />
                          </div>

                          {{-- Type --}}
                        <div class="mb-4">
                             <x-input-label for="type" value="Type" />
                            <select id="type" name="type" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="monthly" {{ $event->type === 'monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="exclusive" {{ $event->type === 'exclusive' ? 'selected' : '' }}>Exclusive</option>
                             </select>
                              <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>

                           {{-- is_published (COMING SOON) --}}
                          <div class="mb-4">
                              <x-input-label for="is_published" value="Status" />
                           <select id="is_published" name="is_published" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                             <option value="1" @selected( $event->is_published )>Publish</option>
                             <option value="0" @selected( !$event->is_published )>Pending</option>
                               </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                          </div>

                        <x-primary-button>Update</x-primary-button>
                         <a href="{{ route('admin.events.index') }}" class="text-blue-500 hover:text-blue-700">
                            Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection