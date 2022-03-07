<?php


// ecriture dans le fichier CSV

if(isset($_POST['titre'])){
    $file=fopen('taches.csv','a');
    fputcsv($file,array($_POST['titre'],$_POST['details'],$_POST['priorite'],$_POST['jour'],$_POST['mois'],$_POST['annee']));
    fclose($file);
}

if(isset($_POST['coche'])){
if(isset($_POST['suppr'])){
    
    //recuperation de toutes les donnee du fichier et les metre dans un tableau 
    
    $file=fopen('taches.csv','a+');
        $listecomplete=[];
        while(true){
             $afaire=fgetcsv($file);
            if($afaire==false){
                break;
                 }
            else{
                $listecomplete[]=$afaire;
             }
                }
        fclose($file); 



    // suppresion de toute les donnee du fichier csv
    $fichier = fopen('taches.csv', 'r+');
    ftruncate($fichier, 0);
    fclose($fichier);


      $tabcoche=$_POST['coche'];      // recup des post coche en tableau
   
   // suppression des ligne avec l'index des case cocher
       for($f=0;$f<sizeof($tabcoche);$f++){
           $index=$tabcoche[$f];
    unset($listecomplete[$index]);
    }
   

   $tab2=array_values($listecomplete);   // remise en forme du tableaux 
   
   
    
    // on remet uniquement la premiere ligne pour tester
    
    $file=fopen('taches.csv','a');
    for($z=0;$z<count($tab2);$z++){
    fputcsv($file,$tab2[$z]);
    }
    fclose($file);
    
  
}

}


// Affichage des donner du CSV


$file=fopen('taches.csv','a+');
$liste=[];
while(true){
    $afaire=fgetcsv($file);
    if($afaire==false){
        break;
    }
    else{
        $liste[]=$afaire;
    }
}
fclose($file);


$mois=["janvier","fevrier","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","decembre"];

$annee=	date("Y");



$datedujour=mktime(0, 0, 0, date('n'), date('j'), date('Y'));


$idbox=0;

$check="";
$but="Tous selectionner";
$namebutton="cocheall";

if (isset($_POST['cocheall'])) {
    $check="checked";
    $but="Tous désélectionner";
    $namebutton="decocheall";
} 
if (isset($_POST['decocheall'])) {
    $check="";
    $but="Tous selectionner";
    $namebutton="cocheall";
} 




include 'index.phtml';