# 📸 KeepReliving

**KeepReliving** is a Laravel + Livewire application that allows users to create and share their personal photo/video libraries using unique, shareable codes.

The idea is that you can upload some media, store that in a library with a name, date, etc.

Then, you can bind that library to a code and share it for example, as **view-only**, so that your friends can see and download it without losing the quality of the image (unlike sending media via WhatsApp).

---

## 🚀 Features

- User registration and authentication
- Upload images and videos into personal libraries
- Edit or delete uploaded media
- Generate unique shareable codes to grant access to your library
- Clean UI layout with a sidebar, upload area, and featured section

---

## 🛠 Tech Stack

| Layer        | Tool/Framework                                                                            |
|--------------|-------------------------------------------------------------------------------------------|
| Backend      | PHP 8.2+, Laravel 12                                                                      |
| Frontend     | Livewire 3, Blade, Tailwind CSS, Alpine                                                   |
| File Storage | Local (via Laravel storage), regular `php artisan storage:link`; potentially AWS S3 later |
| Deployment   | ?                                                                                         |
| Database     | MySQL                                                                                     |
| Testing      | Goes via PEST                                                                             |

---

## 🛠️ Project Status

- 🔄 Currently working on it on the weekends and when I have some free time
- 🎯 My goal is to improve my Laravel, Livewire skills and try to leverage as much of my own skills as possible
- ☁️ The key then to this project succeeding is that all the media is uploaded to the cloud maybe via S3. Whilst it may raise some costs, it is better for the main application server to not be bloated with media. And then having the application deployed on OpenShift.
- ✍️ I will try to document and sketch the process of my components, so that I can show the world how I did it and what I learned along the way

---

## 🔥 Core features

⏳ Means it's currently in development.

🚧 Means it's a blocker for now.

- [x] Basic authentication
- [ ] ⏳ Creating and uploading media and libraries
- [ ] Basic profile configuration for that extra flair
- [ ] Customizing the library info, even going as far as adding a cover image
- [ ] A basic featured libraries, media section
- [ ] Generating unique codes for libraries
- [ ] Permissions for viewing and downloading media in a library
- [ ] We'll see...
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

Built with love by [@SafouaneM](https://safoe.nl) 💻

