Elgentos Legacy Email Enabler
=====================
Adjusts the is_legacy flag in email_template table back to 1 and prevents Magento from setting it to 0.

Description
-----------
This module prevents Magento from setting the `is_legacy` to 0 inside the `email_template` table.
Therefore you can still use the objects inside the email templates eg. `trans "%name," name=$order.getBillingAddress().getName()`


Functionality
--------------
When enabled it also checks the current `email_template` table and adjusts any remaining `is_legacy` values to 1.

When you create new email templates in the backend, it prevents Magento from setting the value `is_legacy` to 0.

No configuration required, simply enable.