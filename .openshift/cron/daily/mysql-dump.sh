# Daily backup mysql database
/usr/bin/mysqldump -h $OPENSHIFT_DB_HOST -P $OPENSHIFT_DB_PORT -u $OPENSHIFT_DB_USERNAME --password=$OPENSHIFT_DB_PASSWORD $OPENSHIFT_APP_NAME --add-drop-table > $OPENSHIFT_DATA_DIR/wordpress.sql
