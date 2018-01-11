# Test Symfony

## Description du projet:
HL7 est un standard international pour les échanges informatisés de données cliniques, financières et administratives entre systèmes d'information hospitaliers (SIH). HL7 v2.5
 cette application permet de recupérer les données du patient et du medecin, dans le message HL7 contenu dans différents fichiers.
  C'est données seront ensuite enregistrer en base.
 

---

### Objectifs:

- Le principal objectif de l'application est de permettre la récupération des informations du patients et du medecin depuis les fichiers txt.
    - Les informations du patient sont :
        -   Nom : PID-5.1
        -   Prénom : PID-5.2
        -   Date de naissance : PID-7
        -   Genre : PID-8
        -   Adresse
        Rue : PID-11.1
        Code postal : PID-11.5
        Ville : PID-11.3

    - Les informations du medecin sont :
        -   Nom : ROL-4.2
        -   Prénom : ROL-4.3
        -   RPPS : ROL-4.1 si ROL-4.13 = ‘RPPS’
---
    
## Installation de l'application
1.Creer la base de donnée test-symfony
2. ouvrir le projet dans un ide ou acceder au repertoire depuis la console
3. Faire un Composer install
    1. l'adresse du serveur (127.0.0.1 par defaut)
    2. le nom de la base mettre "test-symfony" (symfony par defaut)
    3. le login de la connexion à la base (root par defaut)
    4. le mot de passe de la base (null par défaut)
    
pour parser les messages hl7 contenus dans les fichiers .txt (situés dans le repertoire web/files), placer vous dans la console et
 lancé la commande : php app/console app:hl7. Les fichiers seront parsés, en recupérants les informations patients et medecin pour être ensuite enregistrer en base.
 

---

## Bonus
- Affichage des informations du patients:
- Affichages des informations du medecin
- ajout de patient et de medecin
- Edition des informations patient et medecin
- Suppression patient et medecin
