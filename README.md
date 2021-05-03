Ephadons-nous est un site internet avec un thème open source personnalisé. Dans ce README vous retrouverais un mode d'emploi nécessaire
pour reconstruire un espace de développement propise à la reprise du site.

Mode D'emploi:

Etape 1 :
L'environnement de developpement est uniquement utilisable sur Linux.
Cloner le projet sur votre ordinateur dans un répertoire facile d'accès.

Etape 2:
Le thème ACF est utilisé sur ce projet donc il vous faudra l'installer puis importer le fichier .json disponible dans le dossier "setup/field.json".

Etape 3:
Pour compiler les scss/js, il faut node 8, nvm install 8.0, et gulp , npm install --global gulp-cli ou npm install gulp
Ensuite il faut se placer dans le répertoire du thème et appeler la commande gulp pour faire compiler votre css.

Etape 4 (Cas d'erreur):
Si une erreur apparaît sur event-stream cela signifie qu'il y a eu un reset sur le fichier "package-lock.json". Dans ce cas, rien de plus simple, 
chercher event-stream avec un ctrl-f dans le fichier puis changer la version de event-stream en "4.0.0" partout où vous verrez la version défaillante
par la suite modifier la ligne "integrity" par : sha512-DOB0pW11hF+A572U9vmYbQuLVvzXb2ZQhP14wAhMesOLoWVmWNKZ05niYwgUEEO7Ex+lbPpsqT+pch4O7Ijqmg==
et enfin il vous faudra supprimer la ligne flatmap-stream.
