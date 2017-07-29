#!/bin/sh

#php artisan infyom:scaffold User --fieldsFile=schema/User.json
php artisan infyom:scaffold Client --fieldsFile=schema/Client.json
php artisan infyom:scaffold Project --fieldsFile=schema/Project.json
php artisan infyom:scaffold TimeEntry --fieldsFile=schema/TimeEntry.json