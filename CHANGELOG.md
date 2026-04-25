# CHANGELOG

## v1.1.0 — Version finale initiale

### Nouvelles fonctionnalités

- Module ACP complet : activation globale, configuration indépendante des deux bandeaux (message, couleur, seuil)
- **Bandeau rouge** : détection de l'auteur supprimé (compte absent en base ou de type `USER_IGNORE`)
- **Bandeau orange** : détection de l'inactivité basée sur `user_lastvisit` uniquement
- Affichage sur **tous les messages** du sujet (`core.viewtopic_modify_post_row` + injection dans `post_row`)
- Système de messages traduits : clés de langue `MSU_DEFAULT_*` résolues dynamiquement selon la langue du visiteur
- Traductions français et anglais incluses
- Une seule requête SQL par page grâce au cache statique (`static $fetched`, `static $author_row`)
- Protection CSRF du formulaire ACP (`add_form_key` / `check_form_key`)
- Validation côté serveur des couleurs hexadécimales
- Vérification `is_enableable()` : message d'erreur explicite si PHP ou phpBB trop anciens

### Corrections apportées durant le développement

- **Fix** : `composer.json` non conforme phpBB 3.3 — ajout `composer/installers`, licence SPDX, section `authors`
- **Fix** : bandeau déclenché à tort sur comptes verrouillés — logique simplifiée sur existence en base uniquement
- **Fix** : comptes anonymisés (`USER_IGNORE`) qui restent en base après suppression traités comme absents
- **Fix** : bandeau affiché deux fois — propriétés de cache passées en `static`
- **Fix** : messages par défaut en anglais en dur — remplacés par clés de langue traduites dynamiquement
- **Fix** : CSS dupliqué dans chaque post — un seul bloc conditionnel global avec `ELSEIF`
- **Fix** : variables `assign_vars()` invisibles dans la boucle posts — migration vers `$event['post_row']`
