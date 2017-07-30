#!/bin/sh

#php artisan infyom:scaffold User --fieldsFile=schema/User.json
php artisan infyom:scaffold Client --fieldsFile=schema/Client.json --datatables=true
php artisan infyom:scaffold Project --fieldsFile=schema/Project.json --datatables=true
php artisan infyom:scaffold TimeEntry --fieldsFile=schema/TimeEntry.json --datatables=true