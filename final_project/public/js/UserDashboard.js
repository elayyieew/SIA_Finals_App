const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i => {
			i.parentElement.classList.remove('active');
		});
		li.classList.add('active');
	});
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');
const mainContent = document.querySelector('.main-content');
const workspaceList = document.getElementById('workspaceList');
const calendarContainer = document.querySelector('.calendar-container');
const eventSection = document.querySelector('.event-section');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');

    if (sidebar.classList.contains('hide')) {
        mainContent.style.marginLeft = '80px';
        workspaceList.style.marginLeft = '80px';
        calendarContainer.style.marginLeft = '80px'; 
        eventSection.style.marginLeft = '80px'; 
    } else {
        mainContent.style.marginLeft = '230px';
        workspaceList.style.marginLeft = '230px';
        calendarContainer.style.marginLeft = '230px'; 
        eventSection.style.marginLeft = '230px'; 
    }
});


//workspace functions
document.addEventListener('DOMContentLoaded', function() {
	const openModalBtn = document.getElementById('openModal');
	const closeModalBtn = document.getElementById('closeModal');
	const createWorkspaceModal = document.getElementById('createWorkspace');

	if (openModalBtn && closeModalBtn && createWorkspaceModal) {
		openModalBtn.addEventListener('click', function() {
			createWorkspaceModal.style.display = 'block';
		});

		closeModalBtn.addEventListener('click', function() {
			const name = document.getElementById('workspaceName').value;
			const description = document.getElementById('description').value;

			fetch('/workspace', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': '{{ csrf_token() }}'
				},
				body: JSON.stringify({ name: name, description: description })
			})
			.then(response => response.json())
			.then(data => {
				alert(data.message);
				createWorkspaceModal.style.display = 'none';
				document.getElementById('workspaceName').value = '';
				document.getElementById('description').value = '';
			})
			.catch(error => {
				alert('Error: ' + error.message);
			});
		});
	}
});

//calendar

// scripts.js

document.addEventListener('DOMContentLoaded', function () {
    const prevMonthBtn = document.getElementById('prevMonthBtn');
    const nextMonthBtn = document.getElementById('nextMonthBtn');
    const monthYearDisplay = document.getElementById('monthYearDisplay');
    const calendarGrid = document.getElementById('calendarGrid');
    const eventForm = document.getElementById('eventForm');
    const eventList = document.getElementById('eventList');

    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();
    let events = [];

    function renderCalendar(month, year) {
        calendarGrid.innerHTML = '';
        monthYearDisplay.textContent = `${new Date(year, month).toLocaleString('default', { month: 'long' })} ${year}`;
        
        const firstDay = new Date(year, month).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        
        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.classList.add('calendar-cell');
            calendarGrid.appendChild(emptyCell);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayCell = document.createElement('div');
            dayCell.textContent = day;
            dayCell.classList.add('calendar-cell');
            const eventDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            if (events.some(event => event.date === eventDate)) {
                dayCell.classList.add('event-day');
            }
            calendarGrid.appendChild(dayCell);
        }
    }

    function addEvent(event) {
        event.preventDefault();
        const eventDate = document.getElementById('eventDate').value;
        const eventTitle = document.getElementById('eventTitle').value;

        events.push({ date: eventDate, title: eventTitle });
        renderCalendar(currentMonth, currentYear);
        renderEventList();
    }

    function renderEventList() {
        eventList.innerHTML = '';
        events.forEach(event => {
            const li = document.createElement('li');
            li.textContent = `${event.date}: ${event.title}`;
            eventList.appendChild(li);
        });
    }

    prevMonthBtn.addEventListener('click', function () {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    });

    nextMonthBtn.addEventListener('click', function () {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    });

    eventForm.addEventListener('submit', addEvent);

    renderCalendar(currentMonth, currentYear);
});