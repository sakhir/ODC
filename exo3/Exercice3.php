<!DOCTYPE html>
<html>
<head>
	<title>exo3</title>
	<style type="text/css">
		
	</style>
	
</head>
<body>
	     <h2 style="margin-left: 45%;"> EXERCICE 3 </h2>
		<div id="container">
		 <form  method="post">
			<div class="">

			<label for=""><h1 style="margin-left: 35%;">Entrer le nombre de mot du tableau </h1> </label> <br><br>
			<input type="text" name="nmot" value="<?php if (isset($_POST['nmot']) ) echo htmlentities($_POST['nmot']) ?>" style="width: 10%;height: 30px;margin-left: 40%;">
			<input type="submit" value="Generer" name="generer" style="width:10%;height: 30px; font-size: 20px;background-color:#042425;color: white;"/><br><br>
			</div>
		</form>

		<?php 
 

if (isset($_POST['generer'])) { 

$n=$_POST['nmot'];
if (is_numerics($n)==true)
   {

		echo '<strong style="font-size:20px;margin-left:40%;">Generation de champ :</strong>';
		echo "<br><br>";

		echo '<form method="post" style="margin-left:40%;width:70%;">';
		for ($i=1; $i <=$n ; $i++) 
		  { 
			echo '<label>';
			echo '<strong>MOT N°</strong>'.$i.'<br>';
			echo '</label>';
			echo '<input type="text" name="champs[]" style="width:30%; height:20px; border-radius: 2px;background-color:#F4F4F4;border:1px solid #042425; " />';
			echo  '<br><br>';
			if ($i==$n) 
			  {
				echo '<input type="submit" name="submit" value="COMPTER(M)" style="width:15%;height: 30px; font-size: 20px;background-color:#042425;color: white;margin-left :8%;" />';
		      
		      }
		  }
		echo '</form>';
    
		

    }
else{
	 	echo "<br>";
	 	echo '<strong style="font-size:30px;"">Veuillez mettre un nombre</strong> ';
    }


	} #FIN  du premier isset

if (isset($_POST['submit'])) 
{
  
  $tab=$_POST['champs'];
  //var_dump($_POST['champs']);
$tesvalide=true;

 for ($i=0; $i <Count($tab); $i++) 
  { 

 	if ( empty($tab[$i]) or Motvalide($tab[$i])==false  ) 
 	{
 	   $tesvalide=false;
 	   break;
 	}

 	
 }

 if ($tesvalide==true) 
  {
    echo "<h2> les mots du texte sont :  </h2>";
    for ($i=0; $i <CompterNombreElement($tab) ; $i++) 
      { 
        echo '<strong>mot '.$i.' : '.$tab[$i].' </strong><br><br>';
	            	
      }

    echo "<h2> les mots qui contiennent la lettre m ou M ?  </h2>";
$tr=false;
  for ($i=0; $i <CompterNombreElement($tab); $i++) 
   { 
 	    $nm=CompterNombreDeM($tab[$i]);
 
 			 if ($nm>=1) 
	 			 {
	 			 	$tr=true;
	             echo '<strong>mot '.$i.' : qui est '.$tab[$i].' a '.$nm.' lettre(s) m </strong><br><br>';
	            } 	
 	}
   if ($tr==false) {
 	  echo " <h2>y en a pas dans la phrase </h2>";
 	}
 	
 }
  else
  	{ 
  		
  		
		echo '<form method="post" style="margin-left:40%;" width:70%;>';
		echo '<h2>il ya une ou des entrees invalides , veuillez reessayer </h2>';
		for ($i=1; $i <=Count($tab) ; $i++) 
		  { 
		  	
			echo '<label>';
			echo '<strong>MOT N°</strong>'.$i.'<br>';
			echo '</label>';
			if (Motvalide($tab[$i-1])==true) {
				echo '<input type="text" name="champs[]" value='.$tab[$i-1].'  style="width:30%; height:20px; border-radius: 2px;background-color:#F4F4F4;border:1px solid #042425; " />';
			echo  '<br><br>';
			} else 
			{
                
	echo '<input type="text" name="champs[]" value="'.$_POST['champs'][$i-1].'" style="width:30%; height:20px; border-radius: 2px;background-color:#F4F4F4;border:1px solid #042425; ">'; 
				echo '<span style="color:red;">(ce champ n est pas valide)</span>';
				echo "<br><br>";
			}
			
			
			if ($i==Count($tab)) 
			  {
				echo '<input type="submit" name="submit" value="COMPTER(M)" style="width:20%;height: 30px; font-size: 20px;background-color:#042425;color: white;margin-left :8%;" />';
		      
		      }


		  }
		echo '</form>';
  	}




			
}# fin du deuxiem isset 
 
 
 #DEBUT DES FONCTIONS 

 
 /* fonction qui compte le nombre d element un tableau */
function CompterNombreElement($tab) {
$i=0;
$nb=0;
while (!empty($tab[$i]) ) {
	$nb=$nb+1;
	$i=$i+1;
	# code...
}
return   $nb;
}


#la fomction qui compte le nombre de caractere d'une chaine donnne

function CompteNombreCaractere($chaine) {
$i=0;
$nb=0;
while (!empty($chaine[$i]) ) {
	$nb=$nb+1;
	$i=$i+1;
	# code...
}
return   $nb;

}

#la fonction qui compte le nombre de m ou M dans une  chaine donnne

function CompterNombreDeM($chaine) {
$nb=0;

for ($i=0; $i <CompteNombreCaractere($chaine); $i++) { 
	if (($chaine[$i]=='m') or ($chaine[$i]=='M') ) {
		$nb=$nb+1;
}

}
return   $nb;

}


// fonction qui verifie si un caractere est present dans une chaine 
 function VerifCaractere($car,$chaine) {
$trouve=false;
for ($i=0; $i <CompteNombreCaractere($chaine); $i++) 
 { 
	if ($chaine[$i]==$car) 
	{
		$trouve=true;
		break;
    }

 }
 return $trouve;

}
// fonction qui verifie si une chaine est valide c est a dire ne contient que des lettres alphabetiques 
function Motvalide($chaine ) {

$lettres=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$lettresM=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
$v=CompterNombreElement($lettres);
$t=false;
$nbr=CompteNombreCaractere($chaine);
if ($nbr>20) {
	$t=false;
}
 else {
 for ($i=0; $i <$nbr; $i++) 
  { 
 	   for ($j=0; $j <$v ; $j++) 
 	    { 
 	      if ($chaine[$i]==$lettres[$j] or $chaine[$i]==$lettresM[$j]) 
	 	      {
	 		    $t=true;
	 		    break;
	 	      }	 
	 	   if ($j==$v-1) {
	 	   	$t=false;
	 	   	break;
	 	   }

 	   }
 	   if ($t==false) 
	 	     {
	 	      break;
 	         }     
 }	
 }
 
return $t;
}

// fonction qui verifie si  l argument est un nombre


function is_num($arg){ 
	if (!(int)$arg) {
	return false ;
	}
	else
	{
		return true;
	}
}

function is_numerics($chaine)
{
	for ($i=0; $i <CompteNombreCaractere($chaine) ; $i++) { 
		$t=true;
		if (is_num($chaine[$i])==false) {
			$t=false;
			break;
		} 
		
	}
	return $t;
}


// verifie un caractere majuscule 
function is_upper($car ) {
return ($car >= 'A' && $car <= 'Z');
}	
// verifie un caractere minuscule 
function is_lower($car ) {
return ($car >= 'a' && $car <= 'z');
}	 
// fonction qui verifie si un nombr est un entier positif 
function is_entier($n) {
return ($n>0 || $n=='0');
} 

#FIN DES FONCTIONS 		 

 		?>
	

</div>
   
</body>
</html>