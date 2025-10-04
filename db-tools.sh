#!/bin/bash

CONTAINER=db
DB_USER=angio
DB_PASS=kotor
DB_NAME=angio
BACKUP_FILE=backups/backup-$(date +%F).sql

case "$1" in
  dump)
    echo "Pravim dump baze..."
    docker exec $CONTAINER mysqldump -u$DB_USER -p$DB_PASS $DB_NAME > $BACKUP_FILE
    ;;
  restore)
    echo "Vraćam bazu iz dump-a..."
    cat $BACKUP_FILE | docker exec -i $CONTAINER mysql -u$DB_USER -p$DB_PASS $DB_NAME
    ;;
  *)
    echo "Usage: $0 {dump|restore}"
    exit 1
esac

