FROM node:current-alpine

WORKDIR /var/www/html

CMD ["npm", "run", "dev"]
