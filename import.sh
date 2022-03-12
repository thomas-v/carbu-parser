#!/bin/bash
file=$(date '+%Y%m%d')
tempDir="temp"
url="https://donnees.roulez-eco.fr/opendata/jour"

wget -O $tempDir/$file $url
unzip -o -d $tempDir/ $tempDir/$file
rm -f $tempDir/$file
mv $tempDir/PrixCarburants_quotidien_$(date --date='1 days ago' +%Y%m%d).xml $tempDir/$file.xml

php parse.php