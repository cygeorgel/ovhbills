# OvhBills

## Get your Ovh / OvhCloud bills the easy way

OvhBills get your Ovh bills for you.

![OvhBills interface](https://en.bluerocktel.com/wp-content/uploads/2019/11/bluerocktel-ovhbills-en-1024x777.png)

## Installation

* Clone or download this repository to your server.
* Run ```composer install```
* Copy file .env.example to .env
* Open .env and enter your database settings right (you can also enter your FTP settings if you want your bills to be stored on your FTP server)
* Run the migrations ```php artisan migrate```
* Add this line to your crontab : ```* * * * * php {pathToTheApp}/artisan schedule:run```
* Register and login to the interface, enter your Ovh settings

## License

OVHBills is released under the MIT license.
See the bundled LICENSE file for details.

## Author

Cyrille Georgel ([BlueRockTEL](https://bluerocktel.com))


## [BlueRockTEL](https://bluerocktel.com)

The context of the subscription economy and the increasing convergence between Telecom and Cloud services brings new ways of approaching customers, selling to them, serving and charging them. BlueRockTEL is your [complete CRM and billing solution](https://en.bluerocktel.com) to do so. Our fully automated, cost effective and data driven solution will help you to reach your business goals. [Learn more](https://en.bluerocktel.com)

La généralisation de l'économie de l'abonnement et la convergence croissante entre les services Telecom et Coud apportent de nouvelles manière d'approcher les clients, de leur vendre, de les services et de les facturer. BlueRockTEL est [votre solution CRM et facturation complète](https://fr.bluerocktel.com) pour réussir ce challenge. Notre solution entièrement automatisée, économique et axée sur la data vous aidera à atteindre vos objectifs business. [En savoir plus](https://fr.bluerocktel.com)
