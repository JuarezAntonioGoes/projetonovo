<?php

// Conexão
require_once '../php_action/db_connect.php';

// Header
include_once '../includes/header.php';



?>

<script type="text/javascript">
	// Material Select Initialization
	$(document).ready(function() {

		$("#cpff").mask("000.000.000-00")
		$("#tele").mask("(00) 0 0000-0000")


	});
</script>
<div class="container">

	<br>
	<!-- Modal Trigger -->
	<a class="waves-effect waves-light btn modal-trigger" href="#modal1">cadastrar cliente</a>



	<!-- Modal Structure -->
	<div id="modal1" class="modal">
		<div class="modal-content">



			<form action="../php_action/cadastrar_cliente.php" method="POST">

				<div class="input-field col s12">
					<label for="cpf">CPF</label>
					<input type="text" name="cpf" id="cpff" required>

				</div>

				<div class="input-field col s12">
					<label for="nome">Nome</label>
					<input type="text" name="nome" id="nome">

				</div>

				<div class="input-field col s12">
					<label for="telefone">Celular</label>
					<input type="text" name="telefone" id="tele">

				</div>

				<div class="input-field col s12">
					<label for="cidade">Cidade</label>
					<input type="text" name="cidade" id="cidade">

				</div>

				<div class="input-field col s12">
					<label for="endereco">Endereço</label>
					<input type="text" name="endereco" id="tendereco">

				</div>

				<div class="input-field col s12">
					<label for="bairro">Bairro</label>
					<input type="text" name="bairro" id="bairro">

				</div>


				<div class="input-field col s12">
					<label for="numero_residencia">Nº</label>
					<input type="text" name="numero_residencia" id="numero_residencia">

				</div>

				<button type="submit" name="btn-add" class="btn red">CADASTRAR</button>

				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

			</form>
		</div>
	</div>
	<br><br>
	<div class="div-sel " id="div1">
		<?php

		//PAGINAÇÃO
		include 'paginacao.php';
		?>
		<table class="striped">
			<thead>
				<tr>

					<th>Nome:</th>
					<th>CPF:</th>

				</tr>
			</thead>

			<tbody>
				<?php


				$sql = "SELECT * FROM adicionar_cliente order by id DESC LIMIT $inicio, $quantidade";
				$resultado = mysqli_query($connect, $sql);

				if (mysqli_num_rows($resultado) > 0) :

					while ($dados = mysqli_fetch_array($resultado)) :
				?>
						<tr>
							<td><?php echo $dados['nome'];	?></td>
							<td><?php echo $dados['cpf'];	?></td>







							<td><a href="#modal4<?php echo $dados['id']; ?>" class="waves-effect  btn modal-trigger blue"><i class="material-icons">event_note</i></a></td>


							<div id="modal4<?php echo $dados['id']; ?>" class="modal">
								<div class="modal-content">



									<form action="../php_action/editar_cliente.php/?id=<?php echo $dados['id']; ?>" method="POST">
										Nome <input type="text" value="<?php echo $dados['nome']; ?>" readonly><br>
										CPF <input type="text" value="<?php echo $dados['cpf']; ?>" readonly>
										Celular <input type="text" value="<?php echo $dados['telefone']; ?>" readonly>
										Cidade <input type="text" value="" readonly>
										Endereço <input type="text" value="" readonly>
										Bairro <input type="text" value="" readonly>
										Telefone <input type="text" value="" readonly>
										Nº <input type="text" value="" readonly>
									</form>
								</div>
							</div>

							<td><a href="#modal3<?php echo $dados['id']; ?>" class="waves-effect  btn modal-trigger orange"><i class="material-icons">edit</i></a></td>

							<!-- Modal Structure -->
							<div id="modal3<?php echo $dados['id']; ?>" class="modal">
								<div class="modal-content">



									<form action="../php_action/editar_cliente.php/?id=<?php echo $dados['id']; ?>" method="POST">

										<h4 name="id_reserva" value="<?php echo $dados['id']; ?>">EDITAR</h4>

										<div class="input-field col s12">
											<input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];	?>">
											<label for="nome">Nome do Cliente</label>
										</div>

										<div class="input-field col s12">
											<input type="text" name="cpf" id="cpf" value="<?php echo $dados['cpf'];	?>">
											<label for="cpf">CPF</label>
										</div>

										<div class="input-field col s12">
											<label for="telefone">Celular</label>
											<input type="text" name="telefone" id="tele" value="<?php echo $dados['telefone']; ?>">

										</div>

										<div class="input-field col s12">
											<label for="cidade">Cidade</label>
											<input type="text" name="cidade" id="cidade">

										</div>

										<div class="input-field col s12">
											<label for="endereco">Endereço</label>
											<input type="text" name="endereco" id="tendereco">

										</div>

										<div class="input-field col s12">
											<label for="bairro">Bairro</label>
											<input type="text" name="bairro" id="bairro">

										</div>


										<div class="input-field col s12">
											<label for="numero_residencia">Nº</label>
											<input type="text" name="numero_residencia" id="numero_residencia">

										</div>






										<button type="submit" name="btn-edit" class="btn red">ATUALIZAR SERVIÇO</button>

										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

									</form>
								</div>
							</div>














							<td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

							<!-- Modal Structure -->

							<div id="modal<?php echo $dados['id']; ?>" class="modal">
								<div class="modal-content">
									<h4>Opa!</h4>
									<p>Tem certeza que deseja excluir esse cliente?</p>
								</div>
								<div class="modal-footer">

									<form action="../php_action/delete.php" method="POST">
										<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
										<button type="submit" name="btn-deletar-cliente" class="btn red">Sim, quero deletar</button>

										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

									</form>

								</div>
							</div>



						</tr>
					<?php
					endwhile;
				else : ?>

					<tr>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>

				<?php
				endif;

				?>

			</tbody>
		</table>
	</div>
</div>
<?php
// Footer
include_once '../includes/footer.php';
?>