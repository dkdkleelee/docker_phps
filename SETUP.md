# docker_phps 로컬 개발 환경 세팅 가이드

## 전제 조건
- Docker Desktop 설치
- 아래 폴더 구조가 **형제 관계**로 존재해야 함 (경로는 달라도 됨)

```
workspace/php/
├── docker_phps/
├── customsgCRM/
├── customsgPTN/
├── customsgLANDING/
├── withusCRM/
├── withusPTN/
├── withusLanding/
├── choharu/
└── choharu2/
```

---

## 세팅 순서

### 1. .env 파일 생성
```bash
cp docker_phps/env/docker_phps.env docker_phps/.env
```

### 2. hosts 파일 수정

**Windows:** `C:\Windows\System32\drivers\etc\hosts`
**Mac:** `sudo nano /etc/hosts`

```
127.0.0.1 emp.custom-message.dk
127.0.0.1 www.emp.custom-message.dk
127.0.0.1 ptn.custom-message.dk
127.0.0.1 www.ptn.custom-message.dk
127.0.0.1 land.custom-message.dk
127.0.0.1 www.land.custom-message.dk
127.0.0.1 file.custom-message.dk
127.0.0.1 www.file.custom-message.dk
127.0.0.1 customsgnews.dk
127.0.0.1 www.customsgnews.dk

127.0.0.1 emp.withusmk.dk
127.0.0.1 www.emp.withusmk.dk
127.0.0.1 ptn.withusmk.dk
127.0.0.1 www.ptn.withusmk.dk
127.0.0.1 land.withusmk.dk
127.0.0.1 www.land.withusmk.dk
127.0.0.1 file.withusmk.dk
127.0.0.1 www.file.withusmk.dk
127.0.0.1 withusnews.dk
127.0.0.1 www.withusnews.dk

127.0.0.1 deeptrue.dk
127.0.0.1 admin.deeptrue.dk
127.0.0.1 choharutwo.dk
127.0.0.1 admin.choharutwo.dk
```

### 3. Docker 기동
```bash
cd docker_phps
docker-compose up -d
```

### 4. customsgCRM DB import (최초 1회)
```bash
docker exec -i local_mariadb mariadb -u cstmsg -p'cstmsg!@34qwer@@' cstmsg < docker_phps/dump/cstmsg.sql
```

---

## 컨테이너 구조

| 컨테이너 | 역할 | 포트 |
|---------|------|------|
| local_nginx | 모든 도메인 진입점 (80) | 80 외부 |
| local_apache | PHP 8.1 - customsg/withus | 8080 내부 |
| local_php74 | PHP 7.4 FPM - choharu | 9000 내부 |
| local_mariadb | MariaDB 10.11 - customsg 전용 | 3306 |

---

## 도메인 → 프로젝트 매핑

| 도메인 | 프로젝트 | DB |
|--------|---------|-----|
| emp.custom-message.dk | customsgCRM | Docker MariaDB (local_mariadb) |
| ptn.custom-message.dk | customsgPTN | Docker MariaDB |
| land.custom-message.dk | customsgLANDING | Docker MariaDB |
| emp.withusmk.dk | withusCRM | 네이티브 DB (host.docker.internal) |
| ptn.withusmk.dk | withusPTN | 네이티브 DB |
| land.withusmk.dk | withusLanding | 네이티브 DB |
| deeptrue.dk | choharu/site/saju/main | 운영 IP 27.102.82.87 직접 |
| admin.deeptrue.dk | choharu/site/saju/admin/public | 운영 IP 27.102.82.87 직접 |
| choharutwo.dk | choharu2/site/saju/main | 운영 IP 27.102.82.92 직접 |
| admin.choharutwo.dk | choharu2/site/saju/admin/public | 운영 IP 27.102.82.92 직접 |

---

## VSCode Xdebug 설정 (포트 9003)

각 프로젝트 `.vscode/launch.json`:

```json
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for XDebug (Docker)",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/var/www/customsgCRM": "${workspaceFolder}"
            }
        }
    ]
}
```
> pathMappings의 `/var/www/프로젝트명` 은 프로젝트에 맞게 변경

---

## 자주 쓰는 명령어

```bash
# 기동
docker-compose up -d

# 중지
docker-compose down

# 로그 확인
docker logs local_apache
docker logs local_nginx
docker logs local_mariadb

# Apache 재시작 (설정 변경 후)
docker-compose restart apache
```
