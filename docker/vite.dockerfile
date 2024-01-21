FROM node:current-alpine

WORKDIR /var/www/html

# Suppress the update-notifier warning
RUN npm config set update-notifier false

CMD ["npm", "run", "dev"]
