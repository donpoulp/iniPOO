# POO_Warrior_PHP

## Installation Campus

Votre environnement de développement comprend quelques spécificités et restrictions.

Nous vous proposons de suivre la procédure suivante.

Lancez un terminal Gitbash  et copier/coller ligne par ligne commandes suivantes.

/!\ Controller les messages d'erreurs /!\


### On clone le dépot Git.

/!\ ici `[REPERTOIRE]` fait référence à votre répertoire projet, pensez à parsonnaliser cette valeur /!\

-> Conseil : placer `[REPERTOIRE]` dans le répertoire `www` de Wamp  /!\

```
mkdir [REPERTOIRE]
cd [REPERTOIRE]
git clone https://github.com/campus-digital-grenoble/POO_Warrior_PHP.git .
```

### Avant d'aller plus loin :

Assurer vous que php est correctement configuré pour votre projet

```
php -i # doit Afficher le phpinfo() sans erreurs;
```


### Installation de composer

```
php -r "copy('https://getcomposer.org/composer.phar', 'composer.phar');"
```

### Installation des dépendances via composer

```
php ./composer.phar install
```


### Lancement du serveur 
```
cd public
php -S localhost:8123
```

