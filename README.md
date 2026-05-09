# ARCS - Nouveau site PHP/HTML

Ce dossier est la nouvelle base deployable pour `dev.arcs-france.fr`.

## Objectif

Remplacer progressivement l ancien WordPress Eduma par un site plus simple, plus rapide et plus controlable :

- pages publiques ARCS ;
- catalogue formations ;
- page examens et pre-reservation TEF ;
- formulaires contact et devis ;
- mini administration ;
- stockage local protege en JSONL pour demarrer ;
- structure prete pour migration future vers MySQL et paiement en ligne.

## Structure

```text
index.php          Routeur principal
app/               Logique PHP, routes, API, admin, donnees initiales
views/             Pages et composants HTML
assets/            CSS et JavaScript
storage/           Donnees formulaires, protege par .htaccess
config.sample.php  Modele de configuration serveur
```

## Installation sur Hostinger PHP/HTML

1. Pousser uniquement le contenu de `arcs-site/` dans un depot GitHub.
2. Connecter ce depot au site Hostinger `dev.arcs-france.fr`.
3. Verifier que la racine du site contient directement `index.php`, `.htaccess`, `app/`, `views/`, `assets/`, `storage/`.
4. Copier `config.sample.php` en `config.local.php` sur le serveur.
5. Changer `site_url`, `admin_email`, `mail_from` et `admin_password_hash`.
6. Verifier que `storage/.htaccess` bloque l acces public aux donnees.

## Admin

URL :

```text
https://dev.arcs-france.fr/admin
```

Avant mise en ligne, remplacer le mot de passe admin par un hash fort dans `config.local.php`.

Pour generer un hash sur une machine avec PHP :

```bash
php -r "echo password_hash('MOT_DE_PASSE_FORT_ICI', PASSWORD_DEFAULT), PHP_EOL;"
```

Coller uniquement le hash dans `config.local.php`, jamais le mot de passe en clair.

## E-mails

Pour l instant, les formulaires enregistrent les demandes dans `storage/*.jsonl`.

L envoi e-mail PHP natif est desactive par defaut :

```php
'mail_enabled' => false,
```

Il faudra connecter un SMTP propre ensuite, idealement via une petite librairie PHP ou un endpoint transactional mail configure.

## A faire avant bascule du domaine principal

- Remplacer les contenus provisoires.
- Ajouter les nouveaux PDF : brochure, reglement interieur, Qualiopi.
- Configurer l e-mail officiel.
- Tester contact, devis, reservation et admin.
- Ajouter le paiement en ligne choisi.
- Faire une revue SEO.
- Brancher `arcs-france.fr` seulement apres validation de `dev.arcs-france.fr`.
