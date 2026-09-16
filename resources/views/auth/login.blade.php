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
						<a class="nav-link active" id="tab1-btn" data-bs-toggle="tab" data-bs-target="#tab1" role="tab" aria-current="page" href="#">Cliente</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="tab2-btn" data-bs-toggle="tab" data-bs-target="#tab2" role="tab" href="#">Barbeiro</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="tab-content mt-5" id="myTabContent">
			<div class="card rounded-5 p-5 tab-pane fade show active" id="tab1" role="tabpanel">
				<div class="row">
					<div class="col-12">
						<p class="text-center">--- Entrar com google ---</p>
					</div>
					<div class="col-12 mb-4">
						<button class="btn w-100">Entrar com google</button>
					</div>
					<div class="col-12">
						<p class="text-center">--- Ou entrar com email ---</p>
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
		<div class="tab-content" id="myTabContent">
			<div class="card rounded-5 p-5 tab-pane fade" id="tab2" role="tabpanel">
				<div class="row">
					<div class="col-12">
						<p class="text-center">--- Entrar com google ---</p>
					</div>
					<div class="col-12 mb-4">
						<button class="btn w-100">Entrar com google</button>
					</div>
					<div class="col-12">
						<p class="text-center">--- Ou entrar com email ---</p>
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
@endsection