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
})();