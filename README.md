Mautic - Concrete5 Add-on
====================

This [Concrete5](http://www.concrete5.org/) Add-on lets you add the [Mautic](http://mautic.org) Mautic's tracking code into your Concrete5 website and embed Mautic forms, dynamic content or gated videos in the content.

# This is for 8.x. To use with 5.x, use [https://github.com/mautic/mautic-concrete5/tree/5.x](https://github.com/mautic/mautic-concrete5/tree/5.x).  

## Installation

1. [Download](https://github.com/mautic/mautic-concrete5/archive/master.zip) the ZIP package.
2. Unzip the package files to `/packages/mautic/` of your Concrete5 instance.
3. Log in to your Concrete5 instance as administrator, open configuration menu (top right corner) and go to **Extend Concrete5** / **Add functionality**.
4. You should see Mautic Add-on listed there. Click the **Install** button.
5. Go to the Dashboard -> System & Settings -> Mautic -> Settings to configure your Mautic URL.

Now, if you go to **Add Content to The Page** (the plus icon in the top bar), you should see Mautic Form, Mautic Dynamic Content and Mautic Video blocks.

### Mautic tracking javascript

Mautic's tracking code will be automatically inserted into each page. 
 
(Note: the code enabling this was adapted from [https://github.com/concrete5cojp/addon_mautic_tracker](https://github.com/concrete5cojp/addon_mautic_tracker)).

You can set custom parameter from your package or custom code using:

```php
$app = Application::getFacadeApplication();
$tracker = $app->make(Concrete\Package\Mautic\Asset\Tracker::class);
$tracker->setParam('email', 'my@email.com');
$tracker->setParam('firstname', 'John');
```

### Form embed

To embed a Mautic form into Concrete5 content, insert the Mautic Form block to the place on your page where you want the form to appear. In the form insert Base URL of your Mautic instance and form ID.

ID is the identifier of the Mautic form you want to embed. You can see the ID of the form in the URL of the form detail. For example for ```www.yourmautic.com/forms/view/1```, ID = 1.

Known issue is that if you save the edit form, the Mautic Form goes fullscreen. Refresh the page and all will go back to normal. 
