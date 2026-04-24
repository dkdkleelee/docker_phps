#!/bin/bash
# ============================================================
# DB 마이그레이션 러너
# 사용: docker exec local_mariadb bash /migrate.sh
# ============================================================

MIGRATION_DIR="/migrations"
DB="${MYSQL_DATABASE}"
USER="${MYSQL_USER}"
PASS="${MYSQL_PASSWORD}"
HOST="localhost"

echo "=== Migration 시작 ==="

# _migrations 테이블 없으면 생성
mysql -h"$HOST" -u"$USER" -p"$PASS" "$DB" <<'SQL'
CREATE TABLE IF NOT EXISTS `_migrations` (
  `id`          int(11) NOT NULL AUTO_INCREMENT,
  `filename`    varchar(255) NOT NULL,
  `executed_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filename` (`filename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL

# migrations 폴더의 .sql 파일을 순서대로 실행
for file in $(ls "$MIGRATION_DIR"/*.sql | sort); do
  filename=$(basename "$file")

  # 이미 실행된 파일이면 스킵
  already=$(mysql -h"$HOST" -u"$USER" -p"$PASS" "$DB" -se \
    "SELECT COUNT(*) FROM _migrations WHERE filename='$filename'")

  if [ "$already" -gt 0 ]; then
    echo "  SKIP: $filename (이미 실행됨)"
    continue
  fi

  # 실행
  echo "  RUN:  $filename"
  mysql -h"$HOST" -u"$USER" -p"$PASS" "$DB" < "$file"

  if [ $? -eq 0 ]; then
    mysql -h"$HOST" -u"$USER" -p"$PASS" "$DB" -e \
      "INSERT INTO _migrations (filename) VALUES ('$filename')"
    echo "  OK:   $filename"
  else
    echo "  FAIL: $filename — 중단합니다"
    exit 1
  fi
done

echo "=== Migration 완료 ==="
