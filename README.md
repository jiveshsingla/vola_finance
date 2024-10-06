Part 1: Created the landing page in Laravel 10 based on provided UI.


Part 2: Modified transaction.php to create a proper array, 
added migration and seeder to store transactions. Calculated transaction balances 
dynamically (each user starts with $5).



Part 3: Created API functions to:
Calculate 90-day closing balance and averages.
Analyze last 30 days for income, debit count, and weekend debits.
Sum income with transactions > $15.