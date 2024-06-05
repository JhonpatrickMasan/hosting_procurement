<!-- Load FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.js"></script>

<!-- Load Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/en-au.js"></script> <!-- Replace 'en-au' with your locale -->

<!-- Your Blade Template Content -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Dashboard</h1>
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-semibold">Current Date and Time</h2>
                <p id="currentDate" class="text-lg"></p>
                <p id="currentTime" class="text-lg"></p>
            </div>
            <div>
                <h2 class="text-2xl font-semibold">Calendar</h2>
                <div id="calendar" class="bg-white p-4 rounded-lg shadow-md" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="card bg-white shadow-md rounded-lg p-4">
            <h5 class="card-title text-lg font-semibold">Card 1</h5>
            <p class="card-text text-gray-700">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card bg-white shadow-md rounded-lg p-4">
            <h5 class="card-title text-lg font-semibold">Card 2</h5>
            <p class="card-text text-gray-700">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card bg-white shadow-md rounded-lg p-4">
            <h5 class="card-title text-lg font-semibold">Card 3</h5>
            <p class="card-text text-gray-700">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update Date and Time
            function updateDateTime() {
                const now = moment();
                document.getElementById('currentDate').textContent = now.format('MMMM Do YYYY');
                document.getElementById('currentTime').textContent = now.format('h:mm:ss A');
            }
            setInterval(updateDateTime, 1000);
            updateDateTime();

            // Initialize Calendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 'auto',
                locale: 'en-us' // Replace 'en-au' with your locale
            });
            calendar.render();
        });
    </script>
    <style>
                body {
            overflow: hidden;
        }
        </style>
@endsection
