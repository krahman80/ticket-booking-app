# Online Concert Ticket Application

> Using [laravel 7.30](https://laravel.com)

## description
* this app implement basic laravel functionalities such as : 
    > laravel cache  
    > event  
    > q̶u̶e̶u̶e̶ (̶d̶o̶n̶e̶)̶  
    > session  
    > t̶e̶s̶t̶t̶i̶n̶g̶ (̶d̶o̶n̶e̶)̶  
    > web socket  
    > web hook
    > cookie  
    > error log (different channel)


## Feature
* u̶s̶e̶r̶ c̶a̶n̶ l̶o̶g̶i̶n̶ u̶s̶i̶n̶g̶ f̶a̶c̶e̶b̶o̶o̶k̶/̶s̶o̶c̶i̶a̶l̶ a̶c̶c̶o̶u̶n̶t̶
* u̶s̶e̶r̶ m̶u̶s̶t̶ l̶o̶g̶i̶n̶ s̶e̶e̶ c̶o̶n̶c̶e̶r̶t̶ l̶i̶s̶t̶
* u̶s̶e̶r̶ c̶a̶n̶ s̶e̶e̶/̶f̶i̶n̶d̶ c̶o̶n̶c̶e̶r̶t̶ l̶i̶s̶t̶
  * cache top 10 concert list
* user can book concert ticket
  * when booked finish, user got email confirmation with pdf attached
  * when booked finish, number of seat is reduced
  * when booked finish, admin get email confirmation 
  * a̶n̶d̶ w̶i̶t̶h̶i̶n̶ 2̶4̶ h̶o̶u̶r̶ m̶u̶s̶t̶ p̶a̶y̶
* u̶s̶e̶r̶ m̶u̶s̶t̶ p̶a̶y̶ w̶i̶t̶h̶i̶n̶ 2̶4̶ h̶o̶u̶r̶ a̶f̶t̶e̶r̶ b̶o̶o̶k̶i̶n̶g̶  
  * w̶h̶e̶n̶ p̶a̶y̶m̶e̶n̶t̶ i̶s̶ d̶o̶n̶e̶,̶ u̶s̶e̶r̶ m̶u̶s̶t̶ c̶o̶n̶f̶i̶r̶m̶ p̶a̶y̶m̶e̶n̶t̶ v̶i̶a̶ a̶p̶p̶s̶ o̶r̶ e̶m̶a̶i̶l̶
  * w̶h̶e̶n̶ p̶a̶y̶m̶e̶n̶t̶ i̶s̶ d̶o̶n̶e̶,̶ s̶e̶n̶d̶ e̶m̶a̶i̶l̶ c̶o̶n̶f̶i̶r̶m̶a̶t̶i̶o̶n̶ t̶o̶ a̶d̶m̶i̶n̶
* m̶a̶x̶i̶m̶u̶m̶ b̶o̶o̶k̶i̶n̶g̶ l̶i̶m̶i̶t̶ i̶s̶ 3̶ p̶e̶r̶ u̶s̶e̶r̶ o̶n̶ t̶h̶e̶ s̶a̶m̶e̶ c̶o̶n̶c̶e̶r̶t̶
* log user when booking action

* admin can manage concert
  * a̶d̶m̶i̶n̶ c̶a̶n̶ l̶i̶s̶t̶ c̶o̶n̶c̶e̶r̶t̶
  * admin post concert with images
  * show manage menu when login as admin

## To Do list
* a̶d̶d̶ l̶a̶r̶a̶v̶e̶l̶ a̶u̶t̶h̶
* a̶d̶d̶ i̶s̶_̶a̶d̶m̶i̶n̶ f̶i̶e̶l̶d̶ t̶o̶ u̶s̶e̶r̶
* d̶i̶f̶f̶e̶r̶e̶n̶t̶i̶a̶t̶e̶ a̶d̶m̶i̶n̶ a̶n̶d̶ r̶e̶g̶u̶l̶a̶r̶ u̶s̶e̶r̶
* a̶d̶d̶ s̶o̶c̶i̶a̶l̶i̶t̶e̶ p̶a̶c̶k̶a̶g̶e̶ 
* a̶d̶d̶ b̶o̶o̶k̶i̶n̶g̶ o̶n̶ s̶h̶o̶w̶ c̶o̶n̶c̶e̶r̶t̶ p̶a̶g̶e̶
* s̶h̶o̶w̶ c̶a̶r̶t̶ l̶i̶s̶t̶
* r̶e̶m̶o̶v̶e̶ c̶h̶a̶r̶t̶ i̶t̶e̶m̶
* u̶p̶d̶a̶t̶e̶ c̶h̶a̶r̶t̶ q̶u̶a̶n̶t̶i̶t̶y̶
* c̶h̶e̶c̶k̶o̶u̶t̶ o̶r̶d̶e̶r̶
* a̶d̶d̶ e̶x̶p̶i̶r̶e̶d̶ a̶t̶t̶r̶i̶b̶u̶t̶e̶ i̶n̶ b̶o̶o̶k̶i̶n̶g̶ M̶o̶d̶e̶l̶
* add countdown javascript
* add schedulling validate booking (cron)
* add email notification to user
* a̶d̶d̶ t̶r̶a̶n̶s̶a̶c̶t̶i̶o̶n̶ w̶h̶e̶r̶e̶ b̶o̶o̶k̶i̶n̶g̶ i̶s̶ f̶i̶n̶i̶s̶h̶e̶d̶ (̶r̶e̶d̶u̶c̶e̶ s̶e̶a̶t̶)̶
* c̶h̶a̶n̶g̶e̶ b̶o̶o̶k̶i̶n̶g̶ s̶t̶a̶t̶u̶s̶ f̶r̶o̶m̶ s̶t̶r̶i̶n̶g̶ t̶o̶ n̶u̶m̶b̶e̶r̶ t̶h̶e̶n̶ s̶e̶t̶ n̶e̶w̶ s̶t̶a̶t̶u̶s̶ a̶t̶t̶r̶i̶b̶u̶t̶e̶s̶ i̶n̶ m̶o̶d̶e̶l̶
* generate ticket pdf
* fixed quantity in ticket

## Database Model

* customer/user
    > id, name, email, password

* concert
    > id, concert_name, artist, date, venue, number_of_seat

* booking
    > id, slug, user_id(fk), booking_time, status (not_paid, paid, expired)

* ticket
    > id, number, concert_id(fk), price

* booking_ticket
    > id, ticket_id(fk), booking_id(fk), slug, qty, total price, each price
