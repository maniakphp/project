# Docker skeleton
This repo is part of docker skeleton (default for symfony)

## nginx build
This repo is the nginx build used for running a Symfony application.

## Configuration:
1. Set PROJECT_NAME in nginx/Dockerfile
2. Check if ports set in docker-compose.yml for server and database are not used
3. Change volumes in data service - if needed
4. Run ./run.sh or `docker-compose -f docker-compose.yml -p begginers up -d`
5. Add new entry in hostfile. In my case:
`10.0.75.1 symfony.begginers.local`