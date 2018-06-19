#!/bin/sh


ls_date=`date +%Y%m%d`
mongodump -h 127.0.0.1:20088 -d fecshop -o /root/mongodata/fechsop.$ls_date
echo "finish!";

