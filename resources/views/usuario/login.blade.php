@extends('layout.app')
@include('layout.errors')

<section>
<div class="d-flex justify-content-center h-100">
	<div class="card">
		<div class="card-header">
				<h3>Entrar</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>			
			<div class="card-body">
				<form method="Post" action="/fazer_login">
					
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

					<div class="row align-items-center remember pt-4">
						<input type="checkbox">Remember Me
					</div>

					<div class="form-group pt-2">
						<input type="submit" value="Entrar" class="btn float-right login_btn">
					</div>


					<div class="form-group pt-2">
								<a  class="btn float-right login_btn" href="/">Voltar</a>
					</div>

				</form>
			</div>

			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Vocẽ não tem uma conta?<a href="/cadastrar_usuario">Sign Up</a>
				</div>			
			</div>

		</div>
	</div>
</div>
</section>

