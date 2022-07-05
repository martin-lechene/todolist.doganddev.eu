# ToDo List
Created by [Martin Lechêne](https://martin.lechene.be/) for [Canell](https://canell.be/)
## Description fonctionnelle du projet
#### Fonctionnalités attendues :
- [ ] Elle devrait pouvoir être utilisée par plusieurs entreprises clientes
- [ ] Chaque client possédera plusieurs employés qui pourront accéder aux tâches propres à leur entreprise.
- [ ] Chaque tâche marquée comme terminée affichera le nom de l’utilisateur qui l’a déclarée achevée
- - [ ] Crée une condition pour que seul un admin peut voir qui affiche la tâche marquée comme terminée
- - [ ] Crée une table qui log toutes les actions de l’utilisateur quand il clique sur la fin de tache
- [ ] Bien évidemment une isolation parfaite entre les tâches entreprises sera demandée
- - [] Crée une condition pour que seul les membres de cette company peuvent voir leur propre tâches
- [X] Un système d’authentification devra être mis en place se basant sur un couple mail / password.
- [X] La procédure de récupération de mot de passe devra être fonctionnelle
- - [X] Log des mail via maildev
- [ ] Le fait de cocher une tâche ne provoque pas le rechargement de la page mais une mise à jour de celle-ci
- - [ ] Gérer les chargements via JQuery ou Ajax ou Livewire
- [X] L’administrateur seul peut repasser l’état d’une tâche à inachevée
-  - [X] Crée une condition sur le rôle admin permettant de mettre a jour en non completé
#### Bonus :
- [ ] Bonus: interface multilangue FR/EN
- - [X] Rajout des langues `FR` dans des fichiers de traduction
- - [ ] Traductions des fichiers
- - [ ] Intégration button fr/en des `traductions app.blade.php`
- [ ] Bonus: une page de gestion des employés de l’entreprise avec la possibilité de créer un nouvel employé et d’envoyer une invitation par mail
- - [ ] Formulaire de création d'employés accessible que par l'entreprise
- - [ ] Formulaire d'envoi d'invitation par mail
- - [ ] Système de gestion des employés
- [ ] Bonus: gestion des dates. Possibilité d’ajouter une deadline sur une tâche. La tâche s’affiche en rouge si la deadline est dépassée. Affichage de la date à laquelle la tâche a été achevée.

## Aspects techniques
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

