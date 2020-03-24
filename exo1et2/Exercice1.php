<!DOCTYPE html>
<html>
<head>
	<title>exo1</title>
	<style type="text/css">
		
	</style>
	
</head>
<body>
	     <h2> EXERCICE 1 </h2>
		<div id="container">
		 <form  method="post" >
			<div class="">
			<label for="">ENTRER UNE VALEUR SUPERIEUR A 10 000 </label> : <input type="text" name="a" value="<?php if (isset($_POST['a'])){echo $_POST['a'];} ?>" /><br><br>
			<input type="submit" value="VALIDER" name="valider" />
			</div>
		</form>

		<?php 

 session_start();


if (isset($_POST['valider']) ) {
$a=$_POST['a']; 
$T1=array();
$T = array (
    'inferieur' => array(),
    'superieur' => array()
);


$moy;
 # LE TABLEAU NUMERIQUE 
	

	if (is_numeric($a)) 
       {
	  
	   if ($a<=10000) {
	   	  	echo "entrer une valeur positive superieur  a 10 000 ";
	   	  } 
	   	  else 
	   	  {
	   	  	

	  	    #DEBUT DU  TRAITEMENT SI LA VALEUR EST SUPERIEUR A 10 000
	  	    set_time_limit(120);  
              $T1=StockerNombrePremiers(2,$a,$T1);
              $_SESSION['valeur']=$a;
              $_SESSION['tableau']=$T1;
              // header('Location:index1.php');
 
    
            // FIN AFFICHAGE T1

              $moy=moyenne($T1); 
              $_SESSION['moyenne']=$moy;
            // eparer les inferieurs et les superieures a la moyenne 
             for ($i=0; $i <count($T1) ; $i++) { 

              if ($T1[$i]<$moy) {
              	array_push($T['inferieur'], $T1[$i]) ;
              	}
              	 else {
              	 array_push($T['superieur'], $T1[$i]) ; 	
              	 }	
              	
              }

            
            echo '<a href="index1.php">voir tous les nombres dans l intervalle </a><br><br>'; 
            echo '<a href="moyenneinf.php">voir les nombres inferieurs a la moyenne <br><br> </a>';
            echo '<a href="moyennesup.php">voir les nombres superieurs a la moyenne </a>';   
            #FIN DU TRIATEMENT SI LA VALEUR EST SUPERIEUR A 10000
	   	  }	   	  	   	  
    
      }
      else {
       echo "entrer un nombre ";	
      }



	} #FIN DU ISSET 




 #DEBUT DES FONCTIONS 

# fonction qui teste si  un nombre est premier ou non 
function testpremier($a)  {
	$i=2;$t=true; $v;
	 while ( $i<=($a/2) and $t==true) {
	   	  	   	  
	  if ($a%$i==0) {
		   $t=false;
		   	  	    }
		   	$i=$i+1;
		   	   }	   	  
	   	  	   
	   	 if ($t==true) {
	   	  	  $v=true;
	   	  	  } 
	   	  	   else {
	   	  	   $v=false;
	   	  	  }
	   	   
	   	  	  return $v;
}  

# fonction qui stocke dan un tableau  tous les nombres premiers compris entre a et b 

function StockerNombrePremiers($a ,$b,$t) {
	
   $t=array();
	for ($i=$a; $i<=$b  ; $i++) { 
		# code...
		if ( testpremier($i)==true) {
			array_push($t,"$i");
			# code...
		}
	}
	return $t; 	
} 

# fonction qui renvoie la moyenne des elements d'un  tableau :

function moyenne($tab) {
 $nb_element=count($tab);
 $somme=0;$moy;

  for ($i=0; $i <$nb_element ; $i++) {
  $somme=$somme+$tab[$i]; 
  	# code... 
  }
  $moy=($somme/$nb_element);
  return $moy;
}

 #FIN DES FONCTIONS 	
function pagination($t,$lien) {

/*   $t=StockerNombrePremiers(2,$val,$t);*/
               
$page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
$total = count( $t);  
$limit = 100; //par page    
$totalPages = ceil( $total/ $limit ); 
$page = max($page, 1); 
$page = min($page, $totalPages); 
$offset = ($page - 1) * $limit;
if( $offset < 0 ) $offset = 0;

$t= array_slice( $t, $offset, $limit );

$link =$lien; 
$pagerContainer = '<div style="width: 300px;">';   
if( $totalPages != 0 ) 
{
  if( $page == 1 ) 
  { 
    $pagerContainer .= ''; 
  } 
  else 
  { 
    $pagerContainer .= sprintf( '<a href="' . $link . '" style="color: #c00"> &#171; prev page</a>', $page - 1 ); 
  }
  $pagerContainer .= ' <span> page <strong>' . $page . '</strong> from ' . $totalPages . '</span>'; 
  if( $page == $totalPages ) 
  { 
    $pagerContainer .= ''; 
  }
  else 
  {

 

    $pagerContainer .= sprintf( '<a href="' . $link . '" style="color: #c00" > next page &#187; </a>', $page + 1 ); 

  }           
}                   
$pagerContainer .= '</div>';

echo $pagerContainer;   


}


 	?>
	

</div>
   
</body>
</html>