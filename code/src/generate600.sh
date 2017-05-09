#/! /bin/bash
# bash generate random alphanumeric strings 600 Times
#

#bash generate random 6 character alphanumeric strings 
i=0;
while [[	$i	-lt	600	]]; do
	NEW_UUID=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 6 | head -n 1)
	sha1_value=$(echo -n $NEW_UUID | sha1sum | awk '{print $1}')
	echo "FIB"$'\t'$NEW_UUID$'\t'"ACK"$sha1_value
	let i=i+1;done >numbers600.txt
