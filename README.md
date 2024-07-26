<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/6295/6295417.png" width="100" />
</p>
<p align="center">
    <h1 align="center">LYLT-AGENCY</h1>
</p>
<p align="center">
	<img src="https://img.shields.io/github/license/maxousql/lylt-agency?style=flat&color=0080ff" alt="license">
	<img src="https://img.shields.io/github/last-commit/maxousql/lylt-agency?style=flat&logo=git&logoColor=white&color=0080ff" alt="last-commit">
	<img src="https://img.shields.io/github/languages/top/maxousql/lylt-agency?style=flat&color=0080ff" alt="repo-top-language">
	<img src="https://img.shields.io/github/languages/count/maxousql/lylt-agency?style=flat&color=0080ff" alt="repo-language-count">
<p>
<p align="center">
		<em>Developed with the software and tools below.</em>
</p>
<p align="center">
	<img src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?style=flat&logo=JavaScript&logoColor=black" alt="JavaScript">
	<img src="https://img.shields.io/badge/Sass-CC6699.svg?style=flat&logo=Sass&logoColor=white" alt="Sass">
	<img src="https://img.shields.io/badge/PHP-777BB4.svg?style=flat&logo=PHP&logoColor=white" alt="PHP">
	<img src="https://img.shields.io/badge/Vite-646CFF.svg?style=flat&logo=Vite&logoColor=white" alt="Vite">
	<img src="https://img.shields.io/badge/Axios-5A29E4.svg?style=flat&logo=Axios&logoColor=white" alt="Axios">
	<img src="https://img.shields.io/badge/JSON-000000.svg?style=flat&logo=JSON&logoColor=white" alt="JSON">
</p>
<hr>

## 🔗 Quick Links

> -   [📂 Repository Structure](#-repository-structure)
> -   [🧩 Modules](#-modules)
> -   [🚀 Getting Started](#-getting-started)
>     -   [⚙️ Installation](#️-installation)
>     -   [🤖 Running lylt-agency](#-running-lylt-agency)

---

## 📂 Repository Structure

```sh
└── lylt-agency/
    ├── README.md
    ├── app
    │   ├── Http
    │   │   ├── Controllers
    │   │   │   ├── AuthController.php
    │   │   │   ├── BienController.php
    │   │   │   ├── Controller.php
    │   │   │   ├── UtilisateurController.php
    │   │   │   └── ViewsController.php
    │   │   ├── Middleware
    │   │   │   ├── AdminMiddleware.php
    │   │   │   ├── CheckAuthenticated.php
    │   │   │   └── CheckNotAuthenticated.php
    │   │   └── Requests
    │   │       ├── CreateBien.php
    │   │       ├── CreateUser.php
    │   │       └── LoginRequest.php
    │   ├── Models
    │   │   ├── AlerteClient.php
    │   │   ├── BienImmo.php
    │   │   ├── DemandeContact.php
    │   │   ├── Favori.php
    │   │   ├── Image.php
    │   │   ├── Recherche.php
    │   │   ├── RoleUtilisateur.php
    │   │   ├── TypeBien.php
    │   │   └── Utilisateur.php
    │   ├── Providers
    │   │   └── AppServiceProvider.php
    │   └── View
    │       └── Components
    │           └── headerUser.php
    ├── artisan
    ├── bootstrap
    │   ├── app.php
    │   ├── cache
    │   │   └── .gitignore
    │   └── providers.php
    ├── composer.json
    ├── composer.lock
    ├── config
    │   ├── app.php
    │   ├── auth.php
    │   ├── cache.php
    │   ├── database.php
    │   ├── filesystems.php
    │   ├── hashing.php
    │   ├── logging.php
    │   ├── mail.php
    │   ├── queue.php
    │   ├── services.php
    │   └── session.php
    ├── database
    │   ├── .gitignore
    │   ├── migrations
    │   │   ├── 2024_06_23_151932_create_role_utilisateur_table.php
    │   │   ├── 2024_06_23_155655_create_utilisateur_table.php
    │   │   ├── 2024_07_08_122108_create_typebien_table.php
    │   │   ├── 2024_07_08_133034_create_bienimmo_table.php
    │   │   ├── 2024_07_09_142202_create_images_table.php
    │   │   ├── 2024_07_11_124307_create_demande_contact_table.php
    │   │   ├── 2024_07_11_140843_create_favoris_table.php
    │   │   ├── 2024_07_13_055725_create_recherches_table.php
    │   │   └── 2024_07_16_152409_create_alertes_clients_table.php
    │   └── seeders
    │       ├── BienImmoSeeder.php
    │       ├── DatabaseSeeder.php
    │       ├── FavorisSeeder.php
    │       ├── RolesUtilisateursSeeder.php
    │       ├── TypeBienSeeder.php
    │       └── UtilisateursSeeder.php
    ├── package-lock.json
    ├── package.json
    ├── phpunit.xml
    ├── public
    │   ├── .htaccess
    │   ├── assets
    │   │   ├── css
    │   │   │   ├── auth
    │   │   │   │   └── login.css
    │   │   │   ├── form
    │   │   │   │   └── main.css
    │   │   │   ├── homepage
    │   │   │   │   ├── main.css
    │   │   │   │   └── swiper-bundle.min.css
    │   │   │   ├── listing-property
    │   │   │   │   └── main.css
    │   │   │   ├── navbar
    │   │   │   │   └── main.css
    │   │   │   ├── profile
    │   │   │   │   └── main.css
    │   │   │   └── searchBar
    │   │   │       └── main.css
    │   │   ├── img
    │   │   │   └── homepage
    │   │   │       ├── contact.png
    │   │   │       ├── favicon.png
    │   │   │       ├── home.jpg
    │   │   │       ├── logo1.png
    │   │   │       ├── logo2.png
    │   │   │       ├── logo3.png
    │   │   │       ├── logo4.png
    │   │   │       ├── popular1.jpg
    │   │   │       ├── popular2.jpg
    │   │   │       ├── popular3.jpg
    │   │   │       ├── popular4.jpg
    │   │   │       ├── popular5.jpg
    │   │   │       └── value.jpg
    │   │   └── js
    │   │       ├── auth
    │   │       │   └── login.js
    │   │       ├── homepage
    │   │       │   ├── main.js
    │   │       │   ├── scrollreveal.min.js
    │   │       │   └── swiper-bundle.min.js
    │   │       └── navbar
    │   │           └── main.js
    │   ├── favicon.ico
    │   ├── index.php
    │   ├── mix-manifest.json
    │   └── robots.txt
    ├── resources
    │   └── views
    │       ├── account
    │       │   ├── admin.blade.php
    │       │   └── user.blade.php
    │       ├── auth
    │       │   ├── login.blade.php
    │       │   └── register.blade.php
    │       ├── base.blade.php
    │       ├── components
    │       │   ├── footer.blade.php
    │       │   ├── header.blade.php
    │       │   └── searchbar.blade.php
    │       ├── contact
    │       │   └── form.blade.php
    │       ├── homepage.blade.php
    │       ├── property
    │       │   ├── detail.blade.php
    │       │   ├── listing.blade.php
    │       │   └── sale.blade.php
    │       └── vendor
    │           └── pagination
    │               ├── bootstrap-4.blade.php
    │               ├── bootstrap-5.blade.php
    │               ├── default.blade.php
    │               ├── semantic-ui.blade.php
    │               ├── simple-bootstrap-4.blade.php
    │               ├── simple-bootstrap-5.blade.php
    │               ├── simple-default.blade.php
    │               ├── simple-tailwind.blade.php
    │               └── tailwind.blade.php
    ├── routes
    │   ├── console.php
    │   └── web.php
    ├── storage
    │   ├── app
    │   │   ├── .gitignore
    │   │   └── public
    │   │       └── .gitignore
    │   ├── framework
    │   │   ├── .gitignore
    │   │   ├── cache
    │   │   │   ├── .gitignore
    │   │   │   └── data
    │   │   │       └── .gitignore
    │   │   ├── sessions
    │   │   │   └── .gitignore
    │   │   ├── testing
    │   │   │   └── .gitignore
    │   │   └── views
    │   │       └── .gitignore
    │   └── logs
    │       └── .gitignore
    ├── tests
    │   ├── Feature
    │   │   └── ExampleTest.php
    │   ├── TestCase.php
    │   └── Unit
    │       └── ExampleTest.php
    ├── vite.config.js
    └── webpack.mix.js
```

---

## 🧩 Modules

<details closed><summary>.</summary>

| File                                                                                       | Summary                                       |
| ------------------------------------------------------------------------------------------ | --------------------------------------------- |
| [composer.lock](https://github.com/maxousql/lylt-agency/blob/master/composer.lock)         | HTTP error 429 for prompt `composer.lock`     |
| [vite.config.js](https://github.com/maxousql/lylt-agency/blob/master/vite.config.js)       | HTTP error 429 for prompt `vite.config.js`    |
| [package.json](https://github.com/maxousql/lylt-agency/blob/master/package.json)           | HTTP error 429 for prompt `package.json`      |
| [phpunit.xml](https://github.com/maxousql/lylt-agency/blob/master/phpunit.xml)             | HTTP error 429 for prompt `phpunit.xml`       |
| [package-lock.json](https://github.com/maxousql/lylt-agency/blob/master/package-lock.json) | HTTP error 429 for prompt `package-lock.json` |
| [artisan](https://github.com/maxousql/lylt-agency/blob/master/artisan)                     | HTTP error 429 for prompt `artisan`           |
| [webpack.mix.js](https://github.com/maxousql/lylt-agency/blob/master/webpack.mix.js)       | HTTP error 429 for prompt `webpack.mix.js`    |
| [composer.json](https://github.com/maxousql/lylt-agency/blob/master/composer.json)         | HTTP error 429 for prompt `composer.json`     |

</details>

<details closed><summary>resources.views</summary>

| File                                                                                                         | Summary                                                        |
| ------------------------------------------------------------------------------------------------------------ | -------------------------------------------------------------- |
| [base.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/base.blade.php)         | HTTP error 429 for prompt `resources/views/base.blade.php`     |
| [homepage.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/homepage.blade.php) | HTTP error 429 for prompt `resources/views/homepage.blade.php` |

</details>

<details closed><summary>resources.views.contact</summary>

| File                                                                                                         | Summary                                                            |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------ |
| [form.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/contact/form.blade.php) | HTTP error 429 for prompt `resources/views/contact/form.blade.php` |

</details>

<details closed><summary>resources.views.components</summary>

| File                                                                                                                      | Summary                                                                    |
| ------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------- |
| [footer.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/components/footer.blade.php)       | HTTP error 429 for prompt `resources/views/components/footer.blade.php`    |
| [header.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/components/header.blade.php)       | HTTP error 429 for prompt `resources/views/components/header.blade.php`    |
| [searchbar.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/components/searchbar.blade.php) | HTTP error 429 for prompt `resources/views/components/searchbar.blade.php` |

</details>

<details closed><summary>resources.views.vendor.pagination</summary>

| File                                                                                                                                               | Summary                                                                                    |
| -------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------ |
| [bootstrap-5.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/vendor/pagination/bootstrap-5.blade.php)               | HTTP error 429 for prompt `resources/views/vendor/pagination/bootstrap-5.blade.php`        |
| [simple-bootstrap-5.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/vendor/pagination/simple-bootstrap-5.blade.php) | HTTP error 429 for prompt `resources/views/vendor/pagination/simple-bootstrap-5.blade.php` |
| [default.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/vendor/pagination/default.blade.php)                       | HTTP error 429 for prompt `resources/views/vendor/pagination/default.blade.php`            |
| [tailwind.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/vendor/pagination/tailwind.blade.php)                     | HTTP error 429 for prompt `resources/views/vendor/pagination/tailwind.blade.php`           |
| [simple-default.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/vendor/pagination/simple-default.blade.php)         | HTTP error 429 for prompt `resources/views/vendor/pagination/simple-default.blade.php`     |
| [semantic-ui.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/vendor/pagination/semantic-ui.blade.php)               | HTTP error 429 for prompt `resources/views/vendor/pagination/semantic-ui.blade.php`        |
| [bootstrap-4.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/vendor/pagination/bootstrap-4.blade.php)               | HTTP error 429 for prompt `resources/views/vendor/pagination/bootstrap-4.blade.php`        |
| [simple-bootstrap-4.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/vendor/pagination/simple-bootstrap-4.blade.php) | HTTP error 429 for prompt `resources/views/vendor/pagination/simple-bootstrap-4.blade.php` |
| [simple-tailwind.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/vendor/pagination/simple-tailwind.blade.php)       | HTTP error 429 for prompt `resources/views/vendor/pagination/simple-tailwind.blade.php`    |

</details>

<details closed><summary>resources.views.property</summary>

| File                                                                                                                | Summary                                                                |
| ------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------- |
| [detail.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/property/detail.blade.php)   | HTTP error 429 for prompt `resources/views/property/detail.blade.php`  |
| [sale.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/property/sale.blade.php)       | HTTP error 429 for prompt `resources/views/property/sale.blade.php`    |
| [listing.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/property/listing.blade.php) | HTTP error 429 for prompt `resources/views/property/listing.blade.php` |

</details>

<details closed><summary>resources.views.auth</summary>

| File                                                                                                              | Summary                                                             |
| ----------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------- |
| [login.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/auth/login.blade.php)       | HTTP error 429 for prompt `resources/views/auth/login.blade.php`    |
| [register.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/auth/register.blade.php) | HTTP error 429 for prompt `resources/views/auth/register.blade.php` |

</details>

<details closed><summary>resources.views.account</summary>

| File                                                                                                           | Summary                                                             |
| -------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------- |
| [admin.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/account/admin.blade.php) | HTTP error 429 for prompt `resources/views/account/admin.blade.php` |
| [user.blade.php](https://github.com/maxousql/lylt-agency/blob/master/resources/views/account/user.blade.php)   | HTTP error 429 for prompt `resources/views/account/user.blade.php`  |

</details>

<details closed><summary>public</summary>

| File                                                                                              | Summary                                              |
| ------------------------------------------------------------------------------------------------- | ---------------------------------------------------- |
| [.htaccess](https://github.com/maxousql/lylt-agency/blob/master/public/.htaccess)                 | HTTP error 429 for prompt `public/.htaccess`         |
| [index.php](https://github.com/maxousql/lylt-agency/blob/master/public/index.php)                 | HTTP error 429 for prompt `public/index.php`         |
| [mix-manifest.json](https://github.com/maxousql/lylt-agency/blob/master/public/mix-manifest.json) | HTTP error 429 for prompt `public/mix-manifest.json` |
| [robots.txt](https://github.com/maxousql/lylt-agency/blob/master/public/robots.txt)               | HTTP error 429 for prompt `public/robots.txt`        |

</details>

<details closed><summary>database.migrations</summary>

| File                                                                                                                                                                               | Summary                                                                                             |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- |
| [2024_06_23_155655_create_utilisateur_table.php](https://github.com/maxousql/lylt-agency/blob/master/database/migrations/2024_06_23_155655_create_utilisateur_table.php)           | HTTP error 429 for prompt `database/migrations/2024_06_23_155655_create_utilisateur_table.php`      |
| [2024_06_23_151932_create_role_utilisateur_table.php](https://github.com/maxousql/lylt-agency/blob/master/database/migrations/2024_06_23_151932_create_role_utilisateur_table.php) | HTTP error 429 for prompt `database/migrations/2024_06_23_151932_create_role_utilisateur_table.php` |
| [2024_07_16_152409_create_alertes_clients_table.php](https://github.com/maxousql/lylt-agency/blob/master/database/migrations/2024_07_16_152409_create_alertes_clients_table.php)   | HTTP error 429 for prompt `database/migrations/2024_07_16_152409_create_alertes_clients_table.php`  |
| [2024_07_11_124307_create_demande_contact_table.php](https://github.com/maxousql/lylt-agency/blob/master/database/migrations/2024_07_11_124307_create_demande_contact_table.php)   | HTTP error 429 for prompt `database/migrations/2024_07_11_124307_create_demande_contact_table.php`  |
| [2024_07_08_133034_create_bienimmo_table.php](https://github.com/maxousql/lylt-agency/blob/master/database/migrations/2024_07_08_133034_create_bienimmo_table.php)                 | HTTP error 429 for prompt `database/migrations/2024_07_08_133034_create_bienimmo_table.php`         |
| [2024_07_09_142202_create_images_table.php](https://github.com/maxousql/lylt-agency/blob/master/database/migrations/2024_07_09_142202_create_images_table.php)                     | HTTP error 429 for prompt `database/migrations/2024_07_09_142202_create_images_table.php`           |
| [2024_07_08_122108_create_typebien_table.php](https://github.com/maxousql/lylt-agency/blob/master/database/migrations/2024_07_08_122108_create_typebien_table.php)                 | HTTP error 429 for prompt `database/migrations/2024_07_08_122108_create_typebien_table.php`         |
| [2024_07_13_055725_create_recherches_table.php](https://github.com/maxousql/lylt-agency/blob/master/database/migrations/2024_07_13_055725_create_recherches_table.php)             | HTTP error 429 for prompt `database/migrations/2024_07_13_055725_create_recherches_table.php`       |
| [2024_07_11_140843_create_favoris_table.php](https://github.com/maxousql/lylt-agency/blob/master/database/migrations/2024_07_11_140843_create_favoris_table.php)                   | HTTP error 429 for prompt `database/migrations/2024_07_11_140843_create_favoris_table.php`          |

</details>

<details closed><summary>database.seeders</summary>

| File                                                                                                                            | Summary                                                                  |
| ------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------ |
| [FavorisSeeder.php](https://github.com/maxousql/lylt-agency/blob/master/database/seeders/FavorisSeeder.php)                     | HTTP error 429 for prompt `database/seeders/FavorisSeeder.php`           |
| [TypeBienSeeder.php](https://github.com/maxousql/lylt-agency/blob/master/database/seeders/TypeBienSeeder.php)                   | HTTP error 429 for prompt `database/seeders/TypeBienSeeder.php`          |
| [DatabaseSeeder.php](https://github.com/maxousql/lylt-agency/blob/master/database/seeders/DatabaseSeeder.php)                   | HTTP error 429 for prompt `database/seeders/DatabaseSeeder.php`          |
| [BienImmoSeeder.php](https://github.com/maxousql/lylt-agency/blob/master/database/seeders/BienImmoSeeder.php)                   | HTTP error 429 for prompt `database/seeders/BienImmoSeeder.php`          |
| [RolesUtilisateursSeeder.php](https://github.com/maxousql/lylt-agency/blob/master/database/seeders/RolesUtilisateursSeeder.php) | HTTP error 429 for prompt `database/seeders/RolesUtilisateursSeeder.php` |
| [UtilisateursSeeder.php](https://github.com/maxousql/lylt-agency/blob/master/database/seeders/UtilisateursSeeder.php)           | HTTP error 429 for prompt `database/seeders/UtilisateursSeeder.php`      |

</details>

<details closed><summary>routes</summary>

| File                                                                                  | Summary                                        |
| ------------------------------------------------------------------------------------- | ---------------------------------------------- |
| [web.php](https://github.com/maxousql/lylt-agency/blob/master/routes/web.php)         | HTTP error 429 for prompt `routes/web.php`     |
| [console.php](https://github.com/maxousql/lylt-agency/blob/master/routes/console.php) | HTTP error 429 for prompt `routes/console.php` |

</details>

<details closed><summary>config</summary>

| File                                                                                          | Summary                                            |
| --------------------------------------------------------------------------------------------- | -------------------------------------------------- |
| [auth.php](https://github.com/maxousql/lylt-agency/blob/master/config/auth.php)               | HTTP error 429 for prompt `config/auth.php`        |
| [database.php](https://github.com/maxousql/lylt-agency/blob/master/config/database.php)       | HTTP error 429 for prompt `config/database.php`    |
| [mail.php](https://github.com/maxousql/lylt-agency/blob/master/config/mail.php)               | HTTP error 429 for prompt `config/mail.php`        |
| [queue.php](https://github.com/maxousql/lylt-agency/blob/master/config/queue.php)             | HTTP error 429 for prompt `config/queue.php`       |
| [app.php](https://github.com/maxousql/lylt-agency/blob/master/config/app.php)                 | HTTP error 429 for prompt `config/app.php`         |
| [session.php](https://github.com/maxousql/lylt-agency/blob/master/config/session.php)         | HTTP error 429 for prompt `config/session.php`     |
| [services.php](https://github.com/maxousql/lylt-agency/blob/master/config/services.php)       | HTTP error 429 for prompt `config/services.php`    |
| [logging.php](https://github.com/maxousql/lylt-agency/blob/master/config/logging.php)         | HTTP error 429 for prompt `config/logging.php`     |
| [cache.php](https://github.com/maxousql/lylt-agency/blob/master/config/cache.php)             | HTTP error 429 for prompt `config/cache.php`       |
| [filesystems.php](https://github.com/maxousql/lylt-agency/blob/master/config/filesystems.php) | HTTP error 429 for prompt `config/filesystems.php` |
| [hashing.php](https://github.com/maxousql/lylt-agency/blob/master/config/hashing.php)         | HTTP error 429 for prompt `config/hashing.php`     |

</details>

<details closed><summary>bootstrap</summary>

| File                                                                                         | Summary                                             |
| -------------------------------------------------------------------------------------------- | --------------------------------------------------- |
| [providers.php](https://github.com/maxousql/lylt-agency/blob/master/bootstrap/providers.php) | HTTP error 429 for prompt `bootstrap/providers.php` |
| [app.php](https://github.com/maxousql/lylt-agency/blob/master/bootstrap/app.php)             | HTTP error 429 for prompt `bootstrap/app.php`       |

</details>

<details closed><summary>app.View.Components</summary>

| File                                                                                                     | Summary                                                        |
| -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------- |
| [headerUser.php](https://github.com/maxousql/lylt-agency/blob/master/app/View/Components/headerUser.php) | HTTP error 429 for prompt `app/View/Components/headerUser.php` |

</details>

<details closed><summary>app.Providers</summary>

| File                                                                                                               | Summary                                                          |
| ------------------------------------------------------------------------------------------------------------------ | ---------------------------------------------------------------- |
| [AppServiceProvider.php](https://github.com/maxousql/lylt-agency/blob/master/app/Providers/AppServiceProvider.php) | HTTP error 429 for prompt `app/Providers/AppServiceProvider.php` |

</details>

<details closed><summary>app.Http.Requests</summary>

| File                                                                                                       | Summary                                                        |
| ---------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------- |
| [CreateUser.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Requests/CreateUser.php)     | HTTP error 429 for prompt `app/Http/Requests/CreateUser.php`   |
| [CreateBien.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Requests/CreateBien.php)     | HTTP error 429 for prompt `app/Http/Requests/CreateBien.php`   |
| [LoginRequest.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Requests/LoginRequest.php) | HTTP error 429 for prompt `app/Http/Requests/LoginRequest.php` |

</details>

<details closed><summary>app.Http.Middleware</summary>

| File                                                                                                                           | Summary                                                                   |
| ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------- |
| [CheckAuthenticated.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Middleware/CheckAuthenticated.php)       | HTTP error 429 for prompt `app/Http/Middleware/CheckAuthenticated.php`    |
| [AdminMiddleware.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Middleware/AdminMiddleware.php)             | HTTP error 429 for prompt `app/Http/Middleware/AdminMiddleware.php`       |
| [CheckNotAuthenticated.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Middleware/CheckNotAuthenticated.php) | HTTP error 429 for prompt `app/Http/Middleware/CheckNotAuthenticated.php` |

</details>

<details closed><summary>app.Http.Controllers</summary>

| File                                                                                                                            | Summary                                                                    |
| ------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------- |
| [AuthController.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Controllers/AuthController.php)               | HTTP error 429 for prompt `app/Http/Controllers/AuthController.php`        |
| [Controller.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Controllers/Controller.php)                       | HTTP error 429 for prompt `app/Http/Controllers/Controller.php`            |
| [BienController.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Controllers/BienController.php)               | HTTP error 429 for prompt `app/Http/Controllers/BienController.php`        |
| [ViewsController.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Controllers/ViewsController.php)             | HTTP error 429 for prompt `app/Http/Controllers/ViewsController.php`       |
| [UtilisateurController.php](https://github.com/maxousql/lylt-agency/blob/master/app/Http/Controllers/UtilisateurController.php) | HTTP error 429 for prompt `app/Http/Controllers/UtilisateurController.php` |

</details>

<details closed><summary>app.Models</summary>

| File                                                                                                      | Summary                                                    |
| --------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------- |
| [Utilisateur.php](https://github.com/maxousql/lylt-agency/blob/master/app/Models/Utilisateur.php)         | HTTP error 429 for prompt `app/Models/Utilisateur.php`     |
| [Image.php](https://github.com/maxousql/lylt-agency/blob/master/app/Models/Image.php)                     | HTTP error 429 for prompt `app/Models/Image.php`           |
| [BienImmo.php](https://github.com/maxousql/lylt-agency/blob/master/app/Models/BienImmo.php)               | HTTP error 429 for prompt `app/Models/BienImmo.php`        |
| [RoleUtilisateur.php](https://github.com/maxousql/lylt-agency/blob/master/app/Models/RoleUtilisateur.php) | HTTP error 429 for prompt `app/Models/RoleUtilisateur.php` |
| [Favori.php](https://github.com/maxousql/lylt-agency/blob/master/app/Models/Favori.php)                   | HTTP error 429 for prompt `app/Models/Favori.php`          |
| [DemandeContact.php](https://github.com/maxousql/lylt-agency/blob/master/app/Models/DemandeContact.php)   | HTTP error 429 for prompt `app/Models/DemandeContact.php`  |
| [AlerteClient.php](https://github.com/maxousql/lylt-agency/blob/master/app/Models/AlerteClient.php)       | HTTP error 429 for prompt `app/Models/AlerteClient.php`    |
| [TypeBien.php](https://github.com/maxousql/lylt-agency/blob/master/app/Models/TypeBien.php)               | HTTP error 429 for prompt `app/Models/TypeBien.php`        |
| [Recherche.php](https://github.com/maxousql/lylt-agency/blob/master/app/Models/Recherche.php)             | HTTP error 429 for prompt `app/Models/Recherche.php`       |

</details>

---

## 🚀 Getting Started

**_Requirements_**

Ensure you have the following dependencies installed on your system:

-   **PHP**: `version x.y.z`

### ⚙️ Installation

1. Clone the lylt-agency repository:

```sh
git clone https://github.com/maxousql/lylt-agency
```

2. Change to the project directory:

```sh
cd lylt-agency
```

3. Install the dependencies:

```sh
composer install
```

### 🤖 Running lylt-agency

Use the following command to run lylt-agency:

```sh
php artisan serve
```
