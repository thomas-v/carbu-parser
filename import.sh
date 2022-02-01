wget -O temp/$(date '+%Y%m%d') https://donnees.roulez-eco.fr/opendata/jour
unzip -o temp/$(date '+%Y%m%d')
rm -f temp/$(date '+%Y%m%d')
mv PrixCarburants_quotidien_20220131.xml temp/$(date '+%Y%m%d').xml