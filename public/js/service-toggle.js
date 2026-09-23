document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.service-toggle').forEach(function (checkbox) {
		const target = document.getElementById(checkbox.dataset.target);
		const input = target ? target.querySelector('input') : null;

		const toggleServiceField = function () {
			if (!target || !input) return;
			const isChecked = checkbox.checked;

			target.classList.toggle('d-none', !isChecked);
			input.disabled = !isChecked;
			input.required = isChecked;

			if (!isChecked) {
				input.value = '';
			}
		};

		checkbox.addEventListener('change', toggleServiceField);
		toggleServiceField();
	});
});