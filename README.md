# PHP_POO_Warrior

## Installation Campus

Votre environnement de développement comprend quelques spécificités et restrictions.

Nous vous proposons de suivre la procédure suivante.

Lancez un terminal Gitbash et copier/coller ligne par ligne les commandes suivantes.

/!\ Contrôlez les messages d'erreurs /!\

### On clone le dépôt Git.

/!\ ici `[REPERTOIRE]` fait référence à votre répertoire projet, pensez à personnaliser cette valeur /!\

-> Conseil : placez `[REPERTOIRE]` dans le répertoire `htdocs` de Mamp /!\

```
mkdir [REPERTOIRE]
cd [REPERTOIRE]
git clone https://github.com/le-campus-numerique/PHP_POO_Warrior.git
```

### Avant d'aller plus loin :

Assurez-vous que php est correctement configuré pour votre projet

```
php -i # doit Afficher le phpinfo() sans erreurs;
```


### Installation des dépendances de composer

#### Vous avez déjà Composer installé

Si [Composer](https://getcomposer.org/) est déjà installé sur votre poste, lancez simplement la commande suivante puis passez à l'étape "Lancement du serveur".

```
cd PHP_POO_Warrior
composer install
```

#### Vous n'avez pas Composer installé

```
cd PHP_POO_Warrior
php -r "copy('https://getcomposer.org/composer.phar', 'composer.phar');"
php ./composer.phar install
```


### Lancement du serveur 
```
cd public
php -S localhost:8123
```

Dans votre navigateur connectez vous à [http://localhost:8123](http://localhost:8123)