<?php
include '../../objets/objetsGeneraux.php';
include '../../functions/fonctionsDB.php';
// API utilisé par tous...
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Origin: [URL du site]"); (API autorisé depuis tel ou tel site )
// 'Content-Type: application/json' permet de spécifier le type de contenu.`
// ici, du JSON. La contrainte REST permet de dev' pour n'importe quel support et le JSON est parfait pour ça.
header("Content-Type: application/json; charset=UTF-8");
// 'Access-Control-Allow-Methods' permet de spécifier la/les méthodes autorisées
header("Access-Control-Allow-Methods: 'GET'");
// 'Access-Control-Max-Age' permet de spécifier le temps de cache. (en seconde)
header("Access-Control-Max-Age: 3600");
// 'Access-Control-Allow-Headers' permet de spécifier les headers autorisés
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 ?>
