=== Plugin Name ===
Contributors: Rustaurius 
Tags: product catalogue, product catalog, restaurant menu, responsive, customizable CSS, SEO friendly, affiliate links,  affiliates, attributes, blog catalog, catalog, catalogue, commerce, directory, display products, e-commerce, ecommerce, gallery, inventory, list products, manage, plugin, product, product feed, product gallery, product management, product portfolio, products, sales, sell, shipping, shop, shopping, store, wp catalog, wp catalogue
Requires at least: 3.5.0
Tested up to: 3.9.1
License: GPLv3
License URI:http://www.gnu.org/licenses/gpl-3.0.html

Displays a product catalog(ue) or menu for your store, restaurant, group, etc. Has three default responsive layouts and can accept custom CSS.

== Description ==

Displays a product catalogue or menu for your store, restaurant, group, etc. Has three default responsive layouts and can accept custom CSS.

You can use categories, sub-categories and tags to make your products easy to sort through for your visitors.
You can also use categories and sub-categories in your catalogue(s) to make it easy to keep them up to date. 

[youtube http://www.youtube.com/watch?v=z6XL7whjY1Q]

**Key Features:**

* 3 default layout formats, users can tab between them
* Categories, sub-categories and tags to organize your products
* Custom fields and custom product pages make the catalogues completely customizable
* Fully customizable via CSS
* SEO friendly single product pages
* UTF8 support
* Drag-and-drop to re-order your catalogues
* Upload products from a spreadsheet
* Change starting layout by setting the "starting_layout" attribute
* Exclude one or more layouts by using the "excluded_layouts" attribute (accepts a comma-separated list)
* Options page lets you customize a number of a options

To have Fancyboxes display in the Ultimate Product Catalogue Plugin, FancyBox for WordPress is required (http://wordpress.org/plugins/fancybox-for-wordpress/).
If FancyBox for WordPress isn't installed, individual products will be displayed on their own pages.

Tutorial videos available in the FAQ section.

**Premium Features:**

* Drag-and-drop product pages layout
* Product tags
* Custom fields that can be used to include product manuals, additional information, etc.
* SEO friendly single product pages

**Additional Languages:**
* Brazilian Portugese (thanks to <a href='http://wordpress.org/support/profile/tito_cadallora'>Tito_Cadallora</a>);
* Canadian French (thanks to Pascale DRP)
* Italian
* Lithuanian (thanks to <a href='http://wordpress.org/support/profile/adart'>AdArt</a>);
* Spanish (thanks to Irene L.)
* Turkish (thanks to Ayhan)

== Installation ==

1. Upload the `ultimate-product-catalogue` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place "[product-catalogue id='X']" on the page where you want your catalogue to display, where X is the ID of the catalogue to display
4. *The page that displays the product catalogue needs to be a full-width type page for the catalogue to display correctly*

--------------------------------------------------------------

To get started using the plugin, you can:
- Go to the "Products" tab in the Ultimate Product Catalogue Plugin (UPCP) admin menu, add products one at a time or by uploading a spreadsheet
- Create categories in the "Categories" tab, then create sub-categories in the "Sub-Categories" tab and assign your sub-categories to the correct category
- Create a catalogue in the "Catalogues" tab, then add products, categories, or sub-categories to that catalogue
- Add additional images to a product by clicking on it and then adding them from the "Product Details" screen
- Create tags in the "Tags" tab, then assign as many tags as necessary to each product from the "Product Details" screen
- Re-order your catalogues by dragging and dropping items in the "Catalogue Details" screen


== Frequently Asked Questions ==

= I have more than one catalogue. What do I do? =

You can use the attribute "id='X'" in the product-catalogue shortcode to specify a catalogue, where 'X' is replaced with the catalogue ID (available at the top of the catalogue details page).

= How do I remove the sidebar from my catalogue? =

You can use the attribute "sidebar='No'" in the product-catalogue shortcode to remove the sidebar from a catalogue.

= Can I start with a layout other than the default "Thumbnail" layout? =

Add the attribute "starting_layout='LAYOUT'", where LAYOUT is replaced with the layout you would like to be the starting layout (List or Detail are the two options currently).

= How do I exclude one of the layouts? =

The attribute "excluded_layouts" lets you stop one or more layouts from being displayed. It accepts a comma separated list of layouts you wish to exclude. For example, "exclude_layouts='Thumbnail, List'" would make your catalogue display only the "Detail" view.

= What is enabled in the 'Premium' version? =

The premium version allows you to add more than 100 products to the plugin, to use the 'Tags' feature, and to add additional images to products.

= Why do I get a "Page not found" error when I turn on SEO friendly links? =

You need to have some kind of pretty permalinks already enabled on your blog for them to work on the plugin. 

Videos

Tutorial Part 1
[youtube http://www.youtube.com/watch?v=9sdHtGGZpKU]

Tutorial Part 2
[youtube http://www.youtube.com/watch?v=KBhdiNCtLvM]

Premium Features
[youtube http://www.youtube.com/watch?v=l9mWNqOIB_w]

== Screenshots ==

1. The "detail" catalogue view
2. A product's detailed view, with mutiple images that can be clicked to display in the main image area
3. The "thumbnail" catalogue view
4. The "list" catalogue view
5. The admin area

== Changelog ==
= 2.3.7 = 
 - Added a new product search option
 - Fixed an error on the "Product Page" tab
 - Added Spanish translation files

= 2.3.6 = 
- Fixed a search error related to the new options

= 2.3.5 = 
- Make searching more than 1 category at a time possible
- Added an option to search product description as well as name
- Fixed a problem that prevented most users from using the custom product pages feature
- Fixed a number of small CSS problems

= 2.3.4 = 
- Fixed a spreadsheet upload error

= 2.3.3 =
- Fixed a permalinks error after AJAX sorting
- Fixed a "Read more" link error

= 2.3.2 =
- Fixed a JQuery error

= 2.3.1 =
- Fixed a product count error

= 2.3 =
- New premium feature: custom product page design, let's you drag and drop product pages to change the layout in the back-end
- Contact forms and PayPal buttons can be included on product pages with the new layout feature
- Added the ability to add multiple additional images at once
- Custom fields can now be uploaded with products being uploaded by spreadsheet (Limited testing, please let us know if you find any errors with this)
- Added a new custom field type, file, so that PDF's and other files can be included with products
- Added a "Details" image option, so that the arrow can be replaced with any image of your choosing
- Added an italian language translation
- Fixed a small spreadsheet error

= 2.2.12 =
 - Fixed a display bug for individual product pages

= 2.2.11 =
- Major custom fields improvement: allow fields to be displayed on main catalogue pages
- Minor css upgrades to the main catalogue pages

= 2.2.10 =
- Fixed an individual product pages bug

= 2.2.9 =
- Fixed the pretty permalinks rewrites to be compatible with recent WordPress updates
- Added a "Delete All Products" button
- Added the ability to require confirmation
- Added Turkish as a language option

= 2.2.8 =
- Disabled the "Enter" function on the search form
- Fixed spreadsheet upload bugs
- Fixed FancyBoxes after AJAX search

= 2.2.7 =
- Fixed "custom fields" error with no validation entered

= 2.2.6 =
- Added French as a supported language
- Improved the AJAX search function

= 2.2.5 =
- Added css support for a large number of new themes

= 2.2.4 =
- Added case-insensitive search for AJAX filtering

= 2.2.3 =
- Small update for uploading products from spreadsheets

= 2.2.2 =
- Bug fixes for custom fields
- Shortcodes can now be used in product descriptions

= 2.2.1 =
- Two small bug fixes

= 2.2 =
- New Premium feature: Custom Fields!
- Custom fields let you add fields to your products, that can be included in the description of your products via shortcode, so that you can have a common product template
- New feature: Non-displayed products
- Non-displayed products let you temporarily remove a product from all catalogues (ex: if it's out of stock)
- Tags can now be imported via spreadsheet
- Catalogue height now adjusts depending on the size of the current layout
- Tutorial videos are available in the FAQ section

= 2.1.5 =
- Small bug fix
- Some language files added

= 2.1.4 =
- Three small fixes for the front-end and product page

= 2.1.3 =
- Small fix for "Tags" functionality with new AJAX filtering
- Small optimizations to return catalogue quicker after users filter the catalogue

= 2.1.2 =
- Beta AJAX catalogue filtering as an option
- Number of characters in a product's "details" view description added as an option
- Fixed a small catalogue detail's page bug

= 2.1 =
- Implemented view counting for products, based on clicks on title or image links
- Added mobile stylesheet (v1) and product sorting for premium users
- Increased compatibility for uploaded product spreadsheets (more forgiving of small errors in column names, better error reporting)
- Attempted to make tables compatible with MySQL strict mode
- Fixed an error where SEO friendly URL's stopped working shortly after being setup

= 2.0.1 =
- Added in the WordPress Uploader for product images
- SEO friendly single product URLs are now an option
- Plugin tables now use UTF8 encoding

= 2.0 =
- Added an 'Options' page
- Added 'Read More' as an option on the 'Options' page
- Added 'Color Scheme' as an option on the 'Options' page
- Added 'Tags Logic' as an option on the 'Options' page
- Added 'Product Links' as an option on the 'Options' page
- Implemented a premium version for new users

= 1.2 = 
- Added pagination for the admin pages to allow easier access to all products
- Added a 'product link' field for sites participating in affiliate programs
- Made shortcode easier to find
- Added single product pages if FancyBox for WordPress isn't installed
- Fixed the issue with product images being deleted on upgrade
- Fixed category labels behaviour when products are being filtered

= 1.1 = 
- Added localization (hopefully!)
- Added an "initial_layout" shortcode
- Added an "exclude_layouts" shortcode
- Added individual product URLs, when blogs have FancyBox for WordPress installed
- Made a number of small changes

= 1.0 =
Initial Version.

== Upgrade Notice ==

= 2.1.4 = 

- Three small fixes for the front-end and product page
