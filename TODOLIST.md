# Description fonctionnelle du projet
#### Fonctionnalités attendues :
[X] Elle devrait pouvoir être utilisée par plusieurs entreprises clientes
[X] Chaque client possédera plusieurs employés qui pourront accéder aux tâches propres à leur entreprise.
[X] Chaque tâche marquée comme terminée affichera le nom de l’utilisateur qui l’a déclarée achevée
[X] Bien évidemment une isolation parfaite entre les tâches entreprises sera demandée
[V] Un système d’authentification devra être mis en place se basant sur un couple mail / password.
[X] La procédure de récupération de mot de passe devra être fonctionnelle
[X] Le fait de cocher une tâche ne provoque pas le rechargement de la page mais une mise à jour de celle-ci
[X] L’administrateur seul peut repasser l’état d’une tâche à inachevée
#### Bonus :
[X] Bonus: interface multilangue FR/EN
[X] Bonus: une page de gestion des employés de l’entreprise avec la possibilité de créer un nouvel employé et d’envoyer une invitation par mail
[X] Bonus: gestion des dates. Possibilité d’ajouter une deadline sur une tâche. La tâche s’affiche en
rouge si la deadline est dépassée. Affichage de la date à laquelle la tâche a été achevée.



# Aspects techniques
- Utilisation de Laravel comme base d’application
- MySQL / Mariadb pour la base de données
- Blade au niveau du moteur template
- Bootstrap pour l’aspect responsive
- Eloquent pour l’aspect « Model »
- jQuery et/ou Livewire pour le javascript (si necessaire)
- L’application doit pouvoir être téléchargée d’un repo Github privé et déployée via :
- - Composer pour l’installation de l’app en elle même
- - Les migrations pour la db
- - Le seeding pour les données de test (entreprises, utilisateurs simples et admins)
- Après cette installation l’application doit être fonctionnelle (sous condition d’un .env adapté pour l’hôte)

