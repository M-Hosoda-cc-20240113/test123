apiVersion: batch/v1beta1
kind: CronJob
metadata:
  name: add-user-point
spec:
  schedule: "10 0 * * *" # UTCのため注意が必要
  startingDeadlineSeconds: 100
  successfulJobsHistoryLimit: 1
  failedJobsHistoryLimit: 1
  jobTemplate:
    spec:
      template:
        spec:
          containers:
            - name: aegis-prod-php
              image: asia.gcr.io/GOOGLE_CLOUD_PROJECT/aegis_php:COMMIT_SHA
              args:
                - /bin/sh
                - -c
                - >
                  /usr/local/bin/startup.sh;
                  php artisan batch:totalUserPoints
              env:
                - name: APP_DEBUG
                  valueFrom:
                    configMapKeyRef:
                      key: APP_DEBUG
                      name: aegis-prod-config
                - name: DB_HOST
                  valueFrom:
                    secretKeyRef:
                      key: DB_HOST
                      name: aegis-prod-secret
                - name: DB_PORT
                  valueFrom:
                    secretKeyRef:
                      key: DB_PORT
                      name: aegis-prod-secret
                - name: DB_DATABASE
                  valueFrom:
                    secretKeyRef:
                      name: aegis-prod-secret
                      key: DB_DATABASE
                - name: DB_USERNAME
                  valueFrom:
                    secretKeyRef:
                      key: DB_USERNAME
                      name: aegis-prod-secret
                - name: DB_PASSWORD
                  valueFrom:
                    secretKeyRef:
                      key: DB_PASSWORD
                      name: aegis-prod-secret
                - name: MAIL_DRIVER
                  valueFrom:
                    configMapKeyRef:
                      key: MAIL_DRIVER
                      name: aegis-prod-config
                - name: MAIL_HOST
                  valueFrom:
                    configMapKeyRef:
                      key: MAIL_HOST
                      name: aegis-prod-config
                - name: MAIL_PORT
                  valueFrom:
                    configMapKeyRef:
                      key: MAIL_PORT
                      name: aegis-prod-config
                - name: MAIL_USERNAME
                  valueFrom:
                    configMapKeyRef:
                      key: MAIL_USERNAME
                      name: aegis-prod-config
                - name: MAIL_PASSWORD
                  valueFrom:
                    configMapKeyRef:
                      key: MAIL_PASSWORD
                      name: aegis-prod-config
                - name: MAIL_ENCRYPTION
                  valueFrom:
                    configMapKeyRef:
                      key: MAIL_ENCRYPTION
                      name: aegis-prod-config
                - name: TZ
                  valueFrom:
                    configMapKeyRef:
                      key: TZ
                      name: aegis-prod-config
          restartPolicy: Never