FROM node:current-alpine

RUN npm install -g npm-check-updates

USER node

WORKDIR /var/www/html

# Suppress the update-notifier warning
RUN npm config set update-notifier false

ENTRYPOINT ["ncu"]