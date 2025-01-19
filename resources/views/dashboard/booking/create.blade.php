@extends('dashboard.layouts.dashboardmain')
@section('title', 'Create booking')
@section('content')
    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 m-auto flex-0 lg:w-8/12">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto">
                        <p class="p-6 text-sm leading-normal uppercase dark:text-white dark:opacity-60">Create booking
                        </p>
                        <form action="{{ route('booking.store') }}" method="POST" class="p-4 md:p-5">
                            @csrf
                            <div class="flex flex-wrap -mx-3">
                                <!-- Dropdown untuk memilih Vehicle -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                                    <div class="mb-4">
                                        <label for="vehicle_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Vehicle
                                        </label>
                                        <select name="vehicle_id" id="vehicle_id" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            <option value="" disabled selected>Select a vehicle</option>
                                            @foreach ($vehicles as $vehicle)
                                                <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('vehicle_id')
                                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dropdown untuk memilih Driver -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                                    <div class="mb-4">
                                        <label for="driver_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Driver
                                        </label>
                                        <select name="driver_id" id="driver_id" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            <option value="" disabled selected>Select a driver</option>
                                            @foreach ($drivers as $driver)
                                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('driver_id')
                                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input Start Date -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                                    <div class="mb-4">
                                        <label for="start_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Start Date
                                        </label>
                                        <input type="date" name="start_date" id="start_date" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                            value="{{ old('start_date') }}">
                                        @error('start_date')
                                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input End Date -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                                    <div class="mb-4">
                                        <label for="end_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            End Date
                                        </label>
                                        <input type="date" name="end_date" id="end_date" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                            value="{{ old('end_date') }}">
                                        @error('end_date')
                                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input Start Odometer -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                                    <div class="mb-4">
                                        <label for="start_odometer"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Start Odometer
                                        </label>
                                        <input type="number" name="start_odometer" id="start_odometer" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            value="{{ old('start_odometer') }}">
                                        @error('start_odometer')
                                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input Purpose -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-12/12">
                                    <div class="mb-4">
                                        <label for="purpose"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Purpose
                                        </label>
                                        <textarea name="purpose" id="purpose" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            placeholder="Enter the purpose of booking">{{ old('purpose') }}</textarea>
                                        @error('purpose')
                                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dropdown untuk Approver Level 1 -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                                    <div class="mb-4">
                                        <label for="approved_by_level_1"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Approver Level 1
                                        </label>
                                        <select name="approved_by_level_1" id="approved_by_level_1" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            <option value="" disabled selected>Select an approver</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('approved_by_level_1')
                                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dropdown untuk Approver Level 2 -->
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                                    <div class="mb-4">
                                        <label for="approved_by_level_2"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Approver Level 2
                                        </label>
                                        <select name="approved_by_level_2" id="approved_by_level_2" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            <option value="" disabled selected>Select an approver</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('approved_by_level_2')
                                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Submit Booking
                            </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        @include('dashboard.partials.footer')
    </div>
@endsection
@push('customCSS')
    <!-- filepond css -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote-0.8.18/summernote-lite.css') }}">
@endpush
@push('customJS')
    <!-- Argon -->
    <script src="{{ asset('assets/js/sidenav-burger.js') }}"></script>
    <script src="{{ asset('assets/js/fixed-plugin.js') }}"></script>

    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>

    <!-- filepond js -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <!-- Summernote -->
    <script src="{{ asset('assets/vendor/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/summernote-0.8.18/summernote-lite.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/summernote-custom.js') }}"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.getElementById('filepondInput');
        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize,
        );
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            maxFileSize: '2MB',
            server: {
                // timeout: 7000,
                process: '/tmp-upload',
                revert: '/tmp-delete',
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            },
        });
    </script>
@endpush
