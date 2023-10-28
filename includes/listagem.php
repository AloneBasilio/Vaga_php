	<main>
	<section>
		<a href="cadastrar.php">
			<button class="btn">Nova vaga</button>
		</a>
	</section>

	<section>
		<table class='table'>
				<tr class='thead'>
					<th>Id</th>
					<th>Titulo</th>
					<th>Descrição</th>
					<th>Status</th>
					<th>Data</th>
					<th>Ações</th>
				</tr>
				<?php	
				foreach ($dados as $vag){
					echo "<tr> 
						<td>".$vag->id.	"</td>
						<td>".$vag->titulo."</td>
						<td>".$vag->descricao."</td>
						<td>".($vag->ativo == 'sim' ? 'Activo' : 'Inativo')."</td>
						<td>".date('d/m/Y à\s H:i:s',strtotime($vag->data))."</td>
						<td>
							<a href='editar.php?id='.$vag->id.".">
								<button class='edit'>Editar</button>
							</a>
							<a href='excluir.php?id='.$vag->id".">
								<button class='elimr'>Excluir</button>
							</a>

						</td>
					</tr>";
				}
				?>
		</table>
	</section>
</main>
