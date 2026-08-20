# Almantic

### Simple CRM for people and teams.

Almantic is a free and open-source Customer Relationship Management (CRM) platform designed for individuals, freelancers, small businesses, and teams.

The goal is to build a modern, secure, lightweight and self-host-friendly CRM that can be used personally or as a multi-tenant company workspace.

> **Simple • Smart • Together**

---

## ✨ Project Status

🚧 **Active Development**

Almantic is currently under development.

The initial project phase focuses on the public landing page and core application architecture. Authentication, multi-tenancy, CRM modules, team collaboration, security hardening, and PWA capabilities will be introduced progressively.

---

## 🎯 Vision

Most CRM platforms become complicated very quickly.

Almantic aims to provide a simpler alternative.

You should be able to:

- Create your own account
- Use Almantic personally
- Create a company or team workspace
- Invite team members
- Manage customers and organizations
- Track leads and opportunities
- Manage tasks and follow-ups
- Keep customer notes and activities
- Control access between team members
- Keep your data organized in one place

The long-term goal is to make Almantic a practical open-source CRM that can be used either as a hosted application or self-hosted.

---

## 🏗️ Architecture

Almantic is intentionally being built with a lightweight architecture.

### Backend

- Laravel 11
- PHP 8.2+
- MySQL
- Custom SQL Builder
- Custom authentication
- Custom application services
- Multi-tenant architecture

### Frontend

- Laravel Blade
- HTML
- CSS
- Vanilla JavaScript

### Planned

- Progressive Web App (PWA)
- Offline capabilities
- IndexedDB
- Service Worker
- Background synchronization
- Push notifications

---

## 🚫 No ORM

Almantic intentionally does **not** use an ORM or traditional Laravel Models.

Database access will be handled through our own SQL Builder and database abstraction layer.

This decision is intentional.

The project focuses on:

- Explicit SQL
- Database performance
- Query transparency
- Better understanding of database behavior
- Lightweight application architecture
- Full control over database operations

We will also avoid unnecessary framework abstractions where a simpler custom implementation is appropriate.

---

## 🔐 Custom Authentication

Almantic will not use Laravel's default authentication scaffolding as the application's final authentication system.

Instead, Almantic will implement its own authentication layer.

The authentication system is planned to include:

- Registration
- Login
- Logout
- Password hashing
- Email verification
- Session management
- Password reset
- Login protection
- Rate limiting
- Account security
- Suspicious activity protection

Security is considered a core part of the architecture rather than something added later.

---

## 🏢 Multi-Tenancy

Almantic is designed as a **multi-tenant application**.

A user can use Almantic personally or participate in one or more company/team workspaces.

### Personal Workspace

A user can create an account and use Almantic for personal CRM management.

### Company / Team Workspace

A company can create a workspace and invite members.

Example:

```text
User
│
├── Personal Workspace
│
└── Acme Company
    │
    ├── Owner
    ├── Admin
    ├── Sales Manager
    └── Sales Member