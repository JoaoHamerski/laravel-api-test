FROM node:20

WORKDIR /docs

COPY . .

RUN npm install --global insomnia-documenter serve

RUN insomnia-documenter --config ./insomnia-config.json

CMD ["serve"]

EXPOSE 3000
