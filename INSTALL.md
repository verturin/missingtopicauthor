# Guide d'installation et de mise à jour

## Installation fraîche

1. Télécharger la dernière release depuis [GitHub](https://github.com/verturin/missingtopicauthor/releases)
2. Décompresser l'archive
3. Copier le dossier dans `phpBB/ext/verturin/missingtopicauthor/`
4. Purger le cache : ACP → Général → Purger le cache
5. Activer : ACP → Personnaliser → Gérer les extensions → Activer
6. Configurer : ACP → Extensions → Auteur de sujet absent → Paramètres

> **Important :** le fichier `composer.json` doit se trouver directement dans  
> `phpBB/ext/verturin/missingtopicauthor/composer.json`  
> Toute autre structure empêchera la détection par phpBB.

## Mise à jour depuis une version antérieure

1. Dans l'ACP, désactiver l'extension (ne pas supprimer les données)
2. Remplacer le contenu de `phpBB/ext/verturin/missingtopicauthor/` par les nouveaux fichiers
3. Purger le cache phpBB
4. Réactiver l'extension : phpBB exécute automatiquement les nouvelles migrations

## Désinstallation

### Désactivation simple (réversible)

ACP → Personnaliser → Gérer les extensions → Désactiver  
La configuration est conservée en base. Réactiver restaure l'extension à l'identique.

### Suppression complète

1. Désactiver l'extension
2. Cliquer sur **Supprimer les données** — rollback migration : suppression des entrées config et du module ACP
3. Supprimer physiquement `phpBB/ext/verturin/missingtopicauthor/`
4. Purger le cache phpBB

> Aucune table personnalisée n'a été créée. La désinstallation ne laisse aucun résidu en base.
