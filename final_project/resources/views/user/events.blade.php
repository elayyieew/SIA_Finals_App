<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/UserDashboard.css">

	<title>DewyDolt App</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="{{ route('dashboard') }}" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">User Dashboard</span>
		</a>
		<ul class="side-menu top">
			<li class="{{ request()->is('dashboard') ? 'active' : '' }}">
				<a href="{{ route('dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li class="{{ request()->is('events') ? 'active' : '' }}">
				<a href="{{ route('events') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Events</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
    			<a href="{{ route('settings') }}" class="Settings">
        			<i class='bx bxs-cog'></i>
        			<span class="text">Settings</span>
    			</a>
			</li>
			<li>
    			<a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        			<i class='bx bxs-log-out-circle'></i>
        			<span class="text">Logout</span>
    			</a>
			</li>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    			@csrf
			</form>
			</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="{{ route('dashboard') }}" class="nav-link">DewyDoIt</a>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Welcome User!</h1>
					<ul class="breadcrumb">
						<li>
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="{{ route('events') }}">Events</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="events-organizer">
		<div class="calendar-container">
			<div class="calendar">
				<div class="calendar-header">
					<button id="prevMonthBtn">&lt;</button>
					<h2 id="monthYearDisplay"></h2>
					<button id="nextMonthBtn">&gt;</button>
				</div>
				<div class="calendar-days">
					<div class="day-header">Sun</div>
					<div class="day-header">Mon</div>
					<div class="day-header">Tue</div>
					<div class="day-header">Wed</div>
					<div class="day-header">Thu</div>
					<div class="day-header">Fri</div>
					<div class="day-header">Sat</div>
				</div>
				<div class="calendar-grid" id="calendarGrid"></div>
			</div>
			<div class="upcoming-events">
				<h3>Upcoming Events</h3>
				<ul id="eventList"></ul>
			</div>
		</div>

		<div class="event-section">
			<div class="event-form">
				<h3>Create Event</h3>
				<form id="eventForm">
					<label for="eventDate">Date:</label>
					<input type="date" id="eventDate" required>
					<label for="eventTitle">Title:</label>
					<input type="text" id="eventTitle" required>
					<button type="submit" class="btn-submit">Add Event</button>
				</form>
			</div>
		</div>
	</div>
		</main>
	</section>
	<script src="js/UserDashboard.js"></script> 
</body>
</html>
