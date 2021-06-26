(() => {
	/* 
	* Hamburger 
	*/
	const hamburgerIcon = document.querySelector('.gm02__grid__hamburger');
	const menu = document.querySelector('.gm02__grid__menu');
	const background = document.querySelector('.background-overlay');
	const closeButton = document.querySelector('.gm02__grid__closebtn');

	const toggle = event => {
		event.stopPropagation();

		hamburgerIcon.classList.toggle('active');
		
		if (!event.target.closest('.gm02__grid__menu')) {	
			menu.classList.toggle('active');
			background.classList.toggle('active');
			closeButton.classList.toggle('active')
	
			menu.classList.contains('active')
				? document.addEventListener('click', toggle)
				: document.removeEventListener('click', toggle);
		} else {
		}
	}
	
	hamburgerIcon.addEventListener('click', toggle);
})();