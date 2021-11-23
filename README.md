# Online Concert Ticket Application

> Using [laravel 7.30](https://laravel.com)

## Feature
- user can login using facebook/social account
- user can buy ticket
- user can view pdf version of the ticket on the email
- 

## To Do list
- add laravel auth
- add socialite package
- 

## Database Model

- customer/user
    > id, name, email, password

- table concert
    > id, concert_name, artist, date, venue, number_of_seat

- table ticket
    > id, serial_number, concert_id(fk), purchase_date, price, area

- order_ticket
    > id, ticket_id(fk), order_id(fk)

- order
    > id, user_id(fk), order_time, paid_time

