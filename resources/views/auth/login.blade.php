@extends('principal.layouts.pages')

@section('contentpage')
	<div style="margin-top:150px"></div>
	
	<div class="container mb-5">
		<div class="row mb-5">
			<div class="col-12 text-center w-100">
				<img src="assets/img/logo/loder.png" alt="">
			</div>
		</div>
		<div class="row">
			<div class="col-12 d-flex justify-content-center">
				<ul class="nav nav-underline" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active color-tabs" id="tab1-btn" data-bs-toggle="tab" data-bs-target="#tab1" role="tab" aria-current="page" href="#">Cliente</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link color-tabs" id="tab2-btn" data-bs-toggle="tab" data-bs-target="#tab2" role="tab" href="#">Barbeiro</a>
					</li>
				</ul>
			</div>
		</div>
			<div class="tab-content mt-5 rounded-5 w-100 d-flex justify-content-center" id="myTabContent">
				<div class="col-lg-6 bg-body-tertiary shadow rounded-5 p-5 tab-pane fade show active" id="tab1" role="tabpanel">
					<div class="row">
						<div class="col-lg-12">
							<div class="d-flex align-items-center my-4">
								<hr class="flex-grow-1 border-secondary border-opacity-25 m-0">
								<span class="px-3 text-secondary small text-uppercase" style="font-size: 0.75rem;">Entrar com google</span>
								<hr class="flex-grow-1 border-secondary border-opacity-25 m-0">
							</div>
							<a href="" class="btn btn-outline-light w-100 py-2.5 rounded-pill fw-semibold d-flex align-items-center justify-content-center gap-2 border-secondary">
								<svg width="18" height="18" viewBox="0 0 24 24">
									<path fill="#EA4335" d="M12 5c1.6 0 3 .6 4.1 1.7l3.1-3.1C17.3 1.8 14.8 1 12 1 7.5 1 3.7 3.6 1.9 7.3l3.7 2.9C6.5 7.3 8.9 5 12 5z"/>
									<path fill="#4285F4" d="M23.5 12.3c0-.8-.1-1.6-.2-2.3H12v4.6h6.5c-.3 1.5-1.1 2.8-2.4 3.7l3.7 2.9c2.2-2 3.7-5 3.7-8.9z"/>
									<path fill="#FBBC05" d="M5.6 14.8c-.2-.7-.4-1.5-.4-2.3s.2-1.6.4-2.3L1.9 7.3C.7 9.7 0 12.3 0 15.1s.7 5.4 1.9 7.8l3.7-2.9z"/>
									<path fill="#34A853" d="M12 23.5c3.2 0 6-1.1 8-3l-3.7-2.9c-1.1.7-2.5 1.2-4.3 1.2-3.1 0-5.7-2.1-6.6-5L1.7 16.7C3.5 20.4 7.4 23.5 12 23.5z"/>
								</svg>
								<span>Continuar com o Google</span>
							</a>
							<div class="d-flex align-items-center my-4">
								<hr class="flex-grow-1 border-secondary border-opacity-25 m-0">
								<span class="px-3 text-secondary small text-uppercase" style="font-size: 0.75rem;">ou com e-mail</span>
								<hr class="flex-grow-1 border-secondary border-opacity-25 m-0">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label>E-mail</label>
							<input type="email" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<label>Senha</label>
							<input type="password" class="form-control">
						</div>
					</div>
					<div class="row mt-5">
						<div class="col-lg-12">
							<button type="submit" class="btn w-100">Entrar</button>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<a class="text-body-secondary" href="">Esqueceu sua senha?</a>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<a class="text-body-secondary" href="">Ainda não tem conta?</a>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-content mb-5 rounded-5 w-100 d-flex justify-content-center" id="myTabContent">
				<div class="col-lg-6 bg-body-tertiary shadow rounded-5 p-5 tab-pane fade" id="tab2" role="tabpanel">
					<div class="row">
						<div class="d-flex align-items-center my-4">
							<hr class="flex-grow-1 border-secondary border-opacity-25 m-0">
							<span class="px-3 text-secondary small text-uppercase" style="font-size: 0.75rem;">Entrar com google</span>
							<hr class="flex-grow-1 border-secondary border-opacity-25 m-0">
						</div>
						<div class="col-12">
							<a href="" class="btn btn-outline-light w-100 h-50 py-2.5 rounded-pill fw-semibold d-flex align-items-center justify-content-center gap-2 border-secondary">
								<svg width="18" height="18" viewBox="0 0 24 24">
									<path fill="#EA4335" d="M12 5c1.6 0 3 .6 4.1 1.7l3.1-3.1C17.3 1.8 14.8 1 12 1 7.5 1 3.7 3.6 1.9 7.3l3.7 2.9C6.5 7.3 8.9 5 12 5z"/>
									<path fill="#4285F4" d="M23.5 12.3c0-.8-.1-1.6-.2-2.3H12v4.6h6.5c-.3 1.5-1.1 2.8-2.4 3.7l3.7 2.9c2.2-2 3.7-5 3.7-8.9z"/>
									<path fill="#FBBC05" d="M5.6 14.8c-.2-.7-.4-1.5-.4-2.3s.2-1.6.4-2.3L1.9 7.3C.7 9.7 0 12.3 0 15.1s.7 5.4 1.9 7.8l3.7-2.9z"/>
									<path fill="#34A853" d="M12 23.5c3.2 0 6-1.1 8-3l-3.7-2.9c-1.1.7-2.5 1.2-4.3 1.2-3.1 0-5.7-2.1-6.6-5L1.7 16.7C3.5 20.4 7.4 23.5 12 23.5z"/>
								</svg>
								<span>Continuar com o Google</span>
							</a>
						</div>
						<div class="d-flex align-items-center my-4">
							<hr class="flex-grow-1 border-secondary border-opacity-25 m-0">
							<span class="px-3 text-secondary small text-uppercase" style="font-size: 0.75rem;">ou com e-mail</span>
							<hr class="flex-grow-1 border-secondary border-opacity-25 m-0">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label>E-mail</label>
							<input type="email" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-12">
							<label>Senha</label>
							<input type="password" class="form-control">
						</div>
					</div>
					<div class="row mt-5">
						<div class="col-12">
							<button type="submit" class="btn w-100">Entrar</button>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-12">
							<a class="text-body-secondary" href="">Esqueceu sua senha?</a>
						</div>
						<div class="col-12">
							<a class="text-body-secondary" href="">Ainda não tem conta?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection