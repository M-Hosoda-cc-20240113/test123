apiVersion: batch/v1beta1
kind: CronJob
metadata:
name: create-slack-channel-batch
spec:
schedule: "0 15 * * *" # UTCのため注意が必要
jobTemplate:
spec:
template:
spec:
containers:
- name: educure-prod-php
image: asia.gcr.io/GOOGLE_CLOUD_PROJECT/educure_php:COMMIT_SHA
args:
- /bin/sh
- -c
- >
/usr/local/bin/startup.sh;
php artisan batch:createslackchannel;
env:
- name: APP_DEBUG
valueFrom:
configMapKeyRef:
key: APP_DEBUG
name: educure-prod-config
- name: APP_URL
valueFrom:
configMapKeyRef:
key: APP_URL
name: educure-prod-config
- name: TEST_DB_DATABASE
valueFrom:
configMapKeyRef:
key: TEST_DB_DATABASE
name: educure-prod-config
- name: TEST_DB_USERNAME
valueFrom:
configMapKeyRef:
key: TEST_DB_USERNAME
name: educure-prod-config
- name: TEST_DB_PASSWORD
valueFrom:
configMapKeyRef:
key: TEST_DB_PASSWORD
name: educure-prod-config
- name: DB_HOST
valueFrom:
secretKeyRef:
key: DB_HOST
name: educure-prod-secret
- name: DB_PORT
valueFrom:
secretKeyRef:
key: DB_PORT
name: educure-prod-secret
- name: DB_DATABASE
valueFrom:
secretKeyRef:
name: educure-prod-secret
key: DB_DATABASE
- name: DB_USERNAME
valueFrom:
secretKeyRef:
key: DB_USERNAME
name: educure-prod-secret
- name: DB_PASSWORD
valueFrom:
secretKeyRef:
key: DB_PASSWORD
name: educure-prod-secret
- name: MAIL_DRIVER
valueFrom:
configMapKeyRef:
key: MAIL_DRIVER
name: educure-prod-config
- name: MAIL_HOST
valueFrom:
configMapKeyRef:
key: MAIL_HOST
name: educure-prod-config
- name: MAIL_PORT
valueFrom:
configMapKeyRef:
key: MAIL_PORT
name: educure-prod-config
- name: MAIL_USERNAME
valueFrom:
configMapKeyRef:
key: MAIL_USERNAME
name: educure-prod-config
- name: MAIL_PASSWORD
valueFrom:
configMapKeyRef:
key: MAIL_PASSWORD
name: educure-prod-config
- name: MAIL_ENCRYPTION
valueFrom:
configMapKeyRef:
key: MAIL_ENCRYPTION
name: educure-prod-config
- name: TZ
valueFrom:
configMapKeyRef:
key: TZ
name: educure-prod-config
- name: API_URL
valueFrom:
configMapKeyRef:
key: API_URL
name: educure-prod-config
- name: BASE_URL
valueFrom:
configMapKeyRef:
key: BASE_URL
name: educure-prod-config
- name: GITHUB_TOKEN
valueFrom:
secretKeyRef:
key: GITHUB_TOKEN
name: educure-prod-secret
- name: JWT_SECRET
valueFrom:
secretKeyRef:
key: JWT_SECRET
name: educure-prod-secret
- name: GCP_PROJECT_ID
valueFrom:
secretKeyRef:
key: GCP_PROJECT_ID
name: educure-prod-secret
- name: GCS_BUCKET_NAME
valueFrom:
secretKeyRef:
key: GCS_BUCKET_NAME
name: educure-prod-secret
- name: AUTH_KEY_PATH
valueFrom:
secretKeyRef:
key: AUTH_KEY_PATH
name: educure-prod-secret
- name: GCS_BASE_DIR
valueFrom:
secretKeyRef:
key: GCS_BASE_DIR
name: educure-prod-secret
- name: GCP_JSON
valueFrom:
secretKeyRef:
key: GCP_JSON
name: educure-prod-secret
restartPolicy: Never
