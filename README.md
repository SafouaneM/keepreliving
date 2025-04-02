# 📸 KeepReliving

**KeepReliving** is a Laravel + Livewire application that allows users to create and share their personal photo/video libraries using unique, shareable access codes. The platform focuses on simplicity and privacy, enabling users to organize, upload, and grant access to media collections with ease.

---

## 🚀 Features

- User registration and authentication
- Upload images and videos into personal libraries
- Edit or delete uploaded media
- Generate unique shareable codes to grant access to your library
- Clean UI layout with a sidebar, upload area, and featured section

---

## 🛠 Tech Stack

| Layer        | Tool/Framework                                               |
|--------------|--------------------------------------------------------------|
| Backend      | PHP 8.2+, Laravel 12                                         |
| Frontend     | Livewire 3, Blade, Tailwind CSS, Alpine                      |
| File Storage | Local (via Laravel storage), with `php artisan storage:link` 
                 potentially later down the road via AWS S3                   |
| Database     | MySQL                                                        |                                       |

---

## 🛠️ Project Status

- 🔄 In Development
- 🎯 Goal: Learn and master Laravel, Livewire, and debugging
- ☁️ Exploring OpenShift, GitLab pipelines, and deployment (soon)
- ✍️ UI and features are currently being planned and sketched

---

## ✅ Planned Core Features Ideas

| Feature | Description |
|--------|-------------|
| 🧑‍💻 User Authentication | Users can register and log in |
| 📁 Media Library | Users can upload images and videos |
| 🖼️ Media Grid | Uploaded media shown in a clean UI |
| 🔗 Share Access Code | Generate a unique code to share your library |
| 👁️ Guest View | Visitors can access a shared library (read-only) |
| 🔍 Search | Search within your own media by name/tag |
| 🗂️ Grouping | Organize media into folders or albums |
---

## ☁️ Infrastructure & DevOps Learning Goals

- [ ] Set up a local dev environment on a Linux environment for deployment
- [ ] Learn how to deploy the app on **OpenShift** 
- [ ] Understand routes, secrets, and volumes in OpenShift
- [ ] Create a working GitLab CI pipeline to run tests or deploy

---

## 🧪 Getting Started

```bash
git clone https://github.com/SafouaneM/keepreliving.git
cd keepreliving

composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link

```

Built with love by [@SafouaneM](https://github.com/SafouaneM) 💻

