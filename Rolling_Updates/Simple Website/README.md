# Rolling Updates Deployment on a Simple Website

- Environment Setup:
  Docker Desktop and Minikube are installed and running on the local machine (Windows 10).
  
- Terminal commands run from the project folder are:
  
  1. docker build -t sthuthi11/rolling-updates-site:v1 .
  2. docker push sthuthi11/rolling-updates-site:v1
  3. minikube start
  4. kubectl config use-context minikube
  5. kubectl get nodes
  6. kubectl apply -f deployment.yaml
  7. kubectl expose deployment rolling-updates-site --type=LoadBalancer --port=80
  8. kubectl get service
  9. kubectl apply -f service.yaml
  10. kubectl port-forward deployment/rolling-updates-site 8080:80
  11. Go to http://localhost:8080
  12. docker build -t sthuthi11/rolling-updates-site:v2 .
  13. docker push sthuthi11/rolling-updates-site:v2
  
      *Rolling Updates:*
  14. kubectl set image deployment/rolling-updates-site rolling-updates=sthuthi11/rolling-updates-site:v2
  15. kubectl rollout status deployment/rolling-updates-site
  16. kubectl port-forward service/rolling-updates-site 8080:80
  
      *Roll back:*
  16. kubectl rollout undo deployment/rolling-updates-site
  17. kubectl port-forward service/rolling-updates-site 8082:80

- Changes in the Website after Deployment: 
  After deploying version 1, a small change was made to index.html by adding the line "DEPLOYED V2", and version 2 was created. As a 
  result, after the rolling update, this line becomes visible on the website. When rolled back, the line is removed, restoring the previous   version.
