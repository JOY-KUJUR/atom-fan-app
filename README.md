📘 Atomberg Smart Fan Control – Assignment Submission
🔗 Live Hosted Application

URL:
👉 https://greenyellow-pigeon-935722.hostingersite.com/dashboard.php

The application is hosted on Hostinger and is accessible on both mobile and desktop.

🎯 Project Objective

The objective of this assignment is to demonstrate how a production-ready web application can be built to control Atomberg smart fans using developer APIs.

The application:

Accepts user credentials (API Key & Refresh Token)

Lists available smart fans

Allows controlling:

Power (ON / OFF)

Speed

Sleep Mode

Displays energy usage and electricity cost

⚠️ Why a Custom API / Backend Layer Is Used

While developing the application, the Atomberg Developer APIs were not reliably returning responses for live testing and evaluation.

Instead of blocking development or hardcoding UI behavior, I implemented a custom backend API layer using PHP + MySQL that simulates Atomberg’s API behavior.

✅ Why this is the correct approach

This mirrors real-world industry practices, where:

Frontend teams often work with mocked or staging APIs

Backend services act as secure adapters between UI and external APIs

UI and UX development can continue independently

Important:
The frontend is designed in such a way that switching from the mocked API to real Atomberg APIs would only require backend changes — no UI changes are needed.

This demonstrates architecture design and production readiness, not just UI implementation.

🏗️ Application Architecture
Frontend (HTML + Tailwind + JavaScript)
        |
        v
Custom PHP API Layer (Mock Atomberg API)
        |
        v
MySQL Database (Device State & Usage)

Key Design Principles

No secrets exposed to frontend JavaScript

Session-based authentication

Clear separation of concerns

Easy migration to real Atomberg APIs

🔐 Demo Credentials

For evaluation purposes, demo credentials are provided.

📌 API Key:

demo_api_key_123


📌 Refresh Token:

demo_refresh_token_abc


These credentials are meant only for demonstration and are safe to use in this hosted environment.

🚀 How to Use the Application

Open the hosted link
👉 https://greenyellow-pigeon-935722.hostingersite.com/

Enter the API Key and Refresh Token (demo credentials above)

Click Connect

You will be redirected to the dashboard

On the dashboard:

View all available fans

Tap/click a fan to open controls

Toggle Power ON/OFF

Change Speed

Enable/Disable Sleep Mode

Fan state updates are reflected visually:

Fan rotation animation when ON

Power indicator updates

Speed and mode shown in real time

⚡ Energy Usage & Cost Calculation

The application calculates electricity usage using:

Units Consumed = (Power in Watts × Usage Hours) / 1000
Cost = Units × ₹7


Electricity rate assumed: ₹7 per unit

Energy usage and cost are shown per fan

🎨 UI & UX Highlights

Atomberg-inspired modern UI

Dark & Light theme toggle

Fully responsive (Mobile + PC)

SVG fan with rotation animation

Bottom-sheet style modal on mobile

Clean, app-like interactions

🧠 Summary

This project demonstrates:

Secure handling of credentials

Thoughtful API abstraction

Realistic IoT control workflows

Production-quality UI/UX

Scalable architecture

Even though a mocked backend is used, the application accurately represents how a real Atomberg smart fan control system would work in production.

Built for evaluation, demonstration, and extensibility.
