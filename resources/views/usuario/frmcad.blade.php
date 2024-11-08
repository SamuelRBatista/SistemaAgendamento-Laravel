@extends('layout.app')
@include('layout.errors')

<section >
<div class="d-flex justify-content-center h-100">
	<div class="card">
		<div class="card-header">
			<h3>Cadastrar</h3>
			<div class="d-flex justify-content-end social_icon">
				<span><i class="fab fa-facebook-square"></i></span>
				<span><i class="fab fa-google-plus-square"></i></span>
				<span><i class="fab fa-twitter-square"></i></span>
			</div>
		</div>

			<div class="card-body">
				<form method="Post" action="/registrar_usuario">
					{{csrf_field()}}
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
							<input type="text" class="form-control" id="id_usuario" name="txt_usuario" placeholder="Usuário" >						
					</div>

					<div class="input-group form-group pt-2">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
							<input type="password" class="form-control" id="id_senha" name="txt_senha" placeholder="Senha">
					</div>

					<div class="input-group form-group pt-2">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
							<input type="text" class="form-control" id="id_email" name="txt_email" placeholder="E-mail">
					</div>

					<div class="form-group pt-2">
						<input type="submit" value="Cadastrar" class="btn float-right login_btn">
					</div>

					<div class="form-group pt-2">
						<a  class="btn float-right login_btn" href="/login">Voltar</a>
					</div>

		</form>
	</div>
</div>
</section>

