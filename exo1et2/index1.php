<?php 
session_start();



   $_SESSION['tableau']=StockerNombrePremiers(2,$_SESSION['valeur'],$_SESSION['tableau']);
   $page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
$total = count( $_SESSION['tableau']);  
$limit = 100; //par page    
$totalPages = ceil( $total/ $limit ); 
$page = max($page, 1); 
$page = min($page, $totalPages); 
$offset = ($page - 1) * $limit;
if( $offset < 0 ) $offset = 0;

$_SESSION['tableau']= array_slice( $_SESSION['tableau'], $offset, $limit );
               
      echo ' <h2><l AFFICHAGE DU TABLEAU T1</h2> <br>';               
      echo "<h2>les nombre premiers de 2 a la valeur entree</h2>";
            
            // Affichage du tableau T1

$NbrCol = 10;
$NbrLigne=10;
echo '<table border="1" width="400">';
$s=0;
$nbt1=count($_SESSION['tableau']);
for ($i=0; $i< $NbrLigne; $i++) {
   echo '<tr>';
       for ($j=0; $j<$NbrCol; $j++) {    
              echo '<td>';

	               if (!empty($_SESSION['tableau'][$s])) {echo $_SESSION['tableau'][$s];$s++;}
	                else
	                  {echo "null";}
              echo '</td>';
         }
   echo '</tr>';
   if ($s==($NbrLigne*$NbrCol)) {
     break;
   }


}
echo '</table>';

//pagination($_SESSION['tableau'],$link);
    
            // FIN AFFICHAGE T1


// partie pagination 
$link ='index1.php?page=%d'; 
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

/* function pagination($t,$lien) {

               
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

 */

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

 ?>
 