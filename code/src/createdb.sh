#!/bin/bash

if [ ! -f 'dump.sql' ]
then
sudo mysqldump --user=root --password=toor Application > dump.sql;
fi


FILE='students.txt'

if [ ! -f $FILE ]
then
	echo "FILE $FILE NOT FOUND"
else
	sudo mysqladmin --user=root --password=toor create Application14057308;
	sudo mysql --user=root --password=toor Application14057308 < dump.sql;
	while read p;do
		sudo mysqladmin --user=root --password=toor create Application$"$(echo -e "$p" | tr -d '[:space:]')";
		sudo mysql --user=root --password=toor Application$"$(echo -e "$p" | tr -d '[:space:]')" < dump.sql;
	done<$FILE
fi
