
## Advance BlogApp Project

This is a simple BlogApp. Here users create account and can publish and revise daily journal entries, and these entries will be made public for others to view.


## Installation

To run this project you have to clone the git reposotery.After cloning you have open the terminal and run

```bash
cp .env.example .env
```
 Now run this command to instal and the composer requirements

```bash
composer instal
```
Atfer intalling all requirements you need to generate app key with the command

```bash
php artisan key:generate
```
Now you have to set up the database into .env file After configure database run the command to migrate all the database tables

```bash
php artisan migrate
```
To seed the usertable seeder data.

```bash
php artisan db:seed
```
Now time to serve the project with 
```bash
php artisan serve
```
This project is ready to use.......
