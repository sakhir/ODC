<?php 
session_start();

$T = array (
    'inferieur' => array(),
    'superieur' => array()
);


for ($i=0; $i <count($_SESSION['tableau']) ; $i++) { 

              if ($_SESSION['tableau'][$i]>$_SESSION['moyenne']) {
              	array_push($T['superieur'], $_SESSION['tableau'][$i]) ;
              	}
            }

$li='moyennesup.php?page=%d';     
pagination($T['superieur'],$li);

      echo ' <h2><l AFFICHAGE DU TABLEAU DES VALEURS SUPERIEURS A LA MOYENNE : </h2> <br>';               
            
            // Affichage du tableau T1

$NbrCol = 10;
$NbrLigne=10;
echo '<table border="1" width="400">';
$s=0;
$nbt1=count($T['superieur']);
for ($i=0; $i< $NbrLigne; $i++) {
   echo '<tr>';
       for ($j=0; $j<$NbrCol; $j++) {    
              echo '<td>';

	               if (!empty($T['superieur'][$s])) {echo $T['superieur'][$s];$s++;}
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

 
    
            // FIN AFFICHAGE T1

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