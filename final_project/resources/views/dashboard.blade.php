<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="/css/NEW.CSS	">

	<title>DewyDolt App</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">User Dashboard</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Workspace</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Calendar/Events</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="Settings">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
			<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="button" onclick="event.preventDefault(); this.closest('form').submit();">
        {{ __('Log Out') }}
    </button>
</form>
	
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="images/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Welcome User!</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

        <!-- MAIN -->

            <!-- WORKSPACE + CREATE -->
            <div class="card">
                <h1>Workspace</h1>
                <button id="openModal">+ create</button>
              </div>
          
              <div id="myModal" class="modal">
                <div class="modal-content">
                  <h1>Let's build a Workspace</h1>
                  <label for="description">Description</label>
                  <textarea id="description" rows="4"></textarea>
                  <label for="label">Label</label>
                  <input type="text" id="label">
                  <label for="date">Date</label>
                  <input type="date" id="date">
                  <button id="closeModal">Submit</button>
                </div>
              </div>
 
              </div>
        
              <!-- WORKSPACE + CREATE -->

			   <!-- WORKSPACES -->
			   <div class="card">
                <h1>Workspaces</h1>
                <button id="openModal">open</button>
              </div>
			  
              <!-- WORKSPACES -->


              <!-- CALENDAR -->
			  <div class="header">
				<!-- CALENDAR -->
		<section class="container1">
				<div class="card3">
					<div class="card-image car-1"></div>
					<h3>Calendar/Events</h3>
					<button>proceed</button>
				</div>
             <!-- CALENDAR -->
            
<!-- WORKSPACES -->


<!-- WORKSPACES -->

















			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>