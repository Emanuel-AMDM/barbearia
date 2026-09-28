// Máscaras simples de digitação (telefone com DDD do município, sem código
// do país, e CEP) — só formatam o que a pessoa já está digitando, não validam.

function formatarTelefone(digitos) {
	digitos = digitos.slice(0, 11);
	const ddd = digitos.slice(0, 2);
	// 11 dígitos = celular (9 na frente do número), 10 = fixo.
	const ehCelular = digitos.length > 10;
	const parte1 = ehCelular ? digitos.slice(2, 7) : digitos.slice(2, 6);
	const parte2 = ehCelular ? digitos.slice(7, 11) : digitos.slice(6, 10);

	let resultado = '';
	if (digitos.length > 0) resultado += '(' + ddd;
	if (digitos.length > 2) resultado += ') ' + parte1;
	if (digitos.length > (ehCelular ? 7 : 6)) resultado += '-' + parte2;
	return resultado;
}

function formatarCep(digitos) {
	digitos = digitos.slice(0, 8);
	if (digitos.length > 5) {
		return digitos.slice(0, 5) + '-' + digitos.slice(5);
	}
	return digitos;
}

document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('input[name="telefone"]').forEach(function (input) {
		input.addEventListener('input', function () {
			const digitos = input.value.replace(/\D/g, '');
			input.value = formatarTelefone(digitos);
		});
	});

	document.querySelectorAll('input[name="cep"]').forEach(function (input) {
		input.addEventListener('input', function () {
			const digitos = input.value.replace(/\D/g, '');
			input.value = formatarCep(digitos);
		});
	});
});
