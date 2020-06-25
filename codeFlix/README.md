Pour utiliser le projet c'est plus simple d'avoir phpStorm pour avoir le terminal incorporé

Pour lancer le projet dans le terminal lancé "php artisan serve" dans le dossier ou il se trouve (dans codeFlix) pour pouvoir fonctionner. Ca lance un serveur avec une adresse url localhost ou il suffit de cliquer pour lancer le projet

Pour la construction de la database ca se trouve dans le dossier database puis dans le dossier migrations c'est là ou j'ai créé les differentes tables.
Pour la database j'ai utilisé sqlite donc dans le dossier database il y a un fichier qui s'appelle database.sqlite c'est là ou se trouve la database. Pour afficher simplement la database télécharger SQLite browser qui pourra vous montrer la database plus simplement et voir les enregistrements. Une fois télécharger faut ouvrir une base de donné sélectionner le database.sqlite. Pour voir les données il faut aller sur le bouton parcourir les données et vous pouvez changer la table sur le select avec les différentes tables.

Pour les vues on peut les voir dans ressources > views ils ont gardé le même nom que dans le projet et pour celle créée médiaWatch c'est pour le visonnage des vidéos

pour les controller il se trouve dans le dossier routes et dans le fichier web.php. Pour les routes get c'est le traitement de la vue qu'on voit et les routes posts c'est quand on soumet un formulaire. la fonction est une fonction inconnue qui est dans les parametres de la route c'est le deuxième argument

la fonction with dans certaines routes permet de faire passer des variables à la vue en indiquant leur nom et la variables contenant les données transmise à la vue s'appelera comme le premier argument passer à la fonction with


Pour les parametres de l'application c'est dans le .env on peut y retrouver le type de la database mais aussi un serveur smtp qui permet d'envoyer des vrais mails.
