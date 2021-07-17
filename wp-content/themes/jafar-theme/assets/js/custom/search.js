(() => {
/**
 * Search results Form
 * Used in search-form.php
 */
 const searchField = document.getElementById("search");
 const clearFieldButton = document.querySelector(".search-form__close");

 if (searchField) {
	 searchField.addEventListener('keyup', () => {
		 if (searchField.value == '') {
			 clearFieldButton.style.display = 'none';
		 } else {
			 clearFieldButton.style.display = 'flex';
		 }
	 });
 }

 if (clearFieldButton) {
	 clearFieldButton.addEventListener('click', (e) => {
		 e.preventDefault();
		 searchField.value = "";
		 clearFieldButton.style.display = 'none';
	 }, false);
 }

 /**
 * Search results Form
 * Used in search-form-page.php
 */
	const pageSearchField = document.getElementById("search-page");
	const pageClearFieldButton = document.querySelector(".search-form__close-page");
 
	if (pageSearchField) {
		pageSearchField.addEventListener('keyup', () => {
			if (pageSearchField.value == '') {
				pageClearFieldButton.style.display = 'none';
			} else {
				pageClearFieldButton.style.display = 'flex';
			}
		});
	}
 
	if (pageSearchField) {
		pageClearFieldButton.addEventListener('click', (e) => {
			e.preventDefault();
			pageSearchField.value = "";
			pageClearFieldButton.style.display = 'none';
		}, false);
	}
})();