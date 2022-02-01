#!/bin/bash
file=$(date '+%Y%m%d')

wget -O temp/$file https://donnees.roulez-eco.fr/opendata/jour
unzip -o temp/$file
rm -f temp/$file
mv PrixCarburants_quotidien_20220131.xml temp/$file.xml