FROM node:20

WORKDIR /docs

COPY . .

RUN npm install --global insomnia-documenter serve

CMD ["serve"]

EXPOSE 3000
