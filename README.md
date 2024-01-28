# AfriKare

AfriKare est une plateforme décentralisée de dossiers médicaux électroniques pour l'Afrique, sécurisée par blockchain.

## Description

AfriKare permet aux patients africains de :

- Posséder et contrôler l'accès à leurs propres données de santé
- Partager facilement ces données avec les professionnels de leur choix
- Améliorer la continuité des soins et la coordination entre institutions

AfriKare donne également aux chercheurs et à l'industrie pharmaceutique la possibilité d'accéder à des cohortes de données médicales africaines de qualité, avec consentement, pour faire avancer la médecine de précision pour les populations africaines.

## Caractéristiques techniques

- Blockchain privée basée sur HashGraph Hedera
- Architecture décentralisée
- Interface web sécurisée
- Diagnostic par intelligence artificielle
- Consentement éclairé des patients

## Objectifs

Améliorer les systèmes de santé et la recherche médicale en Afrique en facilitant l'échange et l'accessibilité des données de santé, avec un contrôle accru pour les usagers.

## Installation et Exécution

Suivez ces étapes pour installer et exécuter AfriKare sur votre machine locale.

### Prérequis

- PHP version X.X.X
- Composer installé
- Serveur MySQL
- Navigateur web moderne

### Étapes

1. **Cloner le projet :**

   ```bash
   git clone https://github.com/votre-utilisateur/AfriKare.git
   cd AfriKare
   ```

2. **Installer les dépendances :**

   ```bash
   composer install
   ```

3. **Configurer la base de données :**

   - Copier le fichier `.env.example` en tant que `.env`
   - Configurer les paramètres de base de données dans le fichier `.env`

4. **Migrer la base de données :**

   ```bash
   php artisan migrate
   ```

5. **Lancer le serveur local :**

   ```bash
   php -S localhost:8000 -t public
   ```

6. **Accéder à l'application :**

   Ouvrez votre navigateur et visitez [http://localhost:8000](http://localhost:8000)

## Contribuer

Les contributions sont les bienvenues ! Voir le fichier CONTRIBUTING.md pour plus de détails.
```

Assurez-vous de personnaliser les détails spécifiques à votre projet, tels que le lien du dépôt, la version PHP, etc.