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

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');

    if (sidebar.classList.contains('hide')) {
        mainContent.style.marginLeft = '80px';
        workspaceList.style.marginLeft = '80px';
    } else {
        mainContent.style.marginLeft = '230px'; 
        workspaceList.style.marginLeft = '230px';
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

