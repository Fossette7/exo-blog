<?php
    //On essaye de se connecter à la Base de données
    try
    {
        $bdd = new PDO ('mysql:host=localhost; dbname=test; charset=utf8','root','jimmjimm');
        PDO::ERRMODE_EXCEPTION;
    }
    /*Si la connexion echoue, on attrape/catch une Exception, et on affiche le message d'erreur. Ce qui évite d'avoir son mot de passe afficher sur la page du site */
    catch (Exception $e)
    {
        die('Erreur:'. $e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM jeux_video');

    //afficher le résultat de la requête, ici on récupère la première ligne. $data est un array
    $data=$reponse->fetch();
    //il faut faire une boucle pour récupérer les données une à une
    while($data=$reponse->fetch())
    {
        ?>
        <p>
            <strong>Jeu</strong> : <?php //on récupère le champs 'nom' qui correspond à une entrée de l'array $data
            echo $data['nom']; ?><br />
            Le possesseur de ce jeu est : <?php echo $data['possesseur']; ?>, et il le vend à
            <?php echo $data['prix']; ?> euros !<br />
            Ce jeu fonctionne sur <?php echo $data['console']; ?> et on peut y jouer à
            <?php echo $data['nbre_joueurs_max']; ?> au maximum<br />
            <?php echo $data['possesseur']; ?> a laissé ces commentaires sur <?php echo $data['nom']; ?> :
            <em><?php echo $data['commentaires']; ?></em>
        </p>
        <?php
    }
    //termine le traitement de la requête
    $reponse->closeCursor();

    //on est déja connecter à la BD voir au dessus

   //on met dans une variable la réponse de notre requête Mysql

       $response = $bdd->query('SELECT nom FROM jeux_video');

   // on affiche le résultat de la requête, avec fetch on récupère la première ligne
       $gametitle=$response->fetch();
    // il faut faire une boucle pour récupérer les données une à une
        while ($gametitle=$response->fetch())
        {
            echo $gametitle['nom']. '<br/>';
        }
        $response->closeCursor();

$i = 1;
while ($i <= 10):
    echo $i;
    $i++;
endwhile;

$i = 1;
while ($i <= 10):
    echo $i++;
endwhile;

$response = $bdd->query('SELECT nom, possesseur, console, prix FROM jeux_video WHERE console=\'Xbox\' OR console=\'PS2\' ORDER BY prix DESC LIMIT 0,10');

$selection=$response->fetch();
while ($selection=$response->fetch())
{
    echo 'les propriétaires'. $selection['nom'],$selection['possesseur'],'les consoles'.$selection['console'],'les prix'.$selection['prix']. '<br/>';
}
$response->closeCursor();

echo '*';

// Définition de la class User
class User {
    private $id;
    private $nom;
    private $prenom;
    private $age;

    public function __construct()
    {
        $this->id = rand(1, 99999999);
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($sendprenom)
    {
        $this->prenom = $sendprenom;
    }

    public function ajouteprenom($prenomajoute)
    {
        $this->prenom = $prenomajoute;
    }
    // getage pour pour afficher/ retourner l'attribut privé age si pas de valeur ajouté alors age= NULL
    public function getage()
    {
        return $this->age;
    }
    // setage pour ajouter valeur à l'attribut age, grâce au paramètre ($addage) qu'on attribut à setage()
    public function setage($addage)
    { // la propriété age à la valeur du paramètre $addage
        $this->age = $addage;
    }
}

// ..
// ..
// ..

// Exo1 => Creer un utilisateur avec un nom et prénom

$user1 = new User();
    $user1->setNom('Dupont');
    $user1->setPrenom('Jacques');
    $user1->setage(22);


// Exo2 => Creer un utilisateur avec un autre nom et autre prénom
$user2= new User();
$user2->ajouteprenom('Fred');
$user2->setNom('Poux');
$user2->setage(26);


// Exo3 => Ajouté ces deux utilisateurs dans le tableau listeUser
$listeUser = [];
$listeUser[0] = $user1;
$listeUser[1] = $user2;


// Exo4 => Parcourir le tableau avec foreach et afficher le nom
foreach($listeUser as $eachvalue){
echo $eachvalue->getPrenom();
}

// Exo5 => Ajouter l'age dans la classe User et l'afficher dans le foreach
foreach ($listeUser as $currentvalue){
    echo $currentvalue->getage();
}

$ageuser=$user2->getage();
echo $ageuser;

echo $user2->getage();

echo '<br/>l\'age de user'. $listeUser[1]->getage();