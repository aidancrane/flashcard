FROM node:latest

RUN npm install -g npm-check-updates

USER node

WORKDIR /var/www/html

ENTRYPOINT ["ncu"]