// Autocompleta rua/bairro a partir do CEP usando a API pública do ViaCEP
// (viacep.com.br) — gratuita, sem necessidade de chave/autenticação.
document.addEventListener('DOMContentLoaded', function () {
	const cepInput = document.querySelector('input[name="cep"]');
	const ruaInput = document.querySelector('input[name="rua"]');
	const bairroInput = document.querySelector('input[name="bairro"]');

	if (!cepInput) return;

	cepInput.addEventListener('blur', function () {
		const cep = cepInput.value.replace(/\D/g, '');

		if (cep.length !== 8) {
			return;
		}

		fetch('https://viacep.com.br/ws/' + cep + '/json/')
			.then(function (response) {
				return response.json();
			})
			.then(function (data) {
				if (data.erro) {
					cepInput.classList.add('is-invalid');
					return;
				}

				cepInput.classList.remove('is-invalid');

				if (ruaInput) ruaInput.value = data.logradouro || ruaInput.value;
				if (bairroInput) bairroInput.value = data.bairro || bairroInput.value;
			})
			.catch(function () {
				// Se a API falhar (fora do ar, sem internet, etc), não bloqueia
				// nada — a pessoa continua podendo preencher o endereço na mão.
			});
	});
});
