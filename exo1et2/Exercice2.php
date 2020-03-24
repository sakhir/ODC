<!DOCTYPE html>
<html>
<head>
	<title>exo5</title>
	<style type="text/css">
		
	</style>
	
</head>
<body>
	     <h2> EXERCICE 2 </h2>
		<div id="container">
		 <form  method="post">
			<div class="">
			<label for="">Choisissez votre langue  </label> : 
			<select type="text" name="choix" value="<?php if (isset($_POST['choix'])){echo $_POST['choix'];} ?>">
             <option></option>
             <option>Francais</option>
             <option>Anglais</option>
			 </select>
			<input type="submit" value="AFFICHER" name="valider" />
			</div>
		</form>

		<?php 
 

if (isset($_POST['valider'])) { 
$ch=$_POST['choix'];

$calendrier = array (
    '1' => ['Janvier','january'],
    '2' => ['Fevrier','February'],
    '3' => ['Mars','March'],
    '4' => ['Avril','April'],
    '5' => ['Mai','May'],
    '6' => ['juin','june'],
    '7' => ['juillet','july'],
    '8' => ['Aout','August'],
    '9' => ['Septembre','September'],
   '10' => ['Octobre','October'],
   '11' => ['Novembre','November'],
   '12' => ['Decembre','December']
);

 switch ($ch) {
 	case 'Francais':
 AfficherTable($calendrier,0);

 		break;
 	case 'Anglais':
 	AfficherTable($calendrier,1);
 		break;
 	default :
 	echo "Choisissez une langue";

 }



	} #FIN DU ISSET 
 
 #DEBUT DES FONCTIONS 

	function AfficherTable($tab,$index) {
		$i=1;
echo "<br><br>";
echo '<table border=1px style="border-spacing:0;width:35%;cell-spacing:0;heigth:120px;" >';
foreach ($tab as $key => $value) {
	# code...
		if ($i<=3) {
			# code...
			echo '<td style="background-color:#E6E0ED" >'.$key.'</td>'; echo '<td style="background-color:#E6E0ED" >'.$value[$index].'</td>';
			$i++;
			if ($i==4) {
				# code...
				echo "<tr>";
				echo "</tr>";
			}
		}
		elseif (($i>=4)&&($i<7)) {
			# code...
			echo '<td style="background-color:#D7D3E1" >'.$key.'</td>'; echo '<td style="background-color:#D7D3E1" >'.$value[$index].'</td>';
			$i++;
			if ($i==7) {
				# code...
				echo "<tr>";
				echo "</tr>";
			}
		}
		elseif (($i>=7)&&($i<=9)) {
			# code...
		echo '<td style="background-color:#E6E0ED" >'.$key.'</td>'; echo '<td style="background-color:#E6E0ED" >'.$value[$index].'</td>';
			$i++;
			if ($i==10) {
				# code...
				echo "<tr>";
				echo "</tr>";
			}
		}
		elseif (($i>=10)&&($i<=12)) {
			# code...
			echo '<td style="background-color:#D7D3E1" >'.$key.'</td>'; echo '<td style="background-color:#D7D3E1" >'.$value[$index].'</td>';
			$i++;
		}
}
echo "</table>";

	}	 

 		?>
	

</div>
   
</body>
</html>