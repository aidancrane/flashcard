FROM node:current-alpine

USER node

WORKDIR /var/www/html

CMD ["npm", "run", "watch"]
