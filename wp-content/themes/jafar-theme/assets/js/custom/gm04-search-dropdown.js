(() => {
	const navSearchButton = document.querySelector('.gm01__list__link--search');
	const searchDropdown = document.querySelector('.gm04');
	const background = document.querySelector('.background-overlay');
	const closeButton = document.querySelector('.gm04__close');

	closeButton.addEventListener('click', () => {
		navSearchButton.classList.toggle('active');
		searchDropdown.classList.toggle('is-active');
		background.classList.toggle('is-active');
	});	

	const toggleSearch = event => {
		event.stopPropagation();

		navSearchButton.classList.toggle('active');
		
		if (!event.target.closest('.gm04')) {	
			searchDropdown.classList.toggle('is-active');
			background.classList.toggle('is-active');
	
			searchDropdown.classList.contains('is-active')
				? document.addEventListener('click', toggleSearch)
				: document.removeEventListener('click', toggleSearch);
		} else {
			console.log('yoo');
		}
	}
	
	navSearchButton.addEventListener('click', toggleSearch);
})();