# CHANGELOG

## v1.2.0

### Nouvelles fonctionnalités

- **CSS dédié** : style des bandeaux déplacé dans `styles/all/theme/msu.css`, chargé via `{% INCLUDECSS %}` natif phpBB 3.3
- **Template Twig** : `viewtopic_body_postrow_post_before.html` converti en syntaxe Twig phpBB 3.3
- **Messages d'erreur localisés** : messages `is_enableable()` dans `language/*/install_lang.php` (FR + EN)
- **Position d'affichage** : nouveau paramètre ACP — premier message de chaque page uniquement, ou tous les messages
- **composer.json** : version 1.2.0, homepage projet et auteur, contrainte phpBB ≥ 3.3.11, bloc `version-check` GitHub

---

## v1.1.0 — Version initiale

### Fonctionnalités

- Module ACP complet : activation globale, configuration indépendante des deux bandeaux (message, couleur, seuil)
- **Bandeau rouge** : détection de l'auteur supprimé (compte absent en base ou de type `USER_IGNORE`)
- **Bandeau orange** : détection de l'inactivité basée sur `user_lastvisit` uniquement
- Affichage sur tous les messages du sujet (`core.viewtopic_modify_post_row` + injection dans `post_row`)
- Système de messages traduits : clés de langue `MSU_DEFAULT_*` résolues dynamiquement
- Traductions français et anglais incluses
- Une seule requête SQL par page grâce au cache statique
- Protection CSRF du formulaire ACP
- Validation côté serveur des couleurs hexadécimales
- Vérification `is_enableable()` avec message d'erreur explicite
