# Checkout 51 Coding Challenge

# Requirements

Given the json file “c51.json” create an application with one screen that turns it into a list.

The file contains a list of offers and their attributes. Each row in the list must contain the offer name, its image and the cashback value in dollars.

You can consume the list as file resource from the app or host it on a network using a simple service like “http://myjson.com/”.

Feel free to build it in any way you want using any framework, architecture and tools at your disposal. Bonus points if you create a way for a user to sort the offers by name or cash back.

This is a relatively simple app, however we are looking for more than just the task to be completed. At Checkout 51, we take the craftmanship of the code seriously, and want to see evidence that you do as well. We are looking for software that is well structured, concise and testable.


## Solution

I've used Symfony MVC framework to complete the assignment.
Hosted the JSON in myjson and imported it into the Controller and passed as an argument to the view. Also I have implemented the sorting functionality on cashback column.

Below are the steps to run the project:

1. Download the project to the desired directory on your computer
2. cd project-directory
3. Install packages

    Composer: `composer install`
4. Start Server 

    Symfony: `symfony start:server`

## Unit Testing

Run Test: `php bin/phpunit`
