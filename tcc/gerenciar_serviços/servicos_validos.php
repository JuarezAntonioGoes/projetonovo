<?php
// Conexão
require_once '../php_action/db_connect.php';

// Header
include_once '../includes/header.php';

// Contador de serviços de serviços em analise



?>



<br><br>


<div class="col container">

	<a href="./textselect.php" class="waves-effect  btn modal-trigger grey darken-3">Cadastrar Serviço</a>
	<br><br>


	<?php
	$status_servico = 2;
	include_once './paginacao_servicos/index.php';
	?>

	<div class="div-sel" id="div1">
		<table class="striped">
			<thead>
				<tr>

					<th>Nome:</th>
					<br>
					<th>Defeito informado pelo cliente:</th>

				</tr>
			</thead>

			<tbody>
				<?php

				$sql = "SELECT * FROM adicionar_servico WHERE situacao_pedido = '2' order by id DESC LIMIT $inicio, $quantidade";
				$resultado = mysqli_query($connect, $sql);

				if (mysqli_num_rows($resultado) > 0) :

					while ($dados = mysqli_fetch_array($resultado)) :
				?>
						<tr>
							<?php if ($dados['situacao_pedido'] == 2) { ?>

								<td><?php echo $dados['nome'];	?></td>
								<td><?php echo $dados['defeito'];	?></td>

								<td><a href="#modal_finalizar<?php echo $dados['id']; ?>" class="btn green accent-4 modal-trigger"><i class="material-icons">check</i></a></td>

								<div id="modal_finalizar<?php echo $dados['id']; ?>" class="modal">
									<div class="modal-content">
										<h4>Opa!</h4>
										<p>Tem certeza que deseja finalizar esse pedido?</p>

									</div>
									<div class="modal-footer">

										<form action="../php_action/finalizar.php" method="POST">
											<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
											<button type="submit" name="btn-finalizar" class="btn green">Sim, quero finalizar pedido</button>

											<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Sair</a>

										</form>

									</div>
								</div>





								<td><a href="acompanhar_pedido.php?id=<?php echo $dados['id']; ?>" class="btn  teal darken-2 modal-trigger"><i class="material-icons">note_add</i></a></td>






								<td><a href="#modal<?php echo $dados['id']; ?>" class="waves-effect  btn modal-trigger orange"><i class="material-icons">edit</i></a></td>

								<!-- Modal Structure -->
								<div id="modal<?php echo $dados['id']; ?>" class="modal">
									<div class="modal-content">



										<form action="../php_action/editar_servico.php/?id=<?php echo $dados['id']; ?>" method="POST">

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
												<input type="text" name="tec" id="tec" value="<?php echo $dados['tecnico'];	?>">
												<label for="tec">Técnico</label>
											</div>

											<div class="input-field col s12">
												<input type="text" name="produto" id="produto" value="<?php echo $dados['produto'];	?>">
												<label for="produto">Produto</label>
											</div>

											<div class="input-field col s12">
												<input type="text" name="serie" id="serie" value="<?php echo $dados['serie'];	?>">
												<label for="serie">N° Série</label>
											</div>

											<div class="input-field col s12">
												<input type="text" name="defeito" id="defeito" value="<?php echo $dados['defeito'];	?>">
												<label for="defeito">Defeito</label>
											</div>

											<div class="input-field col s12">
												<input type="text" name="observacao" id="observacao" value="<?php echo $dados['observacao'];	?>">
												<label for="observacao">Observações</label>
											</div>



											<button type="submit" name="btn-edit" class="btn red">ATUALIZAR SERVIÇO</button>

											<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

										</form>
									</div>
								</div>





								<td><a href="#modal1<?php echo $dados['id']; ?>" class="btn red modal-trigger"><i class="material-icons">delete</i></a></td>

								<!-- Modal Structure -->

								<div id="modal1<?php echo $dados['id']; ?>" class="modal">
									<div class="modal-content">
										<h4>Opa!</h4>
										<p>Tem certeza que deseja excluir esse pedido?</p>
									</div>
									<div class="modal-footer">

										<form action="../php_action/delete.php" method="POST">
											<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
											<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

											<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

										</form>

									</div>
								</div>

								<!-- cancelar serviço -->

								<td><a href="#modal_cancelar<?php echo $dados['id']; ?>" class="btn red accent-4 modal-trigger"><i class="material-icons">close</i></a></td>

								<div id="modal_cancelar<?php echo $dados['id']; ?>" class="modal">
									<div class="modal-content">
										<h4>Opa!</h4>
										<p>Tem certeza que deseja cancelar esse pedido?</p>

										Motivo:<input type="text" name="cancel">
									</div>
									<div class="modal-footer">

										<form action="../php_action/delete.php" method="POST">
											<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
											<button type="submit" name="btn-cancelar" class="btn red">Sim, quero cancelar o pedido</button>

											<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Sair</a>

										</form>

									</div>
								</div>
							<?php }

							?>

						</tr>
					<?php
					endwhile;
				else : ?>


					<tr>
						<td>-</td>
						<td>-</td>
					</tr>

				<?php
				endif;

				?>

			</tbody>
		</table>
	</div>

	<br>
	<a href="status_servico.php" class="btn teal darken-4">Voltar</a>

</div>
<br><br><br>

<?php

// Footer
include_once '../includes/footer.php';
?>