@extends('dashboard.layouts.dashboardmain')
@section('title', 'Home')
@section('content')
    {{-- <div class="flex flex-wrap -mx-3">
        <!-- Chart Booking -->
        <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-white">Booking</h6>
                    <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                        <i class="fa fa-arrow-up text-emerald-500"></i>
                        Bar Chart Booking
                    </p>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="Booking" class="h-full"></canvas> <!-- Ganti ID canvas ke 'Booking' -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Chart Booking -->
    </div> --}}




    @include('dashboard.partials.footer')
@endsection
@push('customJS')
    {{-- <script>
        var ctx = document.getElementById("Booking").getContext('2d'); // ID canvas: Booking

        var Booking = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($vehicleNames), // Data dari controller
                datasets: [{
                    label: 'Jumlah Pemesanan',
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: ["#e53844", "#ecad48", "#3376bd", "#00798c", "#52499c"],
                    data: @json($bookingCounts), // Data dari controller
                }]
            },
            options: {
                responsive: true,
            }
        });
    </script> --}}
@endpush
