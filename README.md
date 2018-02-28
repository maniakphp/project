#Symfony 4 project
1. Read docker READ.me (docker/READ.me)
2. Go to php container (container name you can check using docker ps) and run:
* composer install
* php bin/console doctrine:schema:update --force
* php bin/console doctrine:fixtures:load