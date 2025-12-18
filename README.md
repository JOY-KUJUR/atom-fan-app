# 📘 Atomberg Smart Fan Control – Assignment Submission

## 🔗 Live Hosted Application
**URL:**  
👉 https://greenyellow-pigeon-935722.hostingersite.com/dashboard.php  

The application is hosted on **Hostinger** and is accessible on both **mobile and desktop**.

---

## 🎯 Project Objective

The objective of this assignment is to demonstrate how a **production-ready web application** can be built to control **Atomberg smart fans** using developer APIs.

The application:
- Accepts user credentials (API Key & Refresh Token)
- Lists available smart fans
- Allows controlling:
  - Power (ON / OFF)
  - Speed
  - Sleep Mode
- Displays energy usage and electricity cost

---

## ⚠️ Why a Custom API / Backend Layer Is Used

During development, the **Atomberg Developer APIs were not consistently returning usable responses** for live testing and evaluation.

Instead of blocking development, a **custom backend API layer** was implemented using **PHP + MySQL** to simulate Atomberg’s API behavior.

### ✅ Why this approach is correct

This reflects **real-world industry practices**, where:
- Frontend teams work with **mocked or staging APIs**
- Backend services act as **secure adapter layers**
- UI/UX development continues independently of API readiness

> **Note:**  
> The frontend is designed so that switching to real Atomberg APIs would require **only backend changes**, with no UI changes.

This demonstrates **architecture design and production readiness**, not just UI implementation.

---

## 🏗️ Application Architecture

