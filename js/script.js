'use strict';

var cases;

function verifCase(){
//sélectionner toutes les cases qui sont cochées
var casesChecked=document.querySelectorAll('input[type=checkbox]:checked');
var button=document.querySelector('#buttonSelect');

//sélectionne toutes les cases à cocher

    //si les 2 nbres sont égaux c'est que tout est coché
    if(casesChecked.length==cases.length){
        button.value="Tous désélectionner";
        button.setAttribute('name','decocheall');
    }
    else{
        button.value="Tous sélectionner";            
        button.setAttribute('name','cocheall');
    }
    //modifier attribut name du bouton et contenu textuel
}

//evènement

document.addEventListener('DOMContentLoaded',function(){
    cases=document.querySelectorAll('input[type=checkbox]');
    for(var i=0;i<cases.length;i++){
        cases[i].addEventListener('click',verifCase);
    }
    console.log(cases);   //nodelist du nombre de cases a cocher
});