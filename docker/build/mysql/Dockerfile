FROM mysql:5.6

COPY ./schemas/create_databases.sql /docker-entrypoint-initdb.d/create_databases.sql

COPY ./schemas/parsamaz.sql /docker-entrypoint-initdb.d/parsamaz.sql
