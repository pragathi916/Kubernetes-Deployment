# Rolling Updates Deployment on a Website with a Database backend

- Environment Setup:
  Docker Desktop is installed and is running on the local machine (Windows 10).
  
- Terminal commands run from the project folder are:
  
  1. docker build -t sthuthi11/orgpulse:v1 .
  2. docker push sthuthi11/orgpulse:v1
  3. kubectl apply -f phpmyadmin-deployment.yaml
  4. kubectl apply -f phpmyadmin-service.yaml
  5. kubectl apply -f mysql-development.yaml
  6. kubectl apply -f mysql-service.yaml
  
      *Optional:*
  7. kubectl get deployments
  8. kubectl get svc
  9. kubectl get pods
  
      *Rolling Updates:*
  10. kubectl set image deployment/orgpulse-deployment orgpulse-container=sthuthi11/orgpulse:v1
  11. kubectl rollout status deployment/orgpulse-deployment
  12. Go to http://localhost:30000
  13. Make changes to the site (marquee added)
  14. docker build -t sthuthi11/orgpulse:v2 .
  15. docker push sthuthi11/orgpulse:v2
  16. Change version to v2 in phpmyadmin-deployment.yaml
  17. kubectl apply -f phpmyadmin-deployment.yaml
  18. kubectl rollout status deployment/orgpulse-deployment
  19. Go to http://localhost:30000
  
      *Roll back:*
  20. kubectl rollout undo deployment/orgpulse-deployment
  21. Go to http://localhost:30000

- Changes in the Website after Deployment: 
  After deploying version 1, a small change was made to index.php by adding a marquee element (having "Every donor is a hero. Register now!"), and version 2 was created. As a result, after the rolling update, this marquee is visible on the website. When rolled back, the it is removed, restoring the previous version.

