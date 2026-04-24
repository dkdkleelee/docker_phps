#!/bin/bash
# ============================================================
# MySQL 데이터 백업 스크립트
# cron 예시: 0 3 * * * /path/to/backup.sh
# ============================================================

BACKUP_DIR="/backup/mysql"
DATE=$(date +%Y%m%d_%H%M%S)
CONTAINER="local_mariadb"
DB="cstmsg"
USER="cstmsg"
PASS="cstmsg!@34qwer@@"

mkdir -p "$BACKUP_DIR"

# 데이터 풀 백업
docker exec "$CONTAINER" mysqldump -u"$USER" -p"$PASS" "$DB" \
  > "$BACKUP_DIR/${DB}_${DATE}.sql"

# DDL만 따로 백업 (스키마 확인용)
docker exec "$CONTAINER" mysqldump -u"$USER" -p"$PASS" --no-data "$DB" \
  > "$BACKUP_DIR/${DB}_schema_${DATE}.sql"

# 30일 이상 된 백업 삭제
find "$BACKUP_DIR" -name "*.sql" -mtime +30 -delete

echo "[$(date)] 백업 완료: ${DB}_${DATE}.sql"
