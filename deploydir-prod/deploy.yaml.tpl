apiVersion: apps/v1
kind: Deployment
metadata:
  name: aegis-prod-deploy
spec:
  replicas: 2
  selector:
    matchLabels:
      app: aegis-prod
  strategy:
    rollingUpdate:
      maxSurge: 50%
      maxUnavailable: 50%
    type: RollingUpdate
  template:
    metadata:
      labels:
        app: aegis-prod
    spec:
      affinity:
        podAntiAffinity:
          requiredDuringSchedulingIgnoredDuringExecution:
            - labelSelector:
                matchExpressions:
                  - key: "app"
                    operator: In
                    values:
                      - aegis-prod
              topologyKey: "kubernetes.io/hostname"
      containers:
        - name: aegis-prod-nginx
          image: asia.gcr.io/aegisapp/aegis_nginx:COMMIT_SHA    # Container Resistoryにプッシュしたイメージを使用する
          ports:
            - containerPort: 80
          resources:
            requests:
              cpu: 50m
        - name: aegis-prod-php
          image: asia.gcr.io/aegisapp/aegis_php:COMMIT_SHA
          ports:
            - containerPort: 9000
          resources:
            requests:
              cpu: 100m
          env:
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
            - name: APP_DEBUG
              valueFrom:
                configMapKeyRef:
                  key: APP_DEBUG
                  name: aegis-prod-config
            - name: APP_ENV
              valueFrom:
                configMapKeyRef:
                  key: APP_ENV
                  name: aegis-prod-config
            - name: HASH_EMAIL_ALGO
              valueFrom:
                secretKeyRef:
                  key: HASH_EMAIL_ALGO
                  name: aegis-prod-secret
            - name: HASH_EMAIL_SALT
              valueFrom:
                secretKeyRef:
                  key: HASH_EMAIL_SALT
                  name: aegis-prod-secret
            - name: HASH_ACCOUNT_ALGO
              valueFrom:
                secretKeyRef:
                  key: HASH_ACCOUNT_ALGO
                  name: aegis-prod-secret
            - name: HASH_ACCOUNT_SALT
              valueFrom:
                secretKeyRef:
                  key: HASH_ACCOUNT_SALT
                  name: aegis-prod-secret
