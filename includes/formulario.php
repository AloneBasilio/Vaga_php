<main>
	<section>
		<a href="index.php">
			<button class="btn">voltar</button>
		</a>
	</section>
	<h2 class="sub-title">Cadastrar vaga</h2>
	<form method="post">
		<div>
			<label class="label">Titulo</label>
			<input class="txt" type="text" class="form-txt" name="title">
		</div>
		<div>
			<label class="label" >Descricao</label>
			<textarea class="form-txt" name="description" rows="5"></textarea>
		<div id="lab-check">
			<label class="label" >Status</label>
			<div class="check">
				<label>
					<input class="c" type="radio" name="action" checked value="sim">Activo
				</label>
			</div>	
			<div class="check">
				<label>
					<input class="c" type="radio" name="action" value="nao">Inactivo
				</label>
			</div>
		</div>
		<button class="btn" type="submit">Enviar</button>
	</form>
</main>
