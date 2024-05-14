<?php
if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit !');
?>

<?php
	include_once'vue_generique.php';
	
	class VuePostit extends VueGenerique {

		public function __construct() {
			parent::__construct();
		}

		function postit_page(){
			?>
			<h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['firstName']); ?>!</h1>
			<div class="main-container">	
			<div class="post-it-section">
				<h2>Mes Post-its</h2>
				<button class="add-button" onclick="openForm()">Ajouter Post-its</button>
				<div class="post-it-display" id="mesPostIts"></div>
			</div>
			<div class="post-it-section" style="background-color: #ffcab0;">
				<h2>Post-its partagés</h2>
				<div class="post-it-display" id="postItsPartages"></div>
			</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>


			<div class="form-popup" id="myForm">
				<form class="form-container" action="submit_postit.php" method="post">
					<h1>Ajouter Post-it</h1>
					<label for="titre">
						<b>Titre</b>
					</label>
					<input type="text" id="titre" name="titre" placeholder="Entrez le titre" required maxlength="150">
					<label for="contenu">
						<b>Contenu</b>
					</label>
					<textarea placeholder="Écrivez le contenu" name="contenu" required></textarea>
					<button type="submit" class="btn">Ajouter</button>
					<button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
				</form>
			</div>

			<!-- JAVASCRIPT -->
			<script>
				function openForm() {
					document.getElementById("myForm").style.display = "block";
				}
				function closeForm() {
					document.getElementById("myForm").style.display = "none";
				}
			</script>

			<div class="form-popup" id="editForm">
				<form class="form-container" onsubmit="modifierPostIt(event)">
					<h1>Modifier Post-Its</h1>

					<label for="edit-titre"><b>Titre</b></label>
					<input type="text" id="edit-titre" name="edit-titre" required maxlength="50">

					<label for="edit-contenu">
						<b>Contenu</b>
					</label>
					<textarea id="edit-contenu" name="edit-contenu" required maxlength="150"></textarea>

					<div> 
						Date d'ajout: 
						<span id="edit-date_ajout"></span>
					</div>
					<div>
						Date de modification: 
						<span id="edit-date_modification"></span>
					</div>

					<input type="hidden" id="edit-id" name="edit-id">

					<button type="submit" class="btn">Modifier</button>
					<button type="button" class="btn cancel" onclick="closeEditForm()">Fermer</button>
				</form>
			</div>


			<script>
				function openEditForm() {
					document.getElementById("editForm").style.display = "block";
				}
				function closeEditForm() {
					document.getElementById("editForm").style.display = "none";
				}   
			</script>
			<?php
		}
		
		function error404($error){
			echo $error;
		}
	}
?>

