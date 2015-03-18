Mautic - Concrete5 Add-on
====================

This [Concrete5](http://www.concrete5.org/) Add-on lets you add the [Mautic](http://mautic.org) tracking pixel to your Concrete5 website and embed Mautic forms in the content.

This add-on was tested on Concrete5 v5.7.3.1. Older versions might not be compatible.

## Installation

1. [Download](https://github.com/mautic/mautic-concrete5/archive/master.zip) the ZIP package.
2. Unzip the package files to `/packages/mautic/` of your Concrete5 instance.
3. Log in to your Concrete5 instance as administrator, open configuration menu (top right corner) and go to **Extend Concrete5** / **Add functionality**.
4. You should see Mautic Add-on listed there. Click the **Install** button.

Now, if you go to **Add Content to The Page** (the plus icon in the top bar), you should see Mautc Form and Mautic Tracker blocks.

### Mautic Tracking Pixel

To make the tracker work, insert one Mautic Tracker block to the footer of your page. 

Tracking pixel works right after you configure the Mautic Base URL in the add-on. That means it will insert 1 px gif image loaded from your Mautic instance. You can check HTML source code (CTRL + U) of your Concrete5 website to make sure the plugin works. You should be able to find something like this:

`<img src="http://yourmautic.com/mtracking.gif" />`

There will be probably longer URL query string at the end of the tracking image URL. It is encoded additional data about the page (title, url, referrer).

### Form embed

To embed a Mautic form into Concrete5 content, insert the Mautic Form block to the place on your page where you want the form to appear. In the form insert Base URL of your Mautic instance and form ID.

ID is the identifier of the Mautic form you want to embed. You can see the ID of the form in the URL of the form detail. For example for ```www.yourmautic.com/forms/view/1```, ID = 1.

Known issue is that if you save the edit form, the Mautic Form goes fullscreen. Refresh the page and all will go back to normal. 
