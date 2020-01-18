# Wikiim

__Bienvenue sur le code de Wikiim, la pateforme collaborative étudiante de l'IIM.__
Celle-ci a pour objectif de partager des cours et du contenu entre étudiants et
de renforcer la communication et l'entre-aide entre les étudiants et avec 
les différentes entités de l'école (Associations, etc).

Le projet comporte plusieurs librairies indispensables parmi lesquelles : 
- symfony/var-dumper,
- doctrine/orm,
- twig/twig,
- cocur/slugify

Pour installer le projet, il suffit de le télécharger.<br>
Installer le dossier vendor avec : `composer install`<br>
Pour mettre à jour la base de données, créer la base de 
données et utiliser :<br> `vendor/bin/doctrine orm:schema-tool:update --dump-sql --force`

<br><br>

© Timothée CORRADO (Github : [AliasTim](https://github.com/aliastim/), voir [Mes Cours](https://gist.github.com/aliastim/))