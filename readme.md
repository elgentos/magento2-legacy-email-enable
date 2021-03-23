Elgentos Legacy Email Enabler
=====================
Adjusts the is_legacy flag in email_template table back to 1 and prevents Magento from setting it to 0. So you can still use old email objects inside the email template.
eg. `trans "%name," name=$order.getBillingAddress().getName()`

Description
-----------
With this module you can send magento template mails with only defining a template id and a receiver email.

With additional config you can change area, store_id or even the from and from_name which are also defined in the channel config.Also template vars can be added.

This adapter uses MSP Notifier to send the email. In the channel you can use Immediate send or with the MSP queue.
Recommended is to use te queue if a lot of emails are send by a foreach loop.

The queue can be started with: `bin/magento msp:notifier:queue:send` so this can be added in a crontab.

For more features, read the complete documentation: https://github.com/magespecialist/notifier/wiki

Code
-----------
Minimal config is:
```
$config = [
    'to' => 'info@elgentos.nl',
];
```

Additional config can be:
```
$config = [
    'to' => 'info@elgentos.nl',
    'area' => 'frontend', // default
    'store_id' => 0, //default
    'template_vars' => [],
    'from' => 'info@elgentos.nl', // is definend in channel config, so can be overridden
    'from_name' => 'Elgentos', // is definend in channel config, so can be overridden
];
```

```
...
public function __construct(
    Elgentos\NotifierMagentoMailAdapter\Api\SendMessageInterface $sendMessage
) {
    $this->sendMessage = $sendMessage;
}
...
public function execute()
{
    ... // Your code
    
    $config = [
        'to' => 'info@elgentos.nl',
    ];
        
    $this->sendMessage->execute('my_channel_code', 'magento_mail_template_id', $config);

    ... // Your code
}
```
