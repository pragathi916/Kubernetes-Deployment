# Kubernetes Deployment Strategies 🚀

This repository demonstrates three essential Kubernetes deployment strategies: **Blue-Green**, **Canary**, and **Rollback**. Each approach helps in achieving safer and more controlled deployments for production workloads.

---

## 📂 Folder Structure

```
Kubernet_Deployment_Strategies/
│
├── README.md                    # Main repo README (overview of all strategies)
│
├── blue-green/
│  
├── canary/
│
└── rollback/

```
---
## 📌 Strategies Explained

### 1️⃣ Blue-Green Deployment

**Concept**: Maintain two environments — Blue (current version) and Green (new version). Traffic is switched between them.

**Benefits**:
- Zero downtime
- Easy rollback
- Safer version switches

📁 [`blue-green/`](./blue-green/) contains:
- YAML files to deploy blue and green versions
- Sample service switch
- Steps to simulate environment switch

---

### 2️⃣ Canary Deployment

**Concept**: Gradually roll out the new version to a small set of users before full deployment.

**Benefits**:
- Detect issues early
- Minimize risk in production
- Better control over release

📁 [`canary/`](./canary/) contains:
- Deployment manifests with replica ratios
- Traffic splitting example
- Update strategies

---

### 3️⃣ Rollback Strategy

**Concept**: Demonstrates how to roll back to a previous stable deployment in case of failures.

**Benefits**:
- Fast recovery from faulty updates
- Built-in Kubernetes support
- Minimal manual intervention

📁 [`rollback/`](./rollback/) contains:
- 2 apps: One simple website without backend and One fullstack app with backend
- Faulty update simulation
- Rollback commands and YAML

---

## 🚀 Getting Started

### Prerequisites
- Kubernetes cluster (Minikube, Kind, or any K8s setup)
- `kubectl` CLI installed

### Deploying a Strategy
```
cd blue-green   # or canary, rollback
kubectl apply -f .
```
Follow the instructions in each folder’s README.md for step-by-step deployment and testing.
