#!/bin/bash

if [ -f 'dump.sql' ]
then
sudo srm dump.sql;
fi


FILE='students.txt'

if [ ! -f $FILE ]
then
        echo "FILE $FILE NOT FOUND"
else
	sudo mysqladmin --user=root --password=toor --force DROP Application14057308;
        while read p;do
                sudo mysqladmin --user=root --password=toor --force DROP Application$"$(echo -e "$p" | tr -d '[:space:]')";
        done<$FILE
fi

