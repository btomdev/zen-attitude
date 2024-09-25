# Zen Attitude
https://github.com/O-clock-Lunar/Projects/issues/5

## Description

Refonte totale d'un site vitrine pour un club d'Aïkido.

Projet concret visant à être mis en ligne pour le club.

Le site doit avoir pour but de présenter à la fois le club et l'Aïkido.

On peut voir plusieurs axes de travail :
- Une partie accessible à tous les visiteurs contenant:
        - une page d'en-tête accrocheuse et un menu menant au infos importantes et à la présentation de la discipline (Tarif, horaires des cours)
        - une page sur les stages club et autres (reliée à une API => https://api.stages-aikido.fr/ )
        - Une inscription à une newsletter (principalement axée sur les stages club (V2)
        - la possibilité de se connecter au site
- Une fois connecté(e) en tant que membre :
        - Accés aux rubriques internes au club (photos/vidéos des cours et des stages, ect..)
        - Une partie User avec une fiche personnelle permettant de voir sa progression et les axes de travail conseillés
        - Mise en place de co-voiturage pour les stages éloignés
        - Inscription au projets interne du club
- Une fois connecté(e) en tant que professeur:
        - acces au fiches perso membres pour la gestion de fiche de progression
- Une fois connecté(e) en tant que Admin :
        - une interface back optimale pour la gestion du site par des non Dev (changement ou ajout de photo/ vidéos, modofocation ou création d'article)


## Installation via Docker

- Installer Docker desktop
- Via un terminal: 
  - Aller dans le dossier ```cd zen-attitude```
  - lancer l'instalation ```make start```
  - stopper ```make down```