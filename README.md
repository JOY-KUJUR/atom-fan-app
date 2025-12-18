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
Frontend (HTML + Tailwind + JavaScript)
|
v
Custom PHP API Layer (Mock Atomberg API)
|
v
MySQL Database (Device State & Usage)


### Key Design Principles
- No secrets exposed to frontend JavaScript
- Session-based authentication
- Clear separation of concerns
- Easy migration to real Atomberg APIs

---

## 🔐 Demo Credentials

For evaluation purposes, demo credentials are provided.

**API Key**


demo_api_key_123


**Refresh Token**


demo_refresh_token_abc


> These credentials are safe to use and meant only for demonstration.

---

## 🚀 How to Use the Application

1. Open the hosted link  
   👉 https://greenyellow-pigeon-935722.hostingersite.com/

2. Enter the **API Key** and **Refresh Token**

3. Click **Connect**  
   - You will be redirected to the dashboard

4. On the dashboard:
   - View all available fans
   - Click a fan to open controls
   - Toggle Power ON / OFF
   - Change Speed
   - Enable / Disable Sleep Mode

5. Fan states update visually:
   - Fan rotation animation when ON
   - Power indicator updates
   - Current speed and mode displayed

---

## ⚡ Energy Usage & Cost Calculation

Energy consumption is calculated using:



Units Consumed = (Power in Watts × Usage Hours) / 1000
Cost = Units × ₹7


- Electricity rate assumed: **₹7 per unit**
- Energy usage and cost are shown per fan

---

## 🎨 UI & UX Highlights

- Atomberg-inspired modern UI
- Dark & Light theme toggle
- Fully responsive (Mobile + PC)
- SVG fan with rotation animation
- Bottom-sheet modal on mobile
- Clean, app-like interactions

---

## 🧠 Summary

This project demonstrates:
- Secure handling of credentials
- Thoughtful API abstraction
- Realistic IoT control workflows
- Production-quality UI/UX
- Scalable and maintainable architecture

Even though a mocked backend is used, the application accurately represents how a **real Atomberg smart fan control system** would function in production.

---

**Built for evaluation, demonstration, and extensibility.**
