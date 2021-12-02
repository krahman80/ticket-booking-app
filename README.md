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
* maximum booking limit is 3 per user on the same concert
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
* add session on home page
* add booking on show concert page

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
    > id, ticket_id(fk), booking_id(fk), slug
