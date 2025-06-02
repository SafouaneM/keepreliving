# 📸 KeepReliving

**KeepReliving** is a Laravel ![Laravel](https://img.shields.io/badge/-12-red?style=flat&logo=laravel&logoColor=white) + Livewire ![Livewire](https://img.shields.io/badge/-3-blue?style=flat&logo=livewire&logoColor=white) application that allows users to create and share their personal photo/video libraries using unique, shareable codes.

The idea is that you can upload some media, store that in a library with a name, date, etc.

Then, you can bind that library to a code and share it for example, as **view-only**, so that your friends can see and download it without losing the quality of the image (unlike sending media via WhatsApp).

---

## ⏳Screenshots to get a feel
<table>
  <tr>
    <td><img src="https://github.com/user-attachments/assets/5239c797-d813-47b2-8e1b-ce82945c08ad" width="300"></td>
    <td><img src="https://github.com/user-attachments/assets/c7dc6753-ef27-4270-9c05-904761f76125" width="300"></td>
  </tr>
  <tr>
    <td><img src="https://github.com/user-attachments/assets/81481389-ae61-49e5-b07f-f12c9ae83209" width="300"></td>
    <td><img src="https://github.com/user-attachments/assets/30585512-2899-4bc9-a69d-f6df4a688aa3" width="300"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <img src="https://github.com/user-attachments/assets/f8766712-9e3a-4f08-b669-9c5e4407f2ae" width="600">
    </td>
  </tr>
</table>

## 🔥 Core features

⏳ Means it's currently in development.

🚧 Means it's a blocker for now.

- [x] Basic authentication
- [x] Creating and uploading media and libraries
- [ ] Basic profile configuration for that extra flair
- [ ] Customizing the library info, even going as far as adding a cover image
- [ ] A basic featured libraries, media section
- [~] ⏳ Generating unique codes for libraries (first phase done though)
- [~] ⏳ Permissions for viewing and downloading media in a library
- [ ] We'll see...
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

## ⚖️ License

This project is licensed under the Creative Commons Attribution-NonCommercial 4.0 License.

You are free to explore and learn from the code, but **commercial use and redistribution are prohibited**.
---

Built with love by [@SafouaneM](https://safoe.nl) 💻

