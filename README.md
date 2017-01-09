# POO_Warrior_PHP

## Installation Campus

Votre environnement de développement comprend quelques spécificités et restrictions.

Nous vous proposons de suivre la procédure suivante.

Lancez un terminal Gitbash  et copier/coller ligne par ligne commandes suivantes.

/!\ Controller les messages d'erreurs /!\


### On clone le dépot Git.

/!\ ici `[REPERTOIRE]` fait référence à votre répertoire projet, pensez à parsonnaliser cette valeur /!\

-> Conseil : placer `[REPERTOIRE]` dans le répertoire `www` de uWamp  /!\

```
mkdir [REPERTOIRE]
cd [REPERTOIRE]
git clone https://github.com/campus-digital-grenoble/POO_Warrior_PHP.git .
```

### Configuration spéciale uWamp/Campus

Cette procédure est optionnelle, passer à _Installation de composer_

```
Uwamp='c:\uwamp' # A personnaliser avec le repertoire d'install de uwamp
sed -e "s/{PHPEXTPATH}/$(echo ${Uwamp} | sed -e 's/[]\/$*.^|[]/\\&/g')\\\bin\\\php\\\php-5.6.18\\\ext/g" -e "s/{APACHEPATH}/$(echo ${Uwamp} | sed -e 's/[]\/$*.^|[]/\\&/g')\\\apache/g" -e "s/{PHPZENDPATH}/$(echo ${Uwamp} | sed -e 's/[]\/$*.^|[]/\\&/g')\\\bin\\\php\\\php-5.6.18\\\zend_ext/g" -e "s/{TEMPPATH}/$(echo ${Uwamp} | sed -e 's/[]\/$*.^|[]/\\&/g')\\\temp/g" -e "s|^;\(date\.timezone[[:space:]]*=\).*|\1 \"Europe/Paris\"|g" ${Uwamp}/bin/php/php-5.6.18/php_uwamp.ini  > php.ini
echo "alias php='php -c ./php.ini'" >  ~/.bashrc
echo "alias composer='php ./composer.phar'" >> ~/.bashrc
echo "export PATH=\$PATH:'${Uwamp}\bin\database\mysql-5.7.11\bin\:${Uwamp}\bin\php\php-5.6.18\'"  >> ~/.bashrc
source ~/.bashrc
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
composer install
```


### Lancement du serveur 
```
cd public
php -S localhost:8123
```

