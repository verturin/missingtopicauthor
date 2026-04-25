# Missing Topic Author

[![Version](https://img.shields.io/badge/version-1.1.0-blue.svg)](https://github.com/verturin/missingtopicauthor)
[![phpBB](https://img.shields.io/badge/phpBB-3.3.14+-orange.svg)](https://www.phpbb.com/)
[![License](https://img.shields.io/badge/license-GPL--2.0-green.svg)](LICENSE)

Extension phpBB 3.3 — affiche un bandeau d'alerte sur les sujets dont l'auteur est absent ou inactif.

## Fonctionnalités

- **Bandeau rouge** : l'auteur a été supprimé ou anonymisé du forum
- **Bandeau orange** : l'auteur ne s'est pas connecté depuis X jours (seuil configurable)
- Affiché sur **tous les messages** du sujet
- Messages traduits automatiquement en FR et EN selon la langue du visiteur
- Entièrement configurable depuis l'ACP (messages, couleurs, seuil)

## Compatibilité

| Logiciel | Version minimale |
|----------|-----------------|
| phpBB | 3.3.0 |
| PHP | 7.2.0 |

## Installation

1. Télécharger et décompresser l'archive
2. Copier le dossier dans `phpBB/ext/verturin/missingtopicauthor/`
3. Purger le cache : ACP → Général → Purger le cache
4. Activer : ACP → Personnaliser → Gérer les extensions
5. Configurer : ACP → Extensions → Auteur de sujet absent → Paramètres

> **Arborescence requise :** `phpBB/ext/verturin/missingtopicauthor/composer.json`

## Configuration ACP

| Paramètre | Description |
|-----------|-------------|
| Activer l'extension | Interrupteur général sans désinstaller |
| Bandeau rouge — message | Texte affiché quand l'auteur est absent |
| Bandeau rouge — couleur | Couleur hex (défaut : `#cc0000`) |
| Bandeau orange — message | Texte affiché quand l'auteur est inactif |
| Bandeau orange — seuil | Nombre de jours sans connexion (défaut : 180) |
| Bandeau orange — couleur | Couleur hex (défaut : `#ff8800`) |

## Désinstallation

1. Désactiver l'extension dans l'ACP
2. Cliquer sur **Supprimer les données** (rollback complet, aucun résidu en base)
3. Supprimer le dossier `phpBB/ext/verturin/missingtopicauthor/`
4. Purger le cache phpBB

## License

GPL-2.0-only - See [LICENSE](LICENSE)

---

**Made with ❤️ for the phpBB community** · [verturin](https://github.com/verturin)
