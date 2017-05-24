# SendGrid Campaigns Web Form 
 
 This is a webform for [SendGrid Campaigns](https://sendgrid.com/solutions/email-marketing/).  It uses the [SendGrid PHP API](https://sendgrid.com/docs/Integrate/Code_Examples/v2_Mail/php.html), and [Zurb Foundation for Sites](foundation.zurb.com/sites).
 
 The page is designed as a landing page with "two step opt-in".
 
 ##Usage
 
 Clone the directory and then run the following commands:
 
 ```bash
 $ cd SendGrid-Campaigns-WebForm
 ```
 
 ```bash
 $ bower install
 ```
 ```bash
 $ npm install
 ```
 
 ```bash
 $ composer Install
 ```
 
 ###Environment Variables
 
 Copy .env.example to .env and add your sendgrid api key and list number
 
 ###SASS
 
 To compile your css, run the following command (requires GULP):
 
 ```bash
 $ gulp sass
 ```
 
 You can also run the following command which will watch for SASS changes and compile them:
 
  ```bash
  $ gulp
  ```
 
 ###JavaScript
 
 To compile your JS, run the following command (requires GULP):
 
 ```bash
 $ gulp javascript
 ```
 
